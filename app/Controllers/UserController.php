<?php

namespace App\Controllers;

use App\Models\InviteCode;
use App\Services\Auth;
use App\Models\User;
use App\Models\Node;
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

    public function home()
    {
        return $this->view()->display('user/index.tpl');
    }

    public function node(){
        $nodes = Node::all();
        return $this->view()->assign('nodes',$nodes)->display('user/node.tpl');
    }

    public function nodeInfo($request, $response, $args){
        $id = $args['id'];
        $node = Node::find($id);
        if ($node == null){

        }
    }

    public function profile(){
        return $this->view()->display('user/profile.tpl');
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
        $res['ret'] = 1;
        return $response->getBody()->write(json_encode($res));
    }

    public function sys(){
        return $this->view()->assign('ana',"")->display('user/sys.tpl');

    }

    public function updateSsPwd($request, $response, $args){
        $user = Auth::getUser();
        $pwd =  $request->getParam('sspwd');
        $user->updateSsPwd($pwd);
    }

    public function logout(){
        Auth::logout();
    }



    public function doCheckIn(){

    }

}