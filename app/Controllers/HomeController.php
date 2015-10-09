<?php

namespace App\Controllers;

/**
 *  HomeController
 */

class HomeController extends BaseController
{

    public function home()
    {
        return $this->view()->display('index.tpl');
    }

    public function code()
    {

    }

}