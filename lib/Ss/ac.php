<?php
/**
 * 这个是用来获取公告内容的
 * $vars = get_defined_vars(); //获取所有当前作用域的变量，用来替换字符串转成变量的。
 */
namespace Ss;
class ac
{
	static function get($fieldname,$vars){
		global $sqlitedates;
		$datas = $sqlitedates->get_content("announcement",$fieldname);

        $datas = preg_replace_callback('/{\$([\w\W]*?)}/im',
            function ($matches) use ($vars) {
            	try{
            		return isset ($vars[$matches[1]]) ? $vars[$matches[1]] : '<没找到$'.$matches[1].'变量>'; 
            	}catch (Exception $e) {
				    echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
        	},
            $datas[0]);
        return $datas;

	}
	static function adminget($fieldname){
		global $sqlitedates;
		return $sqlitedates->get_content("announcement",$fieldname)[0];
	}
}
?>