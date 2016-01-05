<?php

namespace App\Controllers;

use App\Models\InviteCode;
use App\Models\Node;

/**
 *  Admin Controller
 */

class AdminController extends BaseController
{

    public function index()
    {
        return $this->view()->display('admin/index.tpl');
    }

    public function node(){
        $nodes = Node::all();
        return $this->view()->assign('nodes',$nodes)->display('admin/node.tpl');
    }

    public function code()
    {

    }

    public function invite()
    {
        $codes = InviteCode::where('user_id','=','0')->get();
        return $this->view()->assign('codes',$codes)->display('admin/invite.tpl');
    }

    public function addInvite()
    {
        $codes = InviteCode::where('user_id','=','0')->get();
        return $this->view()->assign('codes',$codes)->display('admin/invite.tpl');
    }

}