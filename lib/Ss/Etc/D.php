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
            'database_type' => $this->dbInfo['database_type'],
            'database_name' => $this->dbInfo['database_name'],
            'server' => $this->dbInfo['server'],
            'username' => $this->dbInfo['username'],
            'password' => $this->dbInfo['password'],
            'charset' => $this->dbInfo['charset'],

            // optional
            'port' => 3306,
            // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]
        ]);
    }
}