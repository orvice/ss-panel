<footer class="page-footer orange">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">{$lang->get('nav.about')}</h5>
				<p class="grey-text text-lighten-4">{$lang->get('index.info')}</p>


			</div>
			<div class="col l3 s12">
				<h5 class="white-text">{$lang->get('nav.user')}</h5>
				<ul>
				{if $user->isLogin}
					<li><a class="white-text" href="/user">{$lang->get('nav.user-center')}</a></li>
					<li><a class="white-text" href="/user/logout">{$lang->get('auth.logout')}</a></li>
				{else}
					<li><a class="white-text" href="/auth/login">{$lang->get('auth.login')}</a></li>
					<li><a class="white-text" href="/auth/register">{$lang->get('auth.register')}</a></li>
				{/if}
				</ul>
			</div>
			<div class="col l3 s12">
				<h5 class="white-text">{$lang->get('nav.pages')}</h5>
				<ul>
					<li><a class="white-text" href="/code">{$lang->get('nav.invite-code')}</a></li>
					<li><a class="white-text" href="/tos">{$lang->get('nav.tos')}</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			&copy; {$config["appName"]}  Powered by <a class="orange-text text-lighten-3" href="https://github.com/orvice/ss-panel">ss-panel</a> {$config["version"]}
		 Theme by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
		</div>
		<div style="display:none;">
			{$analyticsCode}
		</div>
	</div>
</footer>


<!--  Scripts-->
<script src="/assets/public/js/jquery.min.js"></script>
<script src="/assets/materialize/js/materialize.min.js"></script>
<script src="/assets/materialize/js/init.js"></script>

</body>
</html>
