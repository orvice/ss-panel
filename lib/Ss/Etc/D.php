<?php

namespace Ss\Etc;

class D {

    public $db;
    public $id;

    function __construct($id=0){
        // global $db;
        global $dbInfo;
        // $this->db       = $db;
        $this->id       = $id;
        $this->dbInfo   = $dbInfo;

        $this->db = new Medoo([
            // required
            'database_type' => $dbInfo['database_type'],
            'database_name' => $dbInfo['database_name'],
            'server' => $dbInfo['server'],
            'username' => $dbInfo['username'],
            'password' => $dbInfo['password'],
            'charset' => $dbInfo['charset'],

            // optional
            'port' => 3306,
            // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
        ]);
    }
}