<?php
/**
 * 使用举例：
 * <{textareaCodemirror name="text" id="idname" class="classname"}>被编辑的内容<{/textareaCodemirror}>
 */
function smarty_block_textareaCodemirror($args,$content,$smarty,&$repeat)
{
global $public;
if (!$repeat) {
    $args['name'] = empty($args['name']) ? 'content': $args['name'];
    $args['id'] = empty($args['id']) ? 'noid': $args['id'];
    $args['class'] = empty($args['class']) ? '': ' class="'.$args['class'].'"';
    $args['style'] = empty($args['style']) ? '': ' style="'.$args['style'].'"';
    $editor = '
    <link rel="stylesheet" href="'.$public.'/Codemirror/css/codemirror.css">
    <link rel="stylesheet" href="'.$public.'/Codemirror/css/fullscreen.css">
    <link rel="stylesheet" href="'.$public.'/Codemirror/css/seti.css">
    <script type="text/javascript" src="'.$public.'/Codemirror/js/codemirror-min.js"></script>
    <script type="text/javascript" src="'.$public.'/Codemirror/js/xml-fold.js"></script>
    <script type="text/javascript" src="'.$public.'/Codemirror/js/selection-pointer.js"></script>
    <script type="text/javascript" src="'.$public.'/Codemirror/js/xml.js"></script>
    <script type="text/javascript" src="'.$public.'/Codemirror/js/javascript.js"></script>
    <script type="text/javascript" src="'.$public.'/Codemirror/js/css.js"></script>
    <script type="text/javascript" src="'.$public.'/Codemirror/js/vbscript.js"></script>
    <script type="text/javascript" src="'.$public.'/Codemirror/js/htmlmixed.js"></script>
    <script type="text/javascript" src="'.$public.'/Codemirror/js/fullscreen.js"></script>
    <script type="text/javascript" src="'.$public.'/Codemirror/js/closetag.js"></script>
    <script type="text/javascript" src="'.$public.'/Codemirror/js/matchtags.js"></script>
    <script type="text/javascript" src="'.$public.'/Codemirror/js/matchbrackets.js"></script>
    <style type="text/css">
      .CodeMirror {border-top: 1px solid black; border-bottom: 1px solid black;}
    </style>
    
    <p>光标在编辑器时，按F11键切换全屏幕编辑，按F11/ESC键可退出全屏编辑。</p>
    
    <p>将光标放在编辑器内部的一个标签就会高亮显示，按 Ctrl + J 跳转到光标下一个匹配的标签。</p>
    
    <textarea name="'.$args["name"].'" id="'.$args['id'].'"'.$args['class'].'>'.$content.'</textarea>
    
    <p>光标在编辑器时，按 Ctrl + S 也可以保存修改的内容！</p>

    <script type="text/javascript">
      // Define an extended mixed-mode that understands vbscript and
      // leaves mustache/handlebars embedded templates in html mode
      var mixedMode = {
        name: "htmlmixed",
        scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
                       mode: null},
                      {matches: /(text|application)\/(x-)?vb(a|script)/i,
                       mode: "vbscript"}]
      };
      var editor = CodeMirror.fromTextArea(document.getElementById("'.$args['id'].'"), {
        mode: "htmlmixed",
        lineWrapping: true,
        lineNumbers: true,
        matchTags: {bothTags: true},
        matchBrackets: true,
        autoCloseTags: true,
        selectionPointer: true,
        extraKeys: {
        "Ctrl-J": "toMatchingTag",
        "Ctrl-S": function(cm) {cm.save();submit()},
        "F11": function(cm) {
          cm.setOption("fullScreen", !cm.getOption("fullScreen"));
        },
        "Esc": function(cm) {
          if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
        }
      }
      ,
     theme: "seti"
    });

    </script>
    ';
    
    return $editor;
    }
}
