<?php

namespace App\Controllers;

use App\Models\CheckInLog;
use App\Models\InviteCode;
use App\Models\Node;
use App\Models\TrafficLog;
use App\Models\Package;
use App\Models\Buy;
use App\Models\User;
use App\Services\Auth;
use App\Services\Config;
use App\Services\DbConfig;
use App\Utils\Hash;
use App\Utils\Tools;

use \PayPal\Api\Payer;
use \PayPal\Api\Item;
use \PayPal\Api\ItemList;
use \PayPal\Api\Details;
use \PayPal\Api\Amount;
use \PayPal\Api\Transaction;
use \PayPal\Api\RedirectUrls;
use \PayPal\Api\Payment;
use \PayPal\Exception\PayPalConnectionException;
use \PayPal\Api\PaymentExecution;
use PayPal\Rest\ApiContext;

/**
 *  HomeController
 */
class UserController extends BaseController
{

    private $user;

    public function __construct()
    {
        $this->user = Auth::getUser();
    }

    public function view()
    {
        $userFooter = DbConfig::get('user-footer');
        return parent::view()->assign('userFooter', $userFooter);
    }

    private function mySuccess($code,$msg){
        $this->view()->assign('code',$code)->assign('msg',$msg)->display('user/success.tpl');
    }

    private function myError($code,$msg){
        $this->view()->assign('code',$code)->assign('msg',$msg)->display('user/error.tpl');
    }

    public function package($request, $response, $args){
        $package = Package::get();
        return $this->view()->assign('packages', $package)->display('user/package.tpl');
    }

    public function buy($request, $response, $args){

        $package = Package::find($args['id']);

        $buy = new Buy();
        $buy->user_id = $this->user->id;
        $buy->package_id = $args['id'];
        $buy->status = 0;
        $buy->update_at = time();

        if($buy->save()){
            $paypal = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    'AV9s_kaDTlQ6K4tWfNrwYh6eqo1Yhmt2imJpLJyH3TO2fTxYbWI4ELqnTyvLOXQse2AuG6VLBjn2PI-W',
                    'ECnj4fnlWTsPCsuRR1T-GyB5QevKTTj-JxC26BUkHKOXFet30s8egmNeczMgY8E6_3REqJPo5hzJeypz')
                );
            //设置支付环境(mode=>sandbox,mode=>live)测试环境,正式环境
            $paypal->setConfig(array('mode'=>'sandbox'));

            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $item = new Item();
            $item->setName($package->name)->setCurrency($package->money_type)->setQuantity(1)->setPrice($package->money);

            $itemList = new ItemList();
            $itemList->setItems([$item]);

            $details = new Details();
            $details->setSubtotal($package->money);

            $amount = new Amount();
            $amount->setCurrency($package->money_type)->setTotal($package->money)->setDetails($details);

            $transaction = new Transaction();
            $transaction->setAmount($amount)->setItemList($itemList)->setDescription($package->desc)->setInvoiceNumber(uniqid());

            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl('http://'.$_SERVER['SERVER_NAME'] . '/user/callback/true/'.base64_encode($buy->id))->setCancelUrl('http://'.$_SERVER['SERVER_NAME'] . '/user/callback/false/'.base64_encode($buy->id));

            $payment = new Payment();
            $payment->setIntent('sale')->setPayer($payer)->setRedirectUrls($redirectUrls)->setTransactions([$transaction]);

