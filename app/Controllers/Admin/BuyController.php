<?php


namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use App\Models\Buy;

class BuyController extends AdminController
{
    public function index($request, $response, $args){
        $buy = Buy::all();
        return $this->view()->assign('buys', $buy)->display('admin/buy/index.tpl');
    }

    public function update($request, $response, $args){
        $buy = Buy::find($args['id']);

        $buy->name = $request->getParam('name');
        $buy->server = $request->getParam('server');
        $buy->money_type = $request->getParam('money_type');
        $buy->money = $request->getParam('money');
        $buy->flow = $request->getParam('flow');
        $buy->desc = $request->getParam('desc');
        if (!$buy->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = "购买记录修改失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "购买记录修改成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function edit($request, $response, $args){
        $buy = Buy::find($args['id']);
        return $this->view()->assign('package',$buy)->display('admin/buy/edit.tpl');
    }
}