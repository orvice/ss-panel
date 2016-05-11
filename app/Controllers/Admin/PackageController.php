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

    }

    public function update($request, $response, $args){

    }

    public function edit($request, $response, $args){
        print_r($args);
    }

    public function delete($request, $response, $args){
        print_r($args);
    }
}