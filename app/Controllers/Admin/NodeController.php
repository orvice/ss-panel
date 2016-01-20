<?php

namespace App\Controllers\Admin;

use App\Models\Node;
use App\Controllers\BaseController;

class NodeController extends BaseController
{
    public function index(){
        $nodes = Node::all();
        return $this->view()->assign('nodes',$nodes)->display('admin/node/index.tpl');
    }

    public function create($request, $response, $args){
        return $this->view()->display('admin/node/create.tpl');
    }

    public function add($request, $response, $args){

    }

    public function edit($request, $response, $args){
        $id = $args['id'];
        $node = Node::find($id)->first();
        if ($node == null){

        }
        return $this->view()->assign('node',$node)->display('admin/node/index.tpl');
    }

    public function del($request, $response, $args){

    }
}