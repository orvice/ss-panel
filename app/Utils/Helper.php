<?php

namespace App\Utils;

use Pongtan\Services\Config;
use Slim\Http\Request;

class Helper
{
    /**
     * @return bool
     */
    public static function isTesting()
    {
        if (config('app.env') === 'testing') {
            return true;
        }

        return false;
    }

    public static function getTokenFromReq(Request $request)
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

    public static function getMuKeyFromReq(Request $request)
    {
        if ($request->hasHeader('Key')) {
            return $request->getHeaderLine('Key');
        }
        if ($request->hasHeader('Token')) {
            return $request->getHeaderLine('Token');
        }
        $params = $request->getQueryParams();
        if (!isset($params['key'])) {
            return null;
        }
        $accessToken = $params['key'];

        return $accessToken;
    }
}
