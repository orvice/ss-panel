	   <footer class="page-footer light-blue lighten-1">
	    <div class="container">
	      <div class="row">
	        <div class="col 0 s12">
	          <h5 class="white-text">用户建议</h5>
	          <p class="nav-wrapper card-panel waves-effect hoverable">如果你正在使用XXX公司的任何与网络相关的硬件和软件，请不要使用本站服务，根据网上反映的情况，该公司的产品会后台上报VPN，SS(shadowsocks)，SSH等等的ip信息，导致很多的VPN，SS(shadowsocks)，SSH服务不能正常使用。<br/><b style="color:red;">站长可以任意修改这里的内容！</b></p>
	        </div>
	        <div class="col l3 s12">
	          <h5 class="white-text">Terms of Service</h5>
	          <ul>
	            <li><a class="btn waves-effect waves-light light-blue cyan accent-3" href="<{$site_url}>user/tos.php">用户协议</a></li>
	          </ul>
	        </div>
	        <div class="col l3 s12">
	          <h5 class="white-text">ss-panel github</h5>
	          <ul>
	            <li><a class="btn waves-effect waves-light light-blue cyan accent-3" href="https://github.com/orvice/ss-panel">ss-panel</a></li>
	          </ul>
	        </div>
	        <div class="col l3 s12">
	          <h5 class="white-text">ss-panel smarty github</h5>
	          <ul>
	            <li><a class="btn waves-effect waves-light light-blue cyan accent-3" href="https://github.com/xuanhuan/ss-panel">ss-panel smarty</a></li>
	          </ul>
	        </div>
	            <div class="section">
					<{$ana}>
			    </div>
	      </div>
	    </div>

	    <div class="footer-copyright">
	      <div class="container" font="comic sans ms"> &copy; <{$site_name}> <{date('Y')}> Powered by <a class="orange-text text-lighten-3" href="https://github.com/orvice/ss-panel">ss-panel</a> <{$version}>
		      <div class="grey-text text-lighten-4 right">Processed in <{$Runtime->Stop()}> <{$Runtime->SpendTime()}> ms
		      </div>
	      </div>
	    </div>
	  </footer>
	  <a href="#!" class="cd-top btn-floating red darken-1 waves-effect">Top</a>
		<{include file='Public_javascript.tpl'}>
    </body>
</html>