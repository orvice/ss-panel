<?php


namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;
use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration
{
    /** @var \Illuminate\Database\Capsule\Manager $capsule */
    public $capsule;

    /** @var \Illuminate\Database\Schema\Builder $capsule */
    public $schema;

    public function init2()
    {
        $this->capsule = new Capsule();
        $config = app()->make('config')->get('database.connections');
        foreach ($config as $k => $v) {
            $this->capsule->addConnection($v, $k);
        }
        $default = app()->make('config')->get('database')['default'];
        if ($default) {
            if (isset($config[$default])) {
                $this->capsule->addConnection($config[$default], 'default');
            }
        }
        $this->capsule->bootEloquent();
        $this->schema = $this->capsule->schema();
    }

    public function init()
    {
        $this->capsule = new Capsule;
        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'port'      => 3306,
            'database'  => 'sspanel',
            'username'  => 'sspanel',
            'password'  => 'sspanel',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ]);

        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        $this->schema = $this->capsule->schema();
    }

}