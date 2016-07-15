<?php

namespace App\Controllers;

use App\Models\CheckInLog;
use App\Models\InviteCode;
use App\Models\Node;
use App\Models\User;
use App\Models\TrafficLog;
use App\Services\Auth;
use App\Services\Config;
use App\Services\DbConfig;
use App\Utils\Hash;
use App\Utils\Tools;


/**
 *  HomeController
 */
class UserController extends BaseController
{

    private $user;
    private $node;

    public function __construct()
    {
        $this->user = Auth::getUser();
    }

    public function view()
    {
        $userFooter = DbConfig::get('user-footer');
        return parent::view()->assign('userFooter', $userFooter);
    }

    public function index($request, $response, $args)
    {
        $msg = DbConfig::get('user-index');
        if ($msg == null) {
            $msg = "在后台修改用户中心公告...";
        }
        
        $nodes = Node::all();
    		$android_add="";
	    	foreach($nodes as $node)
	    	{
	    		if($android_add=="")
	    		{
	    			$ary['server'] = $node->server;
	    			$ary['server_port'] = $this->user->port;
	    			$ary['password'] = $this->user->passwd;
	    			$ary['method'] = $this->user->method;
/*	    			if ($this->user->custom_method) {
	    				$ary['method'] = $this->user->method;
	    			}
	    			*/
	    			$ssurl = $ary['method'] . ":" . $ary['password'] . "@" . $ary['server'] . ":" . $ary['server_port'];
	    			$ssqr = "ss://" . base64_encode($ssurl);
	    			$android_add .="'".$ssqr."'";
	    		}
	    		else
	    		{
	    			$ary['server'] = $node->server;
	    			$ary['server_port'] = $this->user->port;
	    			$ary['password'] = $this->user->passwd;
	    			$ary['method'] = $this->user->method;
/*	    			if ($this->user->custom_method) {
	    				$ary['method'] = $this->user->method;
	    			}*/
	    			
	    			$ssurl = $ary['method'] . ":" . $ary['password'] . "@" . $ary['server'] . ":" . $ary['server_port'];
	    			$ssqr = "ss://" . base64_encode($ssurl);
	    			$android_add .=",'".$ssqr."'";
	    		}
	    	}    
        return $this->view()->assign('msg', $msg)->assign("android_add",$android_add)->assign('baseUrl',Config::get('baseUrl'))->display('user/index.tpl');
    }

    public function node($request, $response, $args)
    {
        $msg = DbConfig::get('user-node');
        $user = Auth::getUser();
        $nodes = Node::where('type', 1)->orderBy('sort')->get();
        return $this->view()->assign('nodes', $nodes)->assign('user', $user)->assign('msg', $msg)->display('user/node.tpl');
    }
    
//    public function node($request, $response, $args)
//    {
//    	  $msg = DbConfig::get('user-node');
//        $user = Auth::getUser();
//        $nodes = Node::where('type', 1)->orderBy('sort')->get();
///*			function ($query) {
//				$query->Where("node_group","=",$this->user->node_group)
//					->orWhere("node_group","=",0);
//			}
//		)->where('type', 1)->where("node_class","<=",$this->user->class)->orderBy('name')->get();*/
//		$node_prefix=Array();
//		$node_method=Array();
//		$a=0;
//		$node_order=array();
//		$node_alive=array();
//		$node_prealive=array();
//		$node_heartbeat=Array();
//		$node_bandwidth=Array();
//		
//		foreach ($nodes as $node) {
//			
///*			if($user->class>=$node->node_class&&($user->node_group==$node->node_group||$node->node_group==0)&&($node->node_bandwidth_limit==0||$node->node_bandwidth<$node->node_bandwidth_limit))*/
//			if($node->node_bandwidth_limit==0||$node->node_bandwidth<$node->node_bandwidth_limit)			
//			{
//				$temp=explode(" - ",$node->name);
//				if(!isset($node_prefix[$temp[0]]))
//				{
//					$node_prefix[$temp[0]]=array();
//					$node_order[$temp[0]]=$a;
//					$node_alive[$temp[0]]=0;
//					$node_method[$temp[0]]=$temp[1];
//					$a++;
//				}
//				if($node->sort==0||$node->sort==7||$node->sort==8)
//				{
//					$node_tempalive=$node->getOnlineUserCount();
//					$node_prealive[$node->id]=$node_tempalive;
//					if($node->node_heartbeat!=0)
//					{
//						if(time()-$node->node_heartbeat>90)
//						{
//							$node_heartbeat[$temp[0]]="离线";
//						}
//						else
//						{
//							$node_heartbeat[$temp[0]]="在线";
//						}
//					}
//					else
//					{
//						if(!isset($node_heartbeat[$temp[0]]))
//						{
//							$node_heartbeat[$temp[0]]="暂无数据";
//						}
//					}
//					
//					if($node->node_bandwidth_limit==0)
//					{
//						$node_bandwidth[$temp[0]]=(int)($node->node_bandwidth/1024/1024/1024)." GB / 不限";
//					}
//					else
//					{
//						$node_bandwidth[$temp[0]]=(int)($node->node_bandwidth/1024/1024/1024)." GB / ".(int)($node->node_bandwidth_limit/1024/1024/1024)." GB - ".$node->bandwidthlimit_resetday." 日重置";
//					}
//					
//					if($node_tempalive!="暂无数据")
//					{
//						$node_alive[$temp[0]]=$node_alive[$temp[0]]+$node_tempalive;
//					}
//				}
//				else
//				{
//					$node_prealive[$node->id]="暂无数据";
//					if(!isset($node_heartbeat[$temp[0]]))
//					{
//						$node_heartbeat[$temp[0]]="暂无数据";
//					}
//				}
//				
//				if(strpos($node_method[$temp[0]],$temp[1])===FALSE)
//				{
//					$node_method[$temp[0]]=$node_method[$temp[0]]." ".$temp[1];
//				}
//		
//				
//				
//				array_push($node_prefix[$temp[0]],$node);
//				
//			}
//		}
//		$node_prefix=(object)$node_prefix;
//		$node_order=(object)$node_order;
//        return $this->view()->assign('node_method', $node_method)->assign('node_bandwidth',$node_bandwidth)->assign('node_heartbeat',$node_heartbeat)->assign('node_prefix', $node_prefix)->assign('node_prealive', $node_prealive)->assign('node_order', $node_order)->assign('user', $user)->assign('node_alive', $node_alive)->display('user/node.tpl');
//    }       


