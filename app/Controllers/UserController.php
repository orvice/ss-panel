<?php

namespace App\Controllers;

use App\Services\Auth;
use App\Models\User;
use App\Models\Node;

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

    }

    public function nodeInfo($request, $response, $args){
        $id = $args['id'];
        $node = Node::find($id);
    }

    public function profile(){

    }

    public function invite(){

    }

    public function sys(){

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