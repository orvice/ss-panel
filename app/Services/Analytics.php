<?php

namespace App\Services;

use App\Models\User;

class Analytics
{
    public function getTotalUser(){
        return User::count();
    }

    public function getCheckinUser(){
        return User::where('last_check_in_time','>',0)->count();
    }
}