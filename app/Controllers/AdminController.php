<?php

namespace App\Controllers;

use App\Models\InviteCode;
use App\Models\Node;

/**
 *  AdminController
 */

class AdminController extends BaseController
{

    public function home()
    {
        return $this->view()->display('admin/index.tpl');
    }

    public function node(){
        $nodes = Node::all();
        return $this->view()->assign('nodes',$nodes)->display('admin/node.tpl');
    }

    public function code()
    {
        $codes = InviteCode::where('user','=','0')->get();
        return $this->view()->assign('codes',$codes)->display('admin/code.tpl');
    }



}