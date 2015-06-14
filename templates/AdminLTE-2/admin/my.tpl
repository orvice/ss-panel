<{extends file='user/my.tpl'}> <{* 继承父模板 *}>
<{block name=main}> <{* 覆盖父模板块的内容为自己的内容 *}>
<{include file='admin/main.tpl'}> <{* 引入admin/main.tpl 覆盖父模板块的内容为自己的内容 *}>
<{/block}>
<{block name=a}><{/block}> <{* 覆盖父模板块的内容为自己的内容 *}>