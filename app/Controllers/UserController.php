<?php

namespace App\Controllers;

use App\Services\Auth;

/**
 *  HomeController
 */

class UserController extends BaseController
{

    public function home()
    {
        return $this->view()->display('user/index.tpl');
    }

    public function node(){

    }

    public function profile(){

    }

    public function invite(){

    }

    public function sys(){

    }

    public function updateSsPwd($request, $response, $next){
        $user = Auth::getUser();
        $pwd =  $request->getParam('sspwd');
        $user->updateSsPwd($pwd);
    }

    public function logout(){
        Auth::logout();
    }

}