<?php

namespace App\Controllers\Admin;

use App\Models\Node;
use App\Controllers\BaseController;

class NodeController extends BaseController
{
    public function index(){
        $nodes = Node::all();
        return $this->view()->assign('nodes',$nodes)->display('admin/node.tpl');
    }

    public function create(){

    }

    public function edit(){

    }
}