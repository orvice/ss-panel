<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="<{$resources_dir}>/asset/js/jquery-2.1.1.min.js?<{date('Ymd_h')}>"></script>
		<script type="text/javascript" src="<{$resources_dir}>/asset/js/materialize.min.js?<{date('Ymd_h')}>"></script>
		<script src="<{$resources_dir}>/asset/js/init.js?<{date('Ymd_h')}>"></script>
		<link type="text/css" rel="stylesheet" href="<{$resources_dir}>/asset/css/backtotop.css?<{date('Ymd_h')}>"  media="screen,projection"/>
		<!-- 选择风格模板 -->
        <script>
            (function() { 
            function async_load(){ 
	            var arryAll = [];  
	            // 异步加载的文件
	            arryAll.push("<{$resources_dir}>/asset/js/templates.js?<{date('Ymd_h')}>");  
	            arryAll.push("<{$resources_dir}>/asset/js/backtotop.js?<{date('Ymd_h')}>"); 
	            arryAll.forEach(function(e){ 
	                var s = document.createElement('script'); 
	                s.type = 'text/javascript'; 
	                s.async = true; 
	                var x = document.getElementsByTagName('script')[0];
	                s.src = e; 
	                x.parentNode.insertBefore(s, x); 
            	}) 
            } 
            if (window.attachEvent) {
            window.attachEvent('onload', async_load); 
            }else {
            window.addEventListener('load', async_load, false);
        	} 
            })(); 
        </script>
		<{block name="javascript"}><{/block}>