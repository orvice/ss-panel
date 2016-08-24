<?php

namespace App\Services;

use Smarty;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Filesystem\Filesystem;

class View
{
    public static function getSmarty()
    {
        $smarty = new smarty(); //实例化smarty
        $smarty->settemplatedir(BASE_PATH . '/resources/views/' . Config::get('theme') . '/'); //设置模板文件存放目录
        $smarty->setcompiledir(BASE_PATH . '/storage/framework/smarty/compile/'); //设置生成文件存放目录
        $smarty->setcachedir(BASE_PATH . '/storage/framework/smarty/cache/'); //设置缓存文件存放目录
        // add config
        $smarty->assign('config', Config::getPublicConfig());
        $smarty->assign('lang', self::getLang());
        $smarty->assign('user', Auth::getUser());
        $smarty->assign('analyticsCode', DbConfig::get('analytics-code'));
        return $smarty;
    }

    protected static function getLang()
    {
        $lang = Config::get('lang');
        // Prepare the FileLoader
        $loader = new FileLoader(new Filesystem(), BASE_PATH . '/resources/lang/');
        // Register the English translator
        $trans = new Translator($loader, $lang);
        return $trans;
    }

}