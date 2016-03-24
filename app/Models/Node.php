<?php

namespace App\Models;

/**
 * Node Model
 */

use App\Utils\Tools;

class Node extends Model

{
    protected $table = "ss_node";

    function getOnlineUserCount()
    {
        $id = $this->attributes['id'];
        $log = NodeOnlineLog::where('node_id', $id)->orderBy('id', 'desc')->first();
        if ($log == null) {
            return "暂无数据";
        }
        return $log->online_user;
    }

    function getTrafficFromLogs()
    {
        $id = $this->attributes['id'];
        $traffic = TrafficLog::where('node_id', $id)->sum('u') + TrafficLog::where('node_id', $id)->sum('d');
        if ($traffic == 0) {
            return "暂无数据";
        }
        return Tools::flowAutoShow($traffic);
    }

}
