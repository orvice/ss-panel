<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use App\Models\User;
use App\Models\Node;
use App\Utils\Hash;
use App\Utils\Tools;

class UserController extends AdminController
{
    public function index($request, $response, $args)
    {
        $pageNum = 1;
        if (isset($request->getQueryParams()["page"])) {
            $pageNum = $request->getQueryParams()["page"];
        }
        $users = User::orderBy('t','desc')->paginate(15, ['*'], 'page', $pageNum);
        $users->setPath('/admin/user');
        return $this->view()->assign('users', $users)->display('admin/user/index.tpl');
    }

    public function edit($request, $response, $args)
    {
        $id = $args['id'];
        $user = User::find($id);
        if ($user == null) {

        }
        $method = Node::getCustomerMethod();
        return $this->view()->assign('user', $user)->assign('method', $method)->display('admin/user/edit.tpl');
    }

    public function update($request, $response, $args)
    {
        $id = $args['id'];
        $user = User::find($id);

        $user->user_name = $request->getParam('user_name');
        $user->email = $request->getParam('email');
        if ($request->getParam('pass') != '') {
            $user->pass = Hash::passwordHash($request->getParam('pass'));
        }
        if ($request->getParam('passwd') != '') {
            $user->passwd = $request->getParam('passwd');
        }
        $user->port = $request->getParam('port');
        $user->transfer_enable = Tools::toGB($request->getParam('transfer_enable'));
        $user->invite_num = $request->getParam('invite_num');
        $user->method = $request->getParam('method');
        $user->enable = $request->getParam('enable');
        $user->is_admin = $request->getParam('is_admin');
        $user->ref_by = $request->getParam('ref_by');
        if (!$user->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = "修改失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "修改成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function extendPayment($request, $response, $args)
    {
        $id = $args['id'];
        $user = User::find($id);
        $nowtime = time();
        $user->expire_time = strtotime("+".$request->getParam('month_num')." month",
            $nowtime > $user->expire_time ? $nowtime : $user->expire_time);
        $user->enable = true;
        //邀请激励机制
        if($user->last_get_gift_time == 0 && $user->ref_by != 0)
        {
            //Bonus for current user
            $user->expire_time = strtotime("+15 day", $user->expire_time);
            //Bonus for ref user
            $ref_user = User::find($user->ref_by);
            if(!empty($ref_user))
            {
                $ref_user->expire_time = strtotime("+15 day",
                    $nowtime > $ref_user->expire_time ? $nowtime : $ref_user->expire_time);
                $ref_user->save();
            }
        }
        $user->last_get_gift_time = $nowtime;
        //记log
        if (!$user->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = "修改失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "修改成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function delete($request, $response, $args)
    {
        $id = $args['id'];
        $user = User::find($id);
        if (!$user->delete()) {
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
        $id = $args['id'];
        $user = User::find($id);
        $user->delete();
        $newResponse = $response->withStatus(302)->withHeader('Location', '/admin/user');
        return $newResponse;
    }
}
