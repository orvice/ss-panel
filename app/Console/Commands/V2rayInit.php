<?php


namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Models\User;
use App\Utils\Tools;

class V2rayInit extends Base
{
    protected function configure()
    {
        $this->setName('v2ray:init');
        $this->setDescription('Init v2ray Users');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $users = User::all();
        foreach ($users as $user){
            if(strlen($user->v2ray_uuid) == 0){
                $user->v2ray_uuid = Tools::genUUID();
                $user->save();
            }
        }
    }
}