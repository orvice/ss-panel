//创建一个DIV，包括id和内容。
//_createDIV_("class neme","content")
function _createDIV_(_class_neme,_templates_content){
var div=document.createElement("div");//创建一个DIV
div.setAttribute("class",_class_neme); //设置div名
div.innerHTML=_templates_content;//设置div里面的内容
document.body.appendChild(div); //主要加上这句，把新建的DIV加到页面上。
}
//创建存放css的div
function _Prompt_msg(){
	_createDIV_("Prompt_message",'<div id="msg-success" class="modal" style="z-index: 1003; opacity: 1; transform: scaleX(1); top: 5%;" title="点击关闭" onclick="$(\'#msg-success\').closeModal();">\r<div class="modal-content" id="ok-close">\r<h4><i class="mdi-image-tag-faces" style="font-size: 1em;"></i>成功了!</h4>\r<p id="msg-success-p" style=" COLOR: deepskyblue; FONT-SIZE: x-large;"></p>\r</div>\r<div class="modal-footer">\r <a href="#!" onclick="$(\'#msg-success\').closeModal();" class="modal-action modal-close btn waves-light light-blue lighten-1 modal-action modal-close waves-effect waves-red">关闭</a>\r</div>\r</div>\r <div id="msg-error" class="modal" style="z-index: 1003; opacity: 1; transform: scaleX(1); top: 5%;" title="点击关闭" onclick="$(\'#msg-error\').closeModal();">\r<div class="modal-content" id="error-close">\r<h4><i class="mdi-alert-error" style="font-size: 1em;"></i>出错了!</h4>\r<p id="msg-error-p" style=" COLOR: RED; FONT-SIZE: x-large;"> </p>\r</div>\r<div class="modal-footer">\r <a href="#!" onclick="$(\'#msg-error\').closeModal();" class="modal-action modal-close btn waves-light light-blue lighten-1 modal-action modal-close waves-effect waves-red">关闭</a>\r</div>\r</div>')
}
function _Prompt_ss_msg(){
	_createDIV_("Prompt_message",'<div id="ss-msg-success" class="modal" style="z-index: 1003; opacity: 1; transform: scaleX(1); top: 5%;">\r<div class="modal-content" id="ok-close">\r<h4><i class="mdi-image-tag-faces" style="font-size: 1em;"></i>成功了!</h4>\r<p id="ss-msg-success-p" style=" COLOR: deepskyblue; FONT-SIZE: x-large;"></p>\r</div>\r<div class="modal-footer">\r <a href="#!" onclick="$(\'#ss-msg-success\').closeModal();" class="modal-action modal-close btn waves-light light-blue lighten-1 modal-action modal-close waves-effect waves-red">关闭</a>\r</div>\r</div>\r<div id="ss-msg-error" class="modal" style="z-index: 1003; opacity: 1; transform: scaleX(1); top: 5%;" title="点击关闭" onclick="$(\'#ss-msg-error\').closeModal();">\r<div class="modal-content" id="ss-error-close">\r<h4><i class="mdi-alert-error" style="font-size: 1em;"></i>出错了!</h4>\r<p id="ss-msg-error-p" style=" COLOR: RED; FONT-SIZE: x-large;"> </p>\r</div>\r<div class="modal-footer">\r <a href="#!" onclick="$(\'#ss-msg-error\').closeModal();" class="modal-action modal-close btn waves-light light-blue lighten-1 modal-action modal-close waves-effect waves-red">关闭</a>\r</div>\r</div>')
}