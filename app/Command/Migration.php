<?php


namespace App\Command;

use App\Models\Model;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Database\ConnectionResolver;
use Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Facade;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\App;

class Migration
{

    public function setFacade(){
        $app = new FakeApp();
        $app['db'] = Model::getConnectionResolver();
        App::setFacadeApplication($app);
    }

    function getConnectionResolver()
    {
        return Model::getConnectionResolver();
    }


    protected function getRepository()
    {
        $table = config('database.migrations');
        return new DatabaseMigrationRepository($this->getConnectionResolver(), $table);
    }

    public function getMigrator()
    {
        $this->setFacade();
        return new Migrator($this->getRepository(),$this->getConnectionResolver(),new Filesystem());
    }


}