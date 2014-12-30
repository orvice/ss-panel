<?php
/**
 *  Admin Global Func
 */

//登录检查函数
function admincheck(){
    session_start();
    $sessionId = session_id();

    //检测是否登录，若没登录则转向登录界面

    if(!isset($_COOKIE['admin_name'])){
        header("Location:login.php");
        exit();

    }
    else
    {
        $user_name = $_COOKIE['user_name'];
    }
}

//cate添加函数
function cate_add($name,$order){
    global $dbc;
    $sql = "INSERT INTO `bd_cate` (`cate_id`, `cate_name`, `cate_order`) VALUES (NULL, '$name', '$order')";
    $query = $dbc->query($sql);
    return $query;
}

//cate update函数
function cate_update($id,$name,$order){
    global $dbc;
    $sql ="UPDATE `bd_cate` SET `cate_name` = '$name', `cate_order` = '$order' WHERE `cate_id` = $id";
    $query = $dbc->query($sql);
    return $query;
}
//cate Del func
function cate_del($id){
    global $dbc;
    $sql ="DELETE FROM `bd_cate`  WHERE `cate_id` = $id";
    $query = $dbc->query($sql);
    return $query;
}



//item add func
function item_add($title,$size,$url,$cate_id,$info){
    global $dbc;
    $sql = "INSERT INTO `bd_item` (`item_id`, `item_title`, `item_cate_id`, `item_url`, `item_size`, `item_text`, `item_count`, `item_date`)
           VALUES (NULL, '$title', '$cate_id', '$url', '$size', '$info', '1', now())";
    $query = $dbc->query($sql);
    return $query;
}

//item update func
function item_update($id,$title,$cate_id,$url,$size,$info){
    global $dbc;
    $sql ="UPDATE  `bd_item`
           SET `item_title` = '$title', `item_cate_id` = '$cate_id', `item_url` = '$url', `item_size` = '$size', `item_text` = '$info', `item_date`=now()
           WHERE `item_id` = $id;";
    $query = $dbc->query($sql);
    return $query;
}

//item del
function item_del($id){
    global $dbc;
    $sql = "DELETE FROM `bd_item` WHERE `item_id` = $id";
    $query = $dbc->query($sql);
    return $query;
}