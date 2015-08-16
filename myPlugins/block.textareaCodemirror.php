<?php
/**
 * 使用举例：
 * <{textareaCodemirror name="text" id="idname" class="classname"}>被编辑的内容<{/textareaCodemirror}>
 */
function smarty_block_textareaCodemirror($args,$content,$smarty,&$repeat)
{
  // print_r($smarty)
if (!$repeat) {
    $args['name'] = empty($args['name']) ? 'content': $args['name'];
    $args['id'] = empty($args['id']) ? 'noid': $args['id'];
    $args['class'] = empty($args['class']) ? '': ' class="'.$args['class'].'"';
    $args['style'] = empty($args['style']) ? '': ' style="'.$args['style'].'"';

    $public='../public/';
    $editor = '
    <link rel="stylesheet" href="'.$public.'Codemirror/css/codemirror.css">
    <script type="text/javascript" src="'.$public.'Codemirror/js/codemirror.js"></script>
    <script type="text/javascript" src="'.$public.'Codemirror/js/selection-pointer.js"></script>
    <script type="text/javascript" src="'.$public.'Codemirror/js/xml.js"></script>
    <script type="text/javascript" src="'.$public.'Codemirror/js/javascript.js"></script>
    <script type="text/javascript" src="'.$public.'Codemirror/js/css.js"></script>
    <script type="text/javascript" src="'.$public.'Codemirror/js/vbscript.js"></script>
    <script type="text/javascript" src="'.$public.'Codemirror/js/htmlmixed.js"></script>
    
    <textarea id="'.$args['id'].'" name="'.$args["name"].'" id="'.$args['id'].'"'.$args['class'].'>'.$content.'</textarea>

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
        mode: mixedMode,
        selectionPointer: true,
        lineNumbers: true,
        // theme: "night"
    });

    </script>
    ';
    
    return $editor;
    }
}