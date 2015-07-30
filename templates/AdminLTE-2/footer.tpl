<div class="footer">
    <p>&copy; <{$site_name}><{date('Y')}>  Powered by <a href="https://github.com/orvice/ss-panel">ss-panel</a> <{$version}>
        Processed in <{$Runtime->Stop()}>
       <{$Runtime->SpendTime()}>ms
    </p>
</div>
<!-- 选择风格模板 -->
<script>
    (function() { 
    function async_load(){ 
	    var arryAll = [];  
	    // 异步加载的js文件
	    arryAll.push("<{$resources_dir}>/asset/js/templates.js");  
	    // arryAll.push("<{$resources_dir}>/asset/js/*.js"); 
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