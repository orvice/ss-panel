<?php

namespace App\Services;

use App\Models\Node;
use App\Models\User;
use App\Utils\Tools;

class Analytic
{
    public function getTotalUser()
    {
        return User::count();
    }

    public function getCheckInUser()
    {
        return User::where('last_check_in_time', '>', 0)->count();
    }

    public function getTrafficTotal()
    {
        $total = User::sum('u') + USer::sum('d');

        return Tools::flowAutoShow($total);
    }

    public function getOnlineUser($time)
    {
        $time = time() - $time;

        return User::where('t', '>', $time)->count();
    }

    public function getTotalNode()
    {
        return Node::count();
    }

    public function userCount()
    {
        return User::all()->count();
    }

    public function checkinUserCount()
    {
        return User::where('last_checkin_time', '>', 1)->count();
    }

    public function activedUserCount()
    {
        return User::where('t', '>', 1)->count();
    }

    public function totalTraffic()
    {
        $u = User::all()->sum('u');
        $d = User::all()->sum('d');

        return Tools::flowAutoShow($u + $d);
    }
}
