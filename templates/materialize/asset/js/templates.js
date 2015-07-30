//读取本地保存的Cookie模板名
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
}
// 设置本地保存的Cookie模板名
// setCookie("templates","materialize/AdminLTE-2",365); 
function setCookie(name,value,Days) 
{ 
    var Days; 
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000); 
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString() + ";path=/";
    console.log(name + "="+ escape (value) + ";expires=" + exp.toGMTString() + ";path=/");
    // 重新加载当前网页
    document.location.reload();
}
// 判断模板
if(getCookie("templates")=="materialize"){
document.write("<a href=\"javascript:void(0)\" onclick=\"javascript:set_AdminLTE_2()\" style=\"color: white;\"><div id=\"templates\" class=\"waves-effect _hoverable\"> 使用旧版 </div></a>");
}else if(getCookie("templates")=="AdminLTE-2"){
document.write("<a href=\"javascript:void(0)\" onclick=\"javascript:set_materialize()\" style=\"color: white;\"><div id=\"templates\" class=\"waves-effect _hoverable\"> 使用新版 </div></a>");
}else{
 document.write("<div id=\"templates\" class=\"waves-effect _hoverable\"> 未知版本 </div>");
}
document.write("<style>	#templates {position: fixed; top: 10px; right: 1px; text-align: center; width: 20px; background-color: #39AEF9; background: linear-gradient(to bottom,rgba(39, 165, 255, 0.97) 0%,rgba(98, 198, 221, 0.96) 100%); border: 1px solid #198EC7; border-radius: 8px; z-index: 999999999;} ._hoverable:hover {transition: box-shadow .25s;    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}</style>");
function set_materialize(){
	setCookie("templates","materialize",365);
}
function set_AdminLTE_2(){
	setCookie("templates","AdminLTE-2",365);
}