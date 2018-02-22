<?php


namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Models\User;
use App\Utils\Tools;
use App\Utils\Hash;
use App\Contracts\Codes\Cfg;

class CreateAdmin extends Base implements Cfg
{

    protected function configure()
    {
        $this->setName('createAdmin');
        $this->setDescription('Create a admin');
        $this->addArgument('email', InputArgument::REQUIRED);
        $this->addArgument('pass', InputArgument::REQUIRED);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $email = $input->getArgument('email');
        $pass = $input->getArgument('pass');
        $output->writeln(sprintf("create admin with email: %s",$email));

        $newUser = false;
        $u = function () use($email,$newUser){
            $u = User::where('email',$email)->first();
            if($u != null){
                return $u;
            }
            $u =  new User();
            $u->email = $email;
            return $u;
        };
        $user = $u();
        if(!$user->port){
            $newUser =  true;
        }
        $this->createUser($user,$pass,$newUser);
    }

    /**
     * @param User $user
     * @param $passwd
     * @param $isNewUser
     * @return bool
     */
    protected function createUser(User $user,$passwd,$isNewUser){
        $user->user_name = "admin";
        $user->is_admin  = 1;
        // $user->email = $email;
        $user->pass = Hash::passwordHash($passwd);
        if($isNewUser){
            $user->passwd = Tools::genRandomChar(6);
            $user->port = Tools::getLastPort() + 1;
            $user->t = 0;
            $user->u = 0;
            $user->d = 0;
            $user->transfer_enable = Tools::toGB(db_config(self::DefaultTraffic, 1));
            $user->invite_num = db_config(self::DefaultInviteNum, 10);
            $user->reg_ip = '127.0.0.1';
            $user->ref_by = 0;
            $user->v2ray_uuid = Tools::genUUID();
            $user->v2ray_alter_id = config('v2ray.alter_id');
            $user->v2ray_level = config('v2ray.level');
        }
        return $user->save();
    }
}