<?php
/* 防签到系统平台 页面*/
//开启session
session_start();
//默认为false
$_SESSION['assp']=false;
//产生6位随机数
$js_ua_rand=rand(000000,999999);
//把随机数保存
$_SESSION['js_ua_rand']=$js_ua_rand;
$js_ua_code = "\n".'<script>
function AjaxClass()  
{  
    var XmlHttp = false;  
    try  
    {  
        XmlHttp = new XMLHttpRequest();        //FireFox专有  
    }  
    catch(e)  
    {  
        try  
        {  
            XmlHttp = new ActiveXObject("MSXML2.XMLHTTP");  
        }  
        catch(e2)  
        {  
            try  
            {  
                XmlHttp = new ActiveXObject("Microsoft.XMLHTTP");  
            }  
            catch(e3)  
            {  
                alert("你的浏览器不支持XMLHTTP对象，请升级到IE6以上版本！");  
                XmlHttp = false;  
            }  
        }  
    }  
  
    var me = this;  
    this.Method = "POST";  
    this.Url = "";  
    this.Async = true;  
    this.Arg = "";  
    this.CallBack = function(){};  
    this.Loading = function(){};  
      
    this.Send = function()  
    {  
        if (this.Url=="")  
        {  
            return false;  
        }  
        if (!XmlHttp)  
        {  
            return IframePost();  
        }  
  
        XmlHttp.open (this.Method, this.Url, this.Async);  
        if (this.Method=="POST")  
        {  
            XmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");  
        }  
        XmlHttp.onreadystatechange = function()  
        {  
            if (XmlHttp.readyState==4)  
            {  
                var Result = false;  
                if (XmlHttp.status==200)  
                {  
                    Result = XmlHttp.responseText;  
                }  
                XmlHttp = null;  
                  
                me.CallBack(Result);  
            }  
             else  
             {  
                me.Loading();  
             }  
        }  
        if (this.Method=="POST")  
        {  
            XmlHttp.send(this.Arg);  
        }  
        else  
        {  
            XmlHttp.send(null);  
        }  
    }  
      
    //Iframe方式提交  
    function IframePost()  
    {  
        var Num = 0;  
        var obj = document.createElement("iframe");  
        obj.attachEvent("onload",function(){ me.CallBack(obj.contentWindow.document.body.innerHTML); obj.removeNode() });  
        obj.attachEvent("onreadystatechange",function(){ if (Num>=5) {alert(false);obj.removeNode()} });  
        obj.src = me.Url;  
        obj.style.display = "none";  
        document.body.appendChild(obj);  
    }  
}  
  
/* ----------------------------调用方法------------------------------  */
    var Ajax = new AjaxClass();         // 创建AJAX对象  
    Ajax.Method = "POST";               // 设置请求方式为 POST/GET  
    Ajax.Url = "_assp.php"; // URL为default.asp，当为GET方式URL为default.asp?a=1&b=2
    Ajax.Async = true;                  // 是否异步  
    Ajax.Arg = "ua="+navigator.userAgent+"'.$js_ua_rand.'"; // POST的参数，当为GET方式 这个要注释。 
    // Ajax.Loading = function(){          //等待函数  
    //     document.write("loading...");  
    // }  
    // Ajax.CallBack = function(str)       // 回调函数  
    // {  
    //     document.write(str);  
    // }  
    Ajax.Send();                        // 发送请求  
  
/* --------------------------------------------------------------------*/
</script>';
?>
