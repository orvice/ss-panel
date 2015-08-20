
	   <footer class="page-footer light-blue lighten-1">
	    <div class="container">
	      <div class="row">
	        <div class="col 0 s12">
	          <h5 class="white-text">用户建议</h5>
	          <p class="nav-wrapper card-panel waves-effect hoverable"><{$footer_Announcement}><{* 用户建议的内容 *}></p>
	        </div>
	        <div class="col l3 s6 m6">
	          <h5 class="white-text">Terms of Service</h5>
	          <ul>
	            <li><a class="btn waves-effect waves-light light-blue cyan accent-3" href="<{$site_url}>user/tos.php" target="_blank">用户协议</a></li>
	          </ul>
	        </div>
	        <div class="col l3 s6 m6">
	          <h5 class="white-text">ss-panel github</h5>
	          <ul>
	            <li><a class="btn waves-effect waves-light light-blue cyan accent-3" href="https://github.com/orvice/ss-panel" target="_blank">ss-panel</a></li>
	          </ul>
	        </div>
	        <div class="col l3 s6 m6">
	          <h5 class="white-text">ss-panel smarty github</h5>
	          <ul>
	            <li><a class="btn waves-effect waves-light light-blue cyan accent-3" href="https://github.com/xuanhuan/ss-panel" target="_blank">ss-panel smarty</a></li>
	          </ul>
	        </div>
	        <div class="col l3 s6 m6">
	          <h5 class="white-text">templates</h5>
	          <ul>
	            <li><a class="btn waves-effect waves-light light-blue cyan accent-3" href="http://materializecss.com/" target="_blank">Materialize</a></li>
	          </ul>
	        </div>
	            <div class="section">
					<{$ana}>
			    </div>
	      </div>
	    </div>
	  	<a href="#!" class="cd-top btn-floating red darken-1 waves-effect" title="回到顶部">Top</a>
	    <div class="footer-copyright">
	      <div class="container" font="comic sans ms"> &copy; <{$site_name}> <{date('Y')}> Powered by <a class="orange-text text-lighten-3" href="https://github.com/orvice/ss-panel">ss-panel</a> <{$version}>
		      <div class="grey-text text-lighten-4 right">Processed in <{$Runtime->Stop()}> <{$Runtime->SpendTime()}> ms
		      </div>
	      </div>
	    </div>
	  </footer>
		<{include file='Public_javascript.tpl'}>
    </body>
</html>