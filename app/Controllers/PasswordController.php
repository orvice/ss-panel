<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Password;
/***
 * Class Password
 * @package App\Controllers
 * 密码重置
 */

class PasswordController extends BaseController
{
    public function reset(){
        return $this->view()->display('password/reset.tpl');
    }

    public function handleReset($request, $response, $next){
        $email =  $request->getParam('email');
        // check limit

        // send email
        $user = User::where('email',$email)->first();
        if ($user == null){
            $rs['ret'] = 0;
            $rs['msg'] = '此邮箱不存在.';
            return $response->getBody()->write(json_encode($rs));
        }
        Password::sendResetEmail($email);
        $rs['ret'] = 1;
        $rs['msg'] = '重置邮件已经发送,请检查邮箱.';
        return $response->getBody()->write(json_encode($rs));
    }

    public function handleToken($request, $response, $next){
        
    }
}