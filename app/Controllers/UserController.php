<?php

namespace App\Controllers;

use App\Models\InviteCode;
use App\Services\Auth;
use App\Models\User;
use App\Models\Node;
use App\Services\Config;
use App\Utils\Hash;
use App\Utils\Tools;


/**
 *  HomeController
 */

class UserController extends BaseController
{

    private $user;

    public function __construct(){
        $this->user = Auth::getUser();
    }

    public function index()
    {
        return $this->view()->display('user/index.tpl');
    }

    public function node(){
        $nodes = Node::where('type',1)->orderBy('sort')->get();
        return $this->view()->assign('nodes',$nodes)->display('user/node.tpl');
    }


    public function nodeInfo($request, $response, $args){
        $id = $args['id'];
        $node = Node::find($id);

        if ($node == null){

        }
        /*$ary['server'] = $node->server;
        $ary['server_port'] = $this->user->port;
        $ary['password'] = $this->user->passwd;
        $ary['method'] = $node->method;*/
        if($node->custom_method){
        	$json ="{\n\"server\":".$node->server.",\n\"server_port\":".$this->user->port.",\n\"local_port\":1080,\n\"password\":".$this->user->passwd.",\n\"timeout\":600,\n\"method\":".$this->user->method."\n}";
            /*$ary['method'] = $this->user->method;*/
        }
        else {
        	$json ="{\n\"server\":".$node->server.",\n\"server_port\":".$this->user->port.",\n\"local_port\":1080,\n\"password\":".$this->user->passwd.",\n\"timeout\":600,\n\"method\":".$node->method."\n}";
        }
        /*$json = json_encode($ary);*/
        $ssurl =  $node->method.":".$this->user->passwd."@".$node->server.":".$this->user->port;
        $ssqr = "ss://".base64_encode($ssurl);
        return $this->view()->assign('json',$json)->assign('ssqr',$ssqr)->display('user/nodeinfo.tpl');
    }

    public function profile(){
        return $this->view()->display('user/profile.tpl');
    }

    public function edit(){
        return $this->view()->display('user/edit.tpl');
    }



    public function invite(){
        $codes = $this->user->inviteCodes();
        return $this->view()->assign('codes',$codes)->display('user/invite.tpl');
    }

    public function doInvite($request, $response, $args){
        $n = $this->user->invite_num;
        if ($n < 1){
            $res['ret'] = 0;
            return $response->getBody()->write(json_encode($res));
        }
        for ($i = 0; $i < $n; $i++ ){
            $char = Tools::genRandomChar(32);
            $code = new InviteCode();
            $code->code = $char;
            $code->user_id = $this->user->id;
            $code->save();
        }
        $this->user->invite_num = 0;
        $this->user->save();
        $res['ret'] = 1;
        return $response->getBody()->write(json_encode($res));
    }

    public function sys(){
        return $this->view()->assign('ana',"")->display('user/sys.tpl');

    }

    public function updatePassword($request, $response, $args){
        $oldpwd =  $request->getParam('oldpwd');
        $pwd =  $request->getParam('pwd"');
        $repwd =  $request->getParam('repwd"');
        $user = $this->user;
        if (!Hash::checkPassword($user->pass,$oldpwd)){
            $res['ret'] = 0;
            $res['msg'] = "旧密码错误";
            return $response->getBody()->write(json_encode($res));
        }
        if($pwd != $repwd){
            $res['ret'] = 0;
            $res['msg'] = "两次输入不符合";
            return $response->getBody()->write(json_encode($res));
        }

        if(strlen($pwd) < 8){
            $res['ret'] = 0;
            $res['msg'] = "密码太短啦";
            return $response->getBody()->write(json_encode($res));
        }
        $hashPwd = Hash::passwordHash($pwd);
        $user->pass = $hashPwd;
        $user->save();

        $res['ret'] = 1;
        $res['msg'] = "ok";
        return $response->getBody()->write(json_encode($res));
    }

    public function updateSsPwd($request, $response, $args){
        $user = Auth::getUser();
        $pwd =  $request->getParam('sspwd');
        $user->updateSsPwd($pwd);
        $res['ret'] = 1;
        return $response->getBody()->write(json_encode($res));
    }

    public function updateMethod($request, $response, $args){
        $user = Auth::getUser();
        $method =  $request->getParam('method');
        $method = strtolower($method);
        $user->updateMethod($method);
        $res['ret'] = 1;
        return $response->getBody()->write(json_encode($res));
    }

    public function logout($request, $response, $args){
        Auth::logout();
        $newResponse = $response->withStatus(302)->withHeader('Location', '/auth/login');
        return $newResponse;
    }

    public function doCheckIn($request, $response, $args){
        if(!$this->user->isAbleToCheckin()){
            $res['msg'] = "您似乎已经签到过了...";
            $res['ret'] = 1;
            return $response->getBody()->write(json_encode($res));
        }
        $traffic = rand(Config::get('checkinMin'),Config::get('checkinMax'));
        $this->user->transfer_enable = $this->user->transfer_enable+ Tools::toMB($traffic);
        $this->user->last_check_in_time = time();
        $this->user->save();
        $res['msg'] = sprintf("获得了 %u MB流量.",$traffic);
        $res['ret'] = 1;
        return $response->getBody()->write(json_encode($res));
    }


}