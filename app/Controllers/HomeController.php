<?php

namespace App\Controllers;

use App\Models\InviteCode;
use App\Services\Auth;
use App\Services\Config;

/**
 *  HomeController
 */

class HomeController extends BaseController
{

    public function home()
    {
        return $this->view()->display('index.tpl');
    }

    public function code()
    {
        $codes = InviteCode::where('user_id','=','0')->take(10)->get();
        return $this->view()->assign('codes',$codes)->display('code.tpl');
    }

    public function down(){
        
    }

    public function tos(){
        return $this->view()->display('tos.tpl');
    }

    public function doCheckin($request, $response, $args){
        $user = Auth::getUser();
        //权限检查
        if(!$user->isAbleToCheckin()){
            $tranferToAdd = 0;
            $res['msg'] = "签到过了哦";
            return $response->getBody()->write(json_encode($res));
        }
        $tranferToAdd = rand(Config::get('checkinMin'),Config::get('checkinMax'));
        // Add transfer
        $user->addTraffic($tranferToAdd);
        $res['msg'] = "获得了".$tranferToAdd."MB流量";
        return $response->getBody()->write(json_encode($res));
    }

}