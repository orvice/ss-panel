<?php


namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use App\Models\Buy;
use App\Models\User;
use App\Models\Node;
use App\Models\Package;

class BuyController extends AdminController
{
    public function index($request, $response, $args){
        $buy = Buy::all();
        foreach($buy as $key => $val){
            //查找昵称
            $user = User::find($val->user_id);
            if(!empty($user)){
                $buy[$key]->nickName = $user->user_name;
            }else{
                $buy[$key]->nickName = '不存在的账户';
            }
            //查找节点名称和状态
            $node = Node::find($val->node_id);
            if(!empty($node)){
                $buy[$key]->serverName = $node->name;
                $buy[$key]->serverStatus = $node->status;
            }else{
                $buy[$key]->serverName = '未分配服务器';
                $buy[$key]->serverStatus = '未分配服务器';
            }
            //查找套餐名称
            $package = Package::find($val->package_id);
            if(!empty($package)){
                $buy[$key]->packageName = $package->name;
            }else{
                $buy[$key]->packageName = '不存在的套餐';
            }
        }
        return $this->view()->assign('buys', $buy)->display('admin/buy/index.tpl');
    }

    public function update($request, $response, $args){
        $buy = Buy::find($args['id']);

        $buy->status = $request->getParam('status');
        $buy->node_id = $request->getParam('node_id');
        $buy->remark = $request->getParam('remark');
        if (!$buy->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = "订单记录修改失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "订单记录修改成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function edit($request, $response, $args){
        $buy = Buy::find($args['id']);
        //查找昵称
        $user = User::find($buy->user_id);
        if(!empty($user)){
            $buy->nickName = $user->user_name;
        }else{
            $buy->nickName = '不存在的账户';
        }
        //查找节点名称和状态
        $node = Node::find($buy->node_id);
        if(!empty($node)){
            $buy->serverName = $node->name;
            $buy->serverStatus = $node->status;
        }else{
            $buy->serverName = '未分配服务器';
            $buy->serverStatus = '未分配服务器';
        }
        //查找套餐名称
        $package = Package::find($buy->package_id);
        if(!empty($package)){
            $buy->packageName = $package->name;
        }else{
            $buy->packageName = '不存在的套餐';
        }
        return $this->view()->assign('res',array('buy'=>$buy,'node'=>Node::all()))->display('admin/buy/edit.tpl');
    }
}