    public function nodeInfo($request, $response, $args)
    {
    $user = Auth::getUser();	
        $id = $args['id'];
        $node = Node::find($id);

        if ($node == null) {

        }
        $ary['server'] = $node->server;
        $ary['server_port'] = $this->user->port;
        $ary['password'] = $this->user->passwd;
        $ary['method'] = $this->user->method;		
/*        if ($this->user->custom_method) {
            $ary['method'] = $this->user->method;
        }*/
        $ary['protocol'] = $this->user->protocol;
        $ary['obfs'] = $this->user->obfs;
        if ($this->user->obfs=='http_post'||$this->user->obfs=='http_simple'||$this->user->obfs=='tls1.2_ticket_auth') {
        $ary['obfs_param'] = $this->user->obfs_param;
        }	
        $json = json_encode($ary);
        $json_show = json_encode($ary, JSON_PRETTY_PRINT);
        
        if ($user->obfs=='http_simple' || $user->obfs=='http_post' || $user->obfs=='random_head' || $user->obfs=='tls_simple' || $user->obfs=='tls1.0_session_auth' || $user->obfs=='tls1.2_ticket_auth' || $user->protocol=='verify_simple' || $user->protocol=='verify_deflate' || $user->protocol=='verify_sha1' || $user->protocol=='auth_simple' || $user->protocol=='auth_sha1' || $user->protocol=='auth_sha1_v2')
				{
				
					$ssurl = str_replace("_compatible","",$user->obfs).":".str_replace("_compatible","",$user->protocol).":".$ary['method'] . ":" . $ary['password'] . "@" . $ary['server'] . ":" . $ary['server_port']."/".base64_encode($user->obfs_param);
					$ssqr_s = "ss://" . base64_encode($ssurl);
					$ssqr = "ss://" . base64_encode($ssurl);
				}
				else
				{
					$ssurl = str_replace("_compatible","",$user->obfs).":".str_replace("_compatible","",$user->protocol).":".$ary['method'] . ":" . $ary['password'] . "@" . $ary['server'] . ":" . $ary['server_port']."/".base64_encode($user->obfs_param);
					$ssqr_s = "ss://" . base64_encode($ssurl);					
					$ssurl = $ary['method'] . ":" . $ary['password'] . "@" . $ary['server'] . ":" . $ary['server_port'];
					$ssqr = "ss://" . base64_encode($ssurl);
				}		

/*        $token_1 = LinkController::GenerateSurgeCode($ary['server'],$ary['server_port'],$this->user->id,0,$ary['method']);
				$token_2 = LinkController::GenerateSurgeCode($ary['server'],$ary['server_port'],$this->user->id,1,$ary['method']);*/
					
        $surge_base = Config::get('baseUrl') . "/downloads/ProxyBase.conf";
        $surge_proxy = "#!PROXY-OVERRIDE:ProxyBase.conf\n";
        $surge_proxy .= "[Proxy]\n";
        $surge_proxy .= "Proxy = custom," . $ary['server'] . "," . $ary['server_port'] . "," . $ary['method'] . "," . $ary['password'] . "," . Config::get('baseUrl') . "/downloads/SSEncrypt.module";
         return $this->view()->assign('json', $json)->assign('json_show', $json_show)->assign('ssqr', $ssqr)->assign('ssqr_s', $ssqr_s)->assign('surge_base', $surge_base)->assign('surge_proxy', $surge_proxy)->display('user/nodeinfo.tpl');
 /*        return $this->view()->assign('ary', $ary)->assign('node',$node)->assign('user',$this->user)->assign('json', $json)->assign('link1',Config::get('baseUrl')."/link/".$token_1)->assign('link2',Config::get('baseUrl')."/link/".$token_2)->assign('json_show', $json_show)->assign('ssqr', $ssqr)->assign('ssqr_s', $ssqr_s)->assign('surge_base', $surge_base)->assign('surge_proxy', $surge_proxy)->assign('info_server', $ary['server'])->assign('info_port', $this->user->port)->assign('info_method', $ary['method'])->assign('info_pass', $this->user->passwd)->display('user/nodeinfo.tpl');*/
    }

    public function profile($request, $response, $args)
    {
        return $this->view()->display('user/profile.tpl');
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
    
    public function updateProtocol($request, $response, $args)
    {
        $user = Auth::getUser();
        $protocol = $request->getParam('protocol');
        $protocol = strtolower($protocol);
        $user->updateProtocol($protocol);
        $res['ret'] = 1;
        return $this->echoJson($response, $res);
    }
    
    public function updateObfs($request, $response, $args)
    {
        $user = Auth::getUser();
        $obfs = $request->getParam('obfs');
        $obfs = strtolower($obfs);
        $user->updateObfs($obfs);
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
