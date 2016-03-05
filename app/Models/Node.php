<?php

namespace App\Models;

/**
 * Node Model
 */

class Node extends Model

{
    protected $table = "ss_node";

    function getOnlineUserCount(){
        $id = $this->attributes['id'];
        $log = NodeOnlineLog::where('node_id',$id)->orderBy('id', 'desc')->first();
        if($log == null){
            return "暂无数据";
        }
        return $log->online_user;
    }

}
