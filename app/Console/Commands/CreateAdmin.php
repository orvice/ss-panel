<?php


namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CreateAdmin extends Base
{
    protected function configure()
    {
        $this->setName('createAdmin');
        $this->setDescription('Create a admin');
        $this->addArgument('email', InputArgument::REQUIRED);
        $this->addArgument('pass', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $email = $input->getArgument('email');
        $pass = $input->getArgument('pass');
        $output->writeln(sprintf("create admin with email: %s",$email));

    }
}