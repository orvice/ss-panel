<?php

namespace Ss\Etc;

class Db {

    public $db;
    public $id;

    function __construct($id=0){
        global $db;
        $this->db       = $db;
        $this->id       = $id;
    }
}