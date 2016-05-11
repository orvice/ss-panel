<?php


namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use App\Models\Package;

class PackageController extends AdminController
{
    public function index($request, $response, $args){
        $package = Package::all();
        return $this->view()->assign('packages', $package)->display('admin/package/index.tpl');
    }
    public function create($request, $response, $args){
        return $this->view()->display('admin/package/create.tpl');
    }
    public function add($request, $response, $args){
        $package = new Package();
        $package->name = $request->getParam('name');
        $package->server = $request->getParam('server');
        $package->flow = $request->getParam('flow');
        $package->desc = $request->getParam('desc');
        $package->money = $request->getParam('money');
        $package->money_type = $request->getParam('money_type');
        if (!$package->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = "套餐添加失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "套餐添加成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function update($request, $response, $args){
        $package = Package::find($args['id']);

        $package->name = $request->getParam('name');
        $package->server = $request->getParam('server');
        $package->money_type = $request->getParam('money_type');
        $package->money = $request->getParam('money');
        $package->flow = $request->getParam('flow');
        $package->desc = $request->getParam('desc');
        if (!$package->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = "套餐修改失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "套餐修改成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function edit($request, $response, $args){
        $package = Package::find($args['id']);
        return $this->view()->assign('package',$package)->display('admin/package/edit.tpl');
    }

    public function delete($request, $response, $args){
        $package = Package::find($args['id']);
        if (!$package->delete()) {
            $rs['ret'] = 0;
            $rs['msg'] = "删除失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "删除成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function deleteGet($request, $response, $args)
    {
        $package = Package::find($args['id']);
        $package->delete();
        return $this->redirect($response, '/admin/package');
    }
}