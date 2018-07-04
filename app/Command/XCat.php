<?php

namespace App\Command;

/***
 * Class XCat
 * @package App\Command
 */

use App\Models\User;
use App\Services\Config;
use App\Utils\Hash;
use App\Utils\Tools;

class XCat
{

    public $argv;

    public function __construct($argv)
    {
        $this->argv = $argv;
    }

    public function boot()
    {
        switch ($this->argv[1]) {
            case("install"):
                return $this->install();
            case("createAdmin"):
                return $this->createAdmin();
            case("initV2ray"):
                return $this->initV2ray();
            case("resetTraffic"):
                return $this->resetTraffic();
            case("sendDiaryMail"):
                return DailyMail::sendDailyMail();
            default:
                return $this->defaultAction();
        }
    }

    public function defaultAction()
    {
    }

    public function install()
    {
        echo "x cat will install ss-panel v3...../n";
    }

    public function createAdmin()
    {
        echo "add admin/ 创建管理员帐号.....";
        // ask for input
        fwrite(STDOUT, "Enter your email/输入管理员邮箱: ");
        // get input
        $email = trim(fgets(STDIN));
        // write input back
        fwrite(STDOUT, "Enter password for: $email / 为 $email 添加密码 ");
        $passwd = trim(fgets(STDIN));
        echo "Email: $email, Password: $passwd! ";
        fwrite(STDOUT, "Press [Y] to create admin..... 按下[Y]确认来确认创建管理员账户..... ");
        $y = trim(fgets(STDIN));
        if (strtolower($y) == "y") {
            echo "start create admin account";
            // create admin user
            // do reg user
            $user = new User();
            $user->user_name = "admin";
            $user->email = $email;
            $user->pass = Hash::passwordHash($passwd);
            $user->passwd = Tools::genRandomChar(6);
            $user->port = Tools::getLastPort() + 1;
            $user->t = 0;
            $user->u = 0;
            $user->d = 0;
            $user->transfer_enable = Tools::toGB(Config::get('defaultTraffic'));
            $user->invite_num = Config::get('inviteNum');
            $user->ref_by = 0;
            $user->is_admin = 1;
            $user->v2ray_uuid = Tools::genUUID();
            $user->v2ray_level = 2;
            $user->v2ray_alter_id = 64;
            if ($user->save()) {
                echo "Successful/添加成功!";

                return true;
            }
            echo "添加失败";

            return false;
        }
        echo "cancel";

        return false;
    }

    public function initV2ray()
    {
        try {
            $users = User::all();
            foreach ($users as $user) {
                if (strlen($user->v2ray_uuid) == 0) {
                    $user->v2ray_uuid = Tools::genUUID();
                    $user->save();
                }
            }
        } catch (\Exception $e) {
            echo $e->getMessage();

            return false;
        }
        echo "完成！";
        return true;
    }

    public function resetTraffic()
    {
        try {
            User::where("enable", 1)->update([
                'd' => 0,
                'u' => 0,
            ]);
        } catch (\Exception $e) {
            echo $e->getMessage();

            return false;
        }

        return "reset traffic successful";
    }
}