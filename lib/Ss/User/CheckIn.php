<?php

namespace Ss\User;


class CheckIn extends Ss {

    private $db;
    private $uid;

    function __construct($uid){
        global $db;
        $this->uid = $uid;
        $this->db  = $db;
    }

    function ModOne(){

    }
}