<?php

namespace App\Controllers;

use App\Models\InviteCode;
use App\Services\Auth;
use App\Services\Config;

/**
 *  HomeController
 */
class HomeController extends BaseController
{

    public function index()
    {
        return $this->view()->display('index.tpl');
    }

    public function code()
    {
        $codes = InviteCode::where('user_id', '=', '0')->take(10)->get();
        return $this->view()->assign('codes', $codes)->display('code.tpl');
    }

    public function down()
    {

    }

    public function tos()
    {
        return $this->view()->display('tos.tpl');
    }

}