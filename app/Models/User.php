<?php

namespace App\Models;

/**
 * User Model
 */

use App\Services\Config;
use App\Utils\Hash;
use App\Utils\Tools;

class User extends Model

{
    protected $table = "user";

    public $isLogin;

    public $isAdmin;

    protected $casts = [
        "t" => 'int',
        "u" => 'int',
        "d" => 'int',
        "port" => 'int',
        "switch" => 'int',
        "transfer_enable" => 'float',
        "enable" => 'int',
        'is_admin' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['pass', 'last_get_gift_time', 'last_rest_pass_time', 'reg_ip', 'is_email_verify', 'user_name', 'ref_by', 'is_admin'];

    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://secure.gravatar.com/avatar/$hash";
    }

    public function isAdmin()
    {
        return $this->attributes['is_admin'];
    }

    public function lastSsTime()
    {
        if ($this->attributes['t'] == 0) {
            return "从未使用喵";
        }
        return Tools::toDateTime($this->attributes['t']);
    }

    public function lastCheckInTime()
    {
        if ($this->attributes['last_check_in_time'] == 0) {
            return "从未签到";
        }
        return Tools::toDateTime($this->attributes['last_check_in_time']);
    }

    public function regDate()
    {
        return $this->attributes['reg_date'];
    }

    public function updatePassword($pwd)
    {
        $this->pass = Hash::passwordHash($pwd);
        $this->save();
    }

    public function updateSsPwd($pwd)
    {
        $this->passwd = $pwd;
        $this->save();
    }

    public function updateMethod($method)
    {
        $this->method = $method;
        $this->save();
    }

    public function updateProtocol($protocol)
    {
        $this->protocol = $protocol;
        $this->save();
    }

    public function updateProtocolParam($protocol_param)
    {
        $this->protocol_param = $protocol_param;
        $this->save();
    }

    public function updateObfs($obfs)
    {
        $this->obfs = $obfs;
        $this->save();
    }

    public function updateObfsParam($obfs_param)
    {
        $this->obfs_param = $obfs_param;
        $this->save();
    }

    public function updateV2rayUUID()
    {
        $this->v2ray_uuid = Tools::genUUID();
        $this->save();
    }

    public function updateV2rayAlterID($alter_id)
    {
        $this->v2ray_alter_id = $alter_id;
        $this->save();
    }

    public function addInviteCode()
    {
        $uid = $this->attributes['id'];
        $code = new InviteCode();
        $code->code = Tools::genRandomChar(32);
        $code->user = $uid;
        $code->save();
    }

    public function addManyInviteCodes($num)
    {
        for ($i = 0; $i < $num; $i++) {
            $this->addInviteCode();
        }
    }

    public function trafficUsagePercent()
    {
        $total = $this->attributes['u'] + $this->attributes['d'];
        $transferEnable = $this->attributes['transfer_enable'];
        if ($transferEnable == 0) {
            return 0;
        }
        $percent = $total / $transferEnable;
        $percent = round($percent, 2);
        $percent = $percent * 100;
        return $percent;
    }

    public function enableTraffic()
    {
        $transfer_enable = $this->attributes['transfer_enable'];
        return Tools::flowAutoShow($transfer_enable);
    }

    public function enableTrafficInGB()
    {
        $transfer_enable = $this->attributes['transfer_enable'];
        return Tools::flowToGB($transfer_enable);
    }

    public function usedTraffic()
    {
        $total = $this->attributes['u'] + $this->attributes['d'];
        return Tools::flowAutoShow($total);
    }

    public function unusedTraffic()
    {
        $total = $this->attributes['u'] + $this->attributes['d'];
        $transfer_enable = $this->attributes['transfer_enable'];
        return Tools::flowAutoShow($transfer_enable - $total);
    }

    public function isAbleToCheckin()
    {
        $last = $this->attributes['last_check_in_time'];
        $hour = Config::get('checkinTime');
        if ($last + $hour * 3600 < time()) {
            return true;
        }
        return false;
    }

    /*
     * @param traffic 单位 MB
     */
    public function addTraffic($traffic)
    {
    }

    public function inviteCodes()
    {
        $uid = $this->attributes['id'];
        return InviteCode::where('user_id', $uid)->get();
    }

    public function expireTime()
    {
        $expire = $this->attributes['expire_time'];
        if ($expire === 0) {
            return '永不过期';
        } else {
            return date('Y-m-d', $expire);
        }
    }
}
