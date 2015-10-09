<?php

namespace App\Controllers;

use App\Models\InviteCode;

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
        $codes = InviteCode::where('user','=','0')->get();
        return $this->view()->assign('codes',$codes)->display('code.tpl');
    }

    public function tos(){
        return $this->view()->display('tos.tpl');
    }

}