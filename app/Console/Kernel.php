<?php


namespace App\Console;

use Symfony\Component\Console\Application;
use App\Console\Commands;

class Kernel
{
    private $app;

    protected $commands = [
        Commands\Migration::class,
        Commands\GenLang::class,
        Commands\CreateAdmin::class,
    ];

    public function __construct()
    {
        $this->app = new Application('ss-panel', get_version());
        $this->registerCommands();
    }

    public function registerCommands()
    {
        foreach ($this->commands as $class) {
            $this->app->add(new $class);
        }
    }

    public function run()
    {
        $this->app->run();
    }


}