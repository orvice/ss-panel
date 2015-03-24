<?php

namespace Ss\Etc;


class Db {

    public $db;
    public $id;
    public $dbc;

    function __construct($id=0){
        global $db;
        global $dbc;
        $this->db       = $db;
        $this->id       = $id;
        $this->dbc      = $dbc;
    }
}