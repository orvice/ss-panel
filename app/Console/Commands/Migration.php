<?php


namespace App\Console\Commands;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Services\Databases\Migration as MigrationService;


class Migration extends Base
{
    protected function configure()
    {
        $this->setName('migrate');
        $this->setDescription('Run Migrations');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $m = new MigrationService();
        if( !$m->getMigrator()->repositoryExists()){
            $output->writeln("create migrations table");
            $m->getMigrator()->getRepository()->createRepository();
        }
        $m->getMigrator()->run(base_path('databases'));
    }


}