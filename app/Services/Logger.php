<?php

namespace App\Services;

use App\Models\Log;
use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonoLogger;

class Logger
{
    /**
     * @return MonoLogger
     */
    public static function logger()
    {
        $logger = new MonoLogger('ss-panel v3');
        $fileHandler = new StreamHandler(base_path('/storage/logs/app.log'));
        $logger->pushHandler($fileHandler);

        return $logger;
    }

    public static function newDbLog($type, $msg)
    {
        $log = new Log();
        $log->type = $type;
        $log->msg = $msg;
        $log->created_time = time();

        return $log->save();
    }

    /**
     * @param $msg
     *
     * @return bool
     */
    public static function info($msg)
    {
        return self::logger()->info($msg);
    }

    /**
     * @param $msg
     *
     * @return bool
     */
    public static function error($msg)
    {
        return self::logger()->err($msg);
    }

    /**
     * @param $msg
     *
     * @return bool
     */
    public static function debug($msg)
    {
        return self::logger()->debug($msg);
    }

    /**
     * @param $msg
     *
     * @return bool
     */
    public static function warning($msg)
    {
        return self::logger()->warning($msg);
    }
}
