<template>
	<!-- Navbar -->
	<nav class="navbar navbar-toggleable-md  fixed-top bg-primary navbar-transparent  " color-on-scroll="500">
		<div class="container">
			<div class="navbar-translate">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar bar1"></span>
					<span class="navbar-toggler-bar bar2"></span>
					<span class="navbar-toggler-bar bar3"></span>
				</button>
				<a class="navbar-brand" href="/" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
					Now Ui Kit - Docs
				</a>
			</div>
			<div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="../index.html">Back to Kit</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/">Have an issue?</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->
</template>
<script>
    export default {
		name: 'Header'
    }
</script>