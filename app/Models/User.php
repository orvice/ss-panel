<?php

namespace App\Models;

/*
 * User Model
 */

use App\Services\Config;
use App\Utils\Hash;
use App\Utils\Tools;

class User extends Model
{
    protected $table = 'user';

    public $isLogin;

    public $isAdmin;

    protected $casts = [
        't' => 'int',
        'u' => 'int',
        'd' => 'int',
        'port' => 'int',
        'transfer_enable' => 'float',
        'enable' => 'int',
        'is_admin' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['pass', 'last_get_gift_time', 'last_rest_pass_time',
        'reg_ip', 'is_email_verify', 'ref_by' ];

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
            return lang('base.never');
        }

        return Tools::toDateTime($this->attributes['t']);
    }

    public function ifUsedIn($hours)
    {
        return (time() - $this->attributes['t']) <= ($hours * 3600);
    }

    public function lastCheckInTime()
    {
        if ($this->attributes['last_check_in_time'] == 0) {
            return lang('base.never');
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

    public function updateCustomMethod($custom_method)
    {
        $this->custom_method = $custom_method;
        $this->save();
    }

    public function updateProtocol($protocol)
    {
        $this->protocol = $protocol;
        $this->save();
    }

    public function updateObfs($obfs)
    {
        $this->obfs = $obfs;
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
        for ($i = 0; $i < $num; ++$i) {
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

    public function getId()
    {
        return $this->attributes['id'];
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
        $hour = config('app.checkin_time');
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
}
