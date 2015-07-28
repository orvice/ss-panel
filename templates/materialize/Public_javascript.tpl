<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="<{$resources_dir}>/asset/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="<{$resources_dir}>/asset/js/materialize.min.js"></script>
		<script src="<{$resources_dir}>/asset/js/init.js"></script>
		<link type="text/css" rel="stylesheet" href="<{$resources_dir}>/asset/css/backtotop.css"  media="screen,projection"/>
		<script type="text/javascript" src="<{$resources_dir}>/asset/js/backtotop.js"></script>
	<!-- <script type="text/javascript" src="<{$resources_dir}>/asset/js/scrolltopcontrol.js"></script> -->
	<script type="text/javascript">
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
	</script>
		<{block name="javascript"}><{/block}>