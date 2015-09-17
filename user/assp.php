<?php
/* 防签到系统平台 页面*/
//开启session
session_start();
//默认为false
$_SESSION['assp']=false;
//产生随机数
$js_ua_id=rand(9876543210,0123456789);
//把随机数保存
$_SESSION['js_ua_id']=$js_ua_id;
$js_ua_code = "\n".'
<script type="text/javascript">
        /*
         * Javascript base64_encode() base64加密函数
           用于生成字符串对应的base64加密字符串
         * 吴先成  www.51-n.com ohcc@163.com QQ:229256237
         * @param string str 原始字符串
         * @return string 加密后的base64字符串
        */
        function base64_encode(str){
                var c1, c2, c3;
                var base64EncodeChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";                
                var i = 0, len= str.length, string = "";

                while (i < len){
                        c1 = str.charCodeAt(i++) & 0xff;
                        if (i == len){
                                string += base64EncodeChars.charAt(c1 >> 2);
                                string += base64EncodeChars.charAt((c1 & 0x3) << 4);
                                string += "==";
                                break;
                        }
                        c2 = str.charCodeAt(i++);
                        if (i == len){
                                string += base64EncodeChars.charAt(c1 >> 2);
                                string += base64EncodeChars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
                                string += base64EncodeChars.charAt((c2 & 0xF) << 2);
                                string += "=";
                                break;
                        }
                        c3 = str.charCodeAt(i++);
                        string += base64EncodeChars.charAt(c1 >> 2);
                        string += base64EncodeChars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
                        string += base64EncodeChars.charAt(((c2 & 0xF) << 2) | ((c3 & 0xC0) >> 6));
                        string += base64EncodeChars.charAt(c3 & 0x3F)
                }
                        return string
        }
        /*
         * Javascript base64_decode() base64解密函数
           用于解密base64加密的字符串
         * 吴先成  www.51-n.com ohcc@163.com QQ:229256237
         * @param string str base64加密字符串
         * @return string 解密后的字符串
        */
        function base64_decode(str){
                var c1, c2, c3, c4;
                var base64DecodeChars = new Array(
                        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
                        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
                        -1, -1, -1, -1, -1, -1, -1, 62, -1, -1, -1, 63, 52, 53, 54, 55, 56, 57,
                        58, 59, 60, 61, -1, -1, -1, -1, -1, -1, -1, 0,  1,  2,  3,  4,  5,  6,
                        7,  8,  9,  10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24,
                        25, -1, -1, -1, -1, -1, -1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                        37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -1, -1, -1,
                        -1, -1
                );
                var i=0, len = str.length, string = "";

                while (i < len){
                        do{
                                c1 = base64DecodeChars[str.charCodeAt(i++) & 0xff]
                        } while (
                                i < len && c1 == -1
                        );

                        if (c1 == -1) break;

                        do{
                                c2 = base64DecodeChars[str.charCodeAt(i++) & 0xff]
                        } while (
                                i < len && c2 == -1
                        );

                        if (c2 == -1) break;

                        string += String.fromCharCode((c1 << 2) | ((c2 & 0x30) >> 4));

                        do{
                                c3 = str.charCodeAt(i++) & 0xff;
                                if (c3 == 61)
                                        return string;

                                c3 = base64DecodeChars[c3]
                        } while (
                                i < len && c3 == -1
                        );

                        if (c3 == -1) break;

                        string += String.fromCharCode(((c2 & 0XF) << 4) | ((c3 & 0x3C) >> 2));

                        do{
                                c4 = str.charCodeAt(i++) & 0xff;
                                if (c4 == 61) return string;
                                c4 = base64DecodeChars[c4]
                        } while (
                                i < len && c4 == -1
                        );

                        if (c4 == -1) break;

                        string += String.fromCharCode(((c3 & 0x03) << 6) | c4)
                }
                return string;
        }
       // document.write(base64_encode("www.51-n.com"));
       // document.write("<br />");
       // document.write(base64_decode("d3d3LjUxLW4uY29t"));        
</script>
<script type="text/javascript">
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
    uaid=base64_encode("'.$js_ua_id.'");
/* ----------------------------调用方法------------------------------  */
    var Ajax = new AjaxClass();         // 创建AJAX对象  
    Ajax.Method = "POST";               // 设置请求方式为 POST/GET  
    Ajax.Url = "_assp.php"; // URL为default.asp，当为GET方式URL为default.asp?a=1&b=2
    Ajax.Async = true;                  // 是否异步  
    Ajax.Arg = "uaid="+uaid; // POST的参数，当为GET方式 这个要注释。 
    // Ajax.Loading = function(){          //等待函数  
    //     document.write("loading...");  
    // }  
    Ajax.CallBack = function(str)       // 回调函数  
    {  
        document.getElementById("assp").innerHTML=str;  
    }  
    Ajax.Send();                        // 发送请求  
  
/* -------------------------------------------------------------------- */
</script>';
?>
