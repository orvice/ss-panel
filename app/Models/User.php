<?php

namespace App\Models;

/**
 * User Model
 */

use App\Utils\Tools;
use App\Utils\Hash;
use App\Models\InviteCode;
use App\Services\Config;

class User extends Model

{
    protected $table = "user";

    public $isLogin;

    public $isAdmin;

    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://secure.gravatar.com/avatar/$hash";
    }

    public function isAdmin(){
        return $this->attributes['is_admin'];
    }

    public function lastSsTime(){
        return Tools::toDateTime($this->attributes['t']);
    }

    public function lastCheckInTime(){
        return Tools::toDateTime($this->attributes['last_check_in_time']);
    }

    public function regDate(){
        return $this->attributes['reg_date'];
    }

    public function updatePassword($pwd){
        $this->pass = Hash::passwordHash($pwd);
        $this->save();
    }

    public function updateSsPwd($pwd){
        $this->passwd = $pwd;
        $this->save();
    }

    public function updateMethod($method){
        $this->method = $method;
        $this->save();
    }

    public function addInviteCode(){
        $uid = $this->attributes['id'];
        $code = new InviteCode();
        $code->code = Tools::genRandomChar(32);
        $code->user = $uid;
        $code->save();
    }

    public function addManyInviteCodes($num){
        for($i = 0; $i < $num; $i++){
            $this->addInviteCode();
        }
    }

    public function trafficUsagePercent(){
        $total = $this->attributes['u'] + $this->attributes['d'];
        $transfer_enable = $this->attributes['transfer_enable'];
        $percent = $total/$transfer_enable;
        $percent = round($percent,2);
        $percent = $percent*100;
        return $percent;
    }

    public function enableTraffic(){
        $transfer_enable = $this->attributes['transfer_enable'];
        return Tools::flowAutoShow($transfer_enable);
    }

    public function usedTraffic(){
        $total = $this->attributes['u'] + $this->attributes['d'];
        return Tools::flowAutoShow($total);
    }

    public function unusedTraffic(){
        $total = $this->attributes['u'] + $this->attributes['d'];
        $transfer_enable = $this->attributes['transfer_enable'];
        return Tools::flowAutoShow($transfer_enable-$total);
    }

    public function isAbleToCheckin(){
        $last = $this->attributes['last_check_in_time'];
        $hour = Config::get('checkinTime');
        if($last + $hour*3600 < time() ){
            return true;
        }
        return false;
    }
    /*
     * @param traffic 单位 MB
     */
    public function addTraffic($traffic){
    }

    public function inviteCodes(){
        $uid = $this->attributes['id'];
        return InviteCode::where('user_id',$uid)->get();
    }

}
