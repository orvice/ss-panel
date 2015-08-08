<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="<{$resources_dir}>/asset/js/jquery-2.1.1.min.js?<{$version}><{date('Ym')}>"></script>
		<script type="text/javascript" src="<{$resources_dir}>/asset/js/materialize.min.js?<{$version}><{date('Ym')}>"></script>
		<script src="<{$resources_dir}>/asset/js/init.js?<{$version}><{date('Ym')}>"></script>
		<{block name="javascript"}><{/block}>
		<link type="text/css" rel="stylesheet" href="<{$resources_dir}>/asset/css/backtotop.css?<{$version}><{date('Ym')}>"  media="screen,projection"/>
		<!-- 选择风格模板 -->
        <script type="text/javascript">
            (function() { 
            function async_load(){ 
	            var arryAll = [];  
	            // 异步加载的文件
	            arryAll.push("<{$resources_dir}>/asset/js/templates.js?<{$version}><{date('Ym')}>"); 
	            arryAll.push("<{$resources_dir}>/asset/js/backtotop.js?<{$version}><{date('Ym')}>");  
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