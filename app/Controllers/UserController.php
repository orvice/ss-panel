<?php

namespace App\Controllers;

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



}