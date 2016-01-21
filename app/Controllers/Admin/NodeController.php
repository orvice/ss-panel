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
        $node = new Node();
        $node->name =  $request->getParam('name');
        $node->server =  $request->getParam('server');
        $node->method =  $request->getParam('method');
        $node->custom_method =  $request->getParam('custom_method');
        $node->info = $request->getParam('info');
        $node->type = $request->getParam('type');
        $node->status = $request->getParam('status');
        $node->status = $request->getParam('order');
        if(!$node->save()){
            $rs['ret'] = 0;
            $rs['msg'] = "添加失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "节点添加成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function edit($request, $response, $args){
        $id = $args['id'];
        $node = Node::find($id)->first();
        if ($node == null){

        }
        return $this->view()->assign('node',$node)->display('admin/node/edit.tpl');
    }

    public function update($request, $response, $args){
        $id = $args['id'];
        $node = Node::find($id)->first();
    }


    public function del($request, $response, $args){
        $id = $args['id'];
        $node = Node::find($id)->first();
        if(!$node->delete()){
            $rs['ret'] = 0;
            $rs['msg'] = "删除失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "删除成功";
        return $response->getBody()->write(json_encode($rs));
    }
}