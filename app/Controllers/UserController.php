<?php

namespace App\Controllers;

/**
 *  HomeController
 */

class UserController extends BaseController
{

    public function home()
    {
        return $this->view()->display('index.tpl');
    }

}