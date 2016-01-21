<?php

namespace App\Controllers;

use Smarty;

use App\Services\Auth;

/**
 * BaseController
 */

use App\Services\Config;

class BaseController
{

    public $view;

    public $smarty;

    public function construct__(){

    }

    public function smarty(){
        //global $config;
        $smarty=new smarty(); //实例化smarty
        $smarty->settemplatedir(BASE_PATH.'/views/'.Config::get('theme').'/'); //设置模板文件存放目录
        $smarty->setcompiledir(BASE_PATH.'/storage/framework/smarty/compile/'); //设置生成文件存放目录
        $smarty->setcachedir(BASE_PATH.'/storage/framework/smarty/cache/'); //设置缓存文件存放目录
        // add config
        $smarty->assign('config',$_ENV);
        $smarty->assign('user',Auth::getUser());
        $this->smarty = $smarty;
        return $smarty;
    }

    public function view(){
        return $this->smarty();
    }

    public function echoJson(){

    }
}