<?php


namespace App\Services;

use App\Models\Log;

class Logger
{

    public static function newLog($type, $msg)
    {
        $log = new Log();
        $log->type = $type;
        $log->msg = $msg;
        $log->created_time = time();
        return $log->save();
    }

    public static function info($msg)
    {
        return self::newLog("info", $msg);
    }

    public static function error($msg)
    {
        return self::newLog("error", $msg);
    }

    public static function debug($msg)
    {
        return self::newLog("debug", $msg);
    }
}