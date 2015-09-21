<?php
/**
 * 这个用来操作sqlite数据库的
 */
namespace Ss\Etc;
class sqlitedb
{
    
	private  $sqlitedb;

    function __construct(){
        global $sqlitedb , $fieldname;
        $this->sqlitedb  = $sqlitedb;
    }
    function get_content($table,$fieldname){
    	$datas = $this->sqlitedb->select($table,'CONTENT',['NAME'=>$fieldname]);
    	return $datas;
    }
    function update_content($table,$fieldname,$content){
        $datas = $this->sqlitedb->update($table,['CONTENT'=>$content],['NAME'=>$fieldname]);
        return $datas;
    }
}
?>