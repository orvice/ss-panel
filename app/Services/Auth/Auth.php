<?php

namespace App\Services\Auth;


class Auth extends Token implements AuthInterface
{
    // @todo add header support

    public function login($uid, $time)
    {
        return $this->saveToken($uid, $time);
    }


    public function getUser($input)
    {
        // @todo test support
        $cookie = $this->getCookies();
        if (!isset($cookie[self::SID])) {
            return $this->emptyUser();
        }
        $sid = $cookie[self::SID];
        return $this->getUserFromToken($sid);
    }

    /**
     * @return array
     */
    public function getCookies()
    {
        return $cookie = app()->getContainer()->get('request')->getCookieParams();
    }

    /**
     * @param $input
     * @return bool
     */
    public function logout($input)
    {
        $cookie = $cookie = $this->getCookies();
        if (!isset($cookie[self::SID])) {
            return true;
        }
        $sid = $cookie[self::SID];
        return $this->delToken($sid);
    }
}