            try {
                $payment->create($paypal);
            } catch (PayPalConnectionException $e) {
                $this->myError(3002,$e->getData());
                exit();
            }
            $approvalUrl = $payment->getApprovalLink();
            header("Location: {$approvalUrl}");
        }else{
            $this->myError(3001,'支付出错啦,创建订单失败');
            exit();
        }
    }

    public function callback($request, $response, $args){

        $paypal = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AV9s_kaDTlQ6K4tWfNrwYh6eqo1Yhmt2imJpLJyH3TO2fTxYbWI4ELqnTyvLOXQse2AuG6VLBjn2PI-W',
                'ECnj4fnlWTsPCsuRR1T-GyB5QevKTTj-JxC26BUkHKOXFet30s8egmNeczMgY8E6_3REqJPo5hzJeypz')
        );
        //设置支付环境(mode=>sandbox,mode=>live)测试环境,正式环境
        $paypal->setConfig(array('mode'=>'sandbox'));

        if(!isset($_REQUEST['paymentId'], $_REQUEST['PayerID'])){
            $this->myError(3003,'支付出错啦,获取回调信息失败');
            exit();
        }

        if((bool)$args['commit'] === 'false'){
            $this->myError(3004,'支付失败,你的订单已被你取消');
            exit();
        }
        $buy = Buy::find(base64_decode($args['buy']));
        if(empty($buy)){
            $this->myError(3005,'支付失败,这条订单不存在');
            exit();
        }

        $paymentID = $_REQUEST['paymentId'];
        $payerId = $_REQUEST['PayerID'];

        $payment = Payment::get($paymentID, $paypal);

        $execute = new PaymentExecution();
        $execute->setPayerId($payerId);

        try{
            if($payment->execute($execute, $paypal)){
                $package = Package::find($buy->package_id);
                //更新用户流量
                $this->user->transfer_enable = $this->user->transfer_enable + Tools::toGB($package->flow);
                $this->user->last_check_in_time = time();
                if($this->user->save()){
                    try {
                        //更新流量变更日志
                        $log = new CheckInLog();
                        $log->user_id = Auth::getUser()->id;
                        $log->traffic = Tools::toMB($package->flow);
                        $log->checkin_at = time();
                        $log->save();
                    } catch (\Exception $e) {}
                }else{
                    $this->myError(3006,'支付失败,更新用户流量失败');
                    exit();
                }
                //共享流量服务器套餐处理
                if($package->server == 0){
                    $buy->status = 2;
                    $buy->remark = '系统自动发货';
                    if(!$buy->save()){
                        $this->myError(3007,'支付失败,更新用户订单状态失败');
                        exit();
                    }
                }
                //独立专线服务器套餐处理
                if($package->server == 1){
                    $buy->status = 1;
                    $buy->remark = '请耐心等待管理员发货';
                    if(!$buy->save()){
                        $this->myError(3007,'支付失败,更新用户订单状态失败');
                        exit();
                    }
                }
            }else{
                $this->myError(3008,'支付失败,回调数据异常');
                exit();
            }
        }catch(Exception $e){
            $this->myError(3009,'支付失败,'.$e);
            exit();
        }
        $this->mySuccess(3010,'支付成功,感谢您的支持,已成功订购套餐: < '.$package->name.' >');
        exit();
    }

    public function index($request, $response, $args)
    {
        $msg = DbConfig::get('user-index');
        if ($msg == null) {
            $msg = "在后台修改用户中心公告...";
        }
        return $this->view()->assign('msg', $msg)->display('user/index.tpl');
    }

    public function node($request, $response, $args)
    {
        header("Content-type:text/html;charset=utf-8");
        $msg = DbConfig::get('user-node');
        $user = Auth::getUser();
        $buys = Buy::where(array('user_id'=>$this->user->id))->orderBy('update_at','desc')->get();
        $public = Node::where(array('type'=>1,'server_type'=>0))->orderBy('sort')->get();
        if(!empty($buys)){
            $id = '';
            foreach($buys as $buy){
                $id .= $buy->node_id.',';
            }
            $private = Node::where('id',trim($id,','))->get();
        }else{
            $private = null;
        }
        return $this->view()->assign('private',$private)->assign('nodes', $public)->assign('user', $user)->assign('msg', $msg)->display('user/node.tpl');
    }


    public function nodeInfo($request, $response, $args)
    {
        $id = $args['id'];
        $node = Node::find($id);

        if ($node == null) {

        }
        $ary['server'] = $node->server;
        $ary['server_port'] = $this->user->port;
        $ary['password'] = $this->user->passwd;
        $ary['method'] = $node->method;
        if ($node->custom_method) {
            $ary['method'] = $this->user->method;
        }
        $json = json_encode($ary);
        $json_show = json_encode($ary, JSON_PRETTY_PRINT);
        $ssurl = $ary['method'] . ":" . $ary['password'] . "@" . $ary['server'] . ":" . $ary['server_port'];
        $ssqr = "ss://" . base64_encode($ssurl);

        $surge_base = Config::get('baseUrl') . "/downloads/ProxyBase.conf";
        $surge_proxy = "#!PROXY-OVERRIDE:ProxyBase.conf\n";
        $surge_proxy .= "[Proxy]\n";
        $surge_proxy .= "Proxy = custom," . $ary['server'] . "," . $ary['server_port'] . "," . $ary['method'] . "," . $ary['password'] . "," . Config::get('baseUrl') . "/downloads/SSEncrypt.module";
        return $this->view()->assign('json', $json)->assign('json_show', $json_show)->assign('ssqr', $ssqr)->assign('surge_base', $surge_base)->assign('surge_proxy', $surge_proxy)->display('user/nodeinfo.tpl');
    }

    public function profile($request, $response, $args)
    {
        $buy = Buy::where('user_id', $this->user->id)->get();
        foreach($buy as $key => $val){
            //查找昵称
            $user = User::find($val->user_id);
            if(!empty($user)){
                $buy[$key]->nickName = $user->user_name;
            }else{
                $buy[$key]->nickName = '不存在的账户';
            }
            //查找节点名称和状态
            $node = Node::find($val->node_id);
            if(!empty($node)){
                $buy[$key]->serverName = $node->name;
                $buy[$key]->serverStatus = $node->status;
            }else{
                $buy[$key]->serverName = '未分配服务器';
                $buy[$key]->serverStatus = '未分配服务器';
            }
            //查找套餐名称
            $package = Package::find($val->package_id);
            if(!empty($package)){
                $buy[$key]->packageName = $package->name;
                $buy[$key]->packageType = $package->server;
            }else{
                $buy[$key]->packageName = '不存在的套餐';
                $buy[$key]->packageType = 'no';
            }
        }
        return $this->view()->assign('buys',$buy)->display('user/profile.tpl');
    }

    public function edit($request, $response, $args)
    {
        return $this->view()->display('user/edit.tpl');
    }


    public function invite($request, $response, $args)
    {
        $codes = $this->user->inviteCodes();
        return $this->view()->assign('codes', $codes)->display('user/invite.tpl');
    }

    public function doInvite($request, $response, $args)
    {
        $n = $this->user->invite_num;
        if ($n < 1) {
            $res['ret'] = 0;
            return $response->getBody()->write(json_encode($res));
        }
        for ($i = 0; $i < $n; $i++) {
            $char = Tools::genRandomChar(32);
            $code = new InviteCode();
            $code->code = $char;
            $code->user_id = $this->user->id;
            $code->save();
        }
        $this->user->invite_num = 0;
        $this->user->save();
        $res['ret'] = 1;
        return $this->echoJson($response, $res);
    }

    public function sys($request, $response, $args)
    {
        return $this->view()->assign('ana', "")->display('user/sys.tpl');
    }

    public function updatePassword($request, $response, $args)
    {
        $oldpwd = $request->getParam('oldpwd');
        $pwd = $request->getParam('pwd');
        $repwd = $request->getParam('repwd');
        $user = $this->user;
        if (!Hash::checkPassword($user->pass, $oldpwd)) {
            $res['ret'] = 0;
            $res['msg'] = "旧密码错误";
            return $response->getBody()->write(json_encode($res));
        }
        if ($pwd != $repwd) {
            $res['ret'] = 0;
            $res['msg'] = "两次输入不符合";
            return $response->getBody()->write(json_encode($res));
        }

        if (strlen($pwd) < 8) {
            $res['ret'] = 0;
            $res['msg'] = "密码太短啦";
            return $response->getBody()->write(json_encode($res));
        }
        $hashPwd = Hash::passwordHash($pwd);
        $user->pass = $hashPwd;
        $user->save();

        $res['ret'] = 1;
        $res['msg'] = "ok";
        return $this->echoJson($response, $res);
    }

    public function updateSsPwd($request, $response, $args)
    {
        $user = Auth::getUser();
        $pwd = $request->getParam('sspwd');
        $user->updateSsPwd($pwd);
        $res['ret'] = 1;
        return $this->echoJson($response, $res);
    }

    public function updateMethod($request, $response, $args)
    {
        $user = Auth::getUser();
        $method = $request->getParam('method');
        $method = strtolower($method);
        $user->updateMethod($method);
        $res['ret'] = 1;
        return $this->echoJson($response, $res);
    }

    public function logout($request, $response, $args)
    {
        Auth::logout();
        $newResponse = $response->withStatus(302)->withHeader('Location', '/auth/login');
        return $newResponse;
    }

    public function doCheckIn($request, $response, $args)
    {
        if (!$this->user->isAbleToCheckin()) {
            $res['msg'] = "您似乎已经签到过了...";
            $res['ret'] = 1;
            return $response->getBody()->write(json_encode($res));
        }
        $traffic = rand(Config::get('checkinMin'), Config::get('checkinMax'));
        $trafficToAdd = Tools::toMB($traffic);
        $this->user->transfer_enable = $this->user->transfer_enable + $trafficToAdd;
        $this->user->last_check_in_time = time();
        $this->user->save();
        // checkin log
        try {
            $log = new CheckInLog();
            $log->user_id = Auth::getUser()->id;
            $log->traffic = $trafficToAdd;
            $log->checkin_at = time();
            $log->save();
        } catch (\Exception $e) {
        }
        $res['msg'] = sprintf("获得了 %u MB流量.", $traffic);
        $res['ret'] = 1;
        return $this->echoJson($response, $res);
    }

    public function kill($request, $response, $args)
    {
        return $this->view()->display('user/kill.tpl');
    }

    public function handleKill($request, $response, $args)
    {
        $user = Auth::getUser();
        $passwd = $request->getParam('passwd');
        // check passwd
        $res = array();
        if (!Hash::checkPassword($user->pass, $passwd)) {
            $res['ret'] = 0;
            $res['msg'] = " 密码错误";
            return $this->echoJson($response, $res);
        }
        Auth::logout();
        $user->delete();
        $res['ret'] = 1;
        $res['msg'] = "GG!您的帐号已经从我们的系统中删除.";
        return $this->echoJson($response, $res);
    }

    public function trafficLog($request, $response, $args)
    {
        $pageNum = 1;
        if (isset($request->getQueryParams()["page"])) {
            $pageNum = $request->getQueryParams()["page"];
        }
        $traffic = TrafficLog::where('user_id', $this->user->id)->orderBy('id', 'desc')->paginate(15, ['*'], 'page', $pageNum);
        $traffic->setPath('/user/trafficlog');
        return $this->view()->assign('logs', $traffic)->display('user/trafficlog.tpl');
    }
}
