<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Controllers\BaseController;
use App\Utils\Hash;

class UserController extends BaseController
{
    public function index(){
        $users = User::all();
        return $this->view()->assign('users',$users)->display('admin/user/index.tpl');
    }

    public function edit($request, $response, $args){
        $id = $args['id'];
        $user = User::find($id);
        if ($user == null){

        }
        return $this->view()->assign('user',$user)->display('admin/user/edit.tpl');
    }

    public function update($request, $response, $args){
        $id = $args['id'];
        $user = User::find($id);

        $user->email =  $request->getParam('email');
        if ($request->getParam('pass') != '') {
            $user->pass = Hash::passwordHash($request->getParam('pass'));
        }
        $user->port =  $request->getParam('port');
        $user->passwd = $request->getParam('passwd');
        $user->invite_num = $request->getParam('invite_num');
        $user->method = $request->getParam('method');
        $user->enable = $request->getParam('enable');
        $user->is_admin = $request->getParam('is_admin');
        $user->ref_by = $request->getParam('ref_by');
        if(!$user->save()){
            $rs['ret'] = 0;
            $rs['msg'] = "修改失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "修改成功";
        return $response->getBody()->write(json_encode($rs));
    }
}