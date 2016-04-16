<?php


namespace App\Utils;


use Pongtan\Services\Config;

class Helper
{
    public static function redirect($url)
    {
    }

    /**
     * @return bool
     */
    public static function isTesting()
    {
        if (Config::get('env') === 'testing') {
            return true;
        }
        return false;
    }

    public static function getTokenFromReq($request)
    {
        if ($request->hasHeader('Token')) {
            return $request->getHeaderLine('Token');
        }
        $params = $request->getQueryParams();
        if (!isset($params['access_token'])) {
            return null;
        }
        $accessToken = $params['access_token'];
        return $accessToken;
    }

    public static function getMuKeyFromReq($request)
    {
        if ($request->hasHeader('Key')) {
            return $request->getHeaderLine('Key');
        }
        $params = $request->getQueryParams();
        if (!isset($params['key'])) {
            return null;
        }
        $accessToken = $params['key'];
        return $accessToken;
    }
}