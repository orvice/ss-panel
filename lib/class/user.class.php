<?php

 class user {

     public $uid;
     private $dbc;

     function __construct($uid){
         global $dbc;
         $this->uid = $uid;
         $this->dbc = $dbc;
     }

     function update($user_name,$user_email,$user_pass,$user_passwd,$transfer_enable){
         $sql = " UPDATE `user` SET
                  `user_name` = '$user_name',
                  `email` = '$user_email',
                  `pass` = '$user_pass',
                  `passwd` = '$user_passwd',
                  `transfer_enable` = '$transfer_enable'
                  WHERE  `uid` = '$this->uid' ";
         $reset = " UPDATE `user` SET `transfer_enable` = '-9999' WHERE `uid` = '$this->uid' ";
         $this->dbc->query($reset);
         sleep(15);
         $query = $this->dbc->query($sql);
         return $query;
     }

     function del(){
         $sql = "DELETE FROM `user` WHERE `uid` = $this->uid ";
         $query = $this->dbc->query($sql);
         return $query;
     }

}
