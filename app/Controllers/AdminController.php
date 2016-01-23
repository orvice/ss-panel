<?php

namespace App\Controllers;

use App\Models\InviteCode;
use App\Models\Node;
use App\Utils\Tools;
use App\Services\Analytics;

/**
 *  Admin Controller
 */

class AdminController extends BaseController
{

    public function index()
    {
        $sts = new Analytics();
        return $this->view()->assign('sts',$sts)->display('admin/index.tpl');
    }

    public function node(){
        $nodes = Node::all();
        return $this->view()->assign('nodes',$nodes)->display('admin/node.tpl');
    }

    public function sys()
    {
        return $this->view()->display('admin/index.tpl');
    }

    public function invite()
    {
        $codes = InviteCode::where('user_id','=','0')->get();
        return $this->view()->assign('codes',$codes)->display('admin/invite.tpl');
    }

    public function addInvite($request, $response, $args)
    {
        $n =  $request->getParam('num');
        $prefix = $request->getParam('prefix');
        $uid =  $request->getParam('uid');
        if ($n < 1){
            $res['ret'] = 0;
            return $response->getBody()->write(json_encode($res));
        }
        for ($i = 0; $i < $n; $i++ ){
            $char = Tools::genRandomChar(32);
            $code = new InviteCode();
            $code->code = $prefix.$char;
            $code->user_id = $uid;
            $code->save();
        }
        $res['ret'] = 1;
        $res['msg'] = "邀请码添加成功";
        return $response->getBody()->write(json_encode($res));
    }

}