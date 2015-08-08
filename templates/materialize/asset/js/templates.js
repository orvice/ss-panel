//创建一个DIV，包括id和内容。
//_createDIV_("id neme","content")
function _createDIV_(_id_neme,_templates_content){
  var div=document.createElement("div");//创建一个DIV
  div.setAttribute("id",_id_neme); //设置div名
  div.innerHTML=_templates_content;//设置div里面的内容
  document.body.appendChild(div); //主要加上这句，把新建的DIV加到页面上。
}
//读取本地保存的Cookie模板名
//_getCookie_("materialize/AdminLTE-2")
function _getCookie_(cname) {
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
// _setCookie_("templates","materialize/AdminLTE-2",365); 
function _setCookie_(name,value,Days) 
{ 
    var Days; 
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000); 
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString() + ";path=/";
    // 重新加载当前网页
    document.location.reload();
}
//创建存放css的div
_createDIV_("_templates_css","<style>#templates {position: fixed; top: 45%; right: 5px; text-align: center; width: 20px; background-color: #39AEF9; background: linear-gradient(to bottom,rgba(39, 165, 255, 0.97) 0%,rgba(98, 198, 221, 0.96) 100%); border: 1px solid #198EC7; border-radius: 8px; z-index: 1000;color: white;} ._hoverable:hover {transition: box-shadow .25s;    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}</style>");
// 判断模板
if(_getCookie_("templates")=="materialize"){
    _createDIV_("_templates_div",'<a href="javascript:void(0)" title="使用AdminLTE-2模板" onclick="_setCookie_(\'templates\',\'AdminLTE-2\',365);"><div id="templates" class="waves-effect _hoverable"> 使用旧版 </div></a>');
}else if(_getCookie_("templates")=="AdminLTE-2"){
    _createDIV_("_templates_div",'<a href="javascript:void(0)" title="使用materialize模板" onclick="_setCookie_(\'templates\',\'materialize\',365);"><div id="templates" class="waves-effect _hoverable"> 使用新版 </div></a>');
}else{
    _createDIV_("_templates_div",'<div id="templates" class="waves-effect _hoverable"> 未知版本 </div>');
}