<?php

namespace App\Controllers;

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

        $rs['ret'] = 1;
        $rs['msg'] = 'ok';
        return $response->getBody()->write(json_encode($rs));
    }

    public function handleToken($request, $response, $next){
        
    }
}