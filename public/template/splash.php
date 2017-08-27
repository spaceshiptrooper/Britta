<?php
///////////////////////////////////////////////////////////////
//
//		BRITTA
//		Author: spaceshiptrooper
//		Copyright: 2017 Britta
//		Version: 0.0.0.1
//		File Last Updated: 8/27/2017 at 3:48 A.M.
//
///////////////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html>
<head>
<title>Splash - <?php print($this->config['WEBSITE_TITLE']); ?></title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="icon" href="images/favicon.png">
</head>

<body>
	<header class="banner">
		<h1><a href="../public/"><span class="logo-100 title"></span></a><?php print($this->config['WEBSITE_TITLE']); ?></h1>
	</header>

	<noscript>
		<nav>
			<ul>
				<li>:O It looks like you've disabled <strong>Javascript</strong> on your browser. Looks like you won't be getting out of this splash intro now!<br /><strong>HINT</strong>: You need the <strong>Skip Splash</strong> button to show on this page to get rid of this splash page!</li>
			</ul>
		</nav>
	</noscript>

	<main class="container">
		<div class="pull-right">
			<div class="face"></div>
			<div class="p-t-40"></div>
		</div>
		<h1>Hello and thank you for using <?php print($this->config['WEBSITE_TITLE']); ?>!</h1>
		<p>I know where you live now!</p>
		<div class="slow-intro display-none">
			<p>Or do I? Jajajajajajaja!</p>
			<a class="rfs button" onclick="window.location.href='?step=setup';return false;" onmousedown="return false;">Setup</a>
		</div>
	</main>

	<footer class="long-bottom">
		<p>&copy; Copyright <?php print(date('Y')); ?>. All rights reserved. <a href="<?php print($config['BRITTA_WEBSITE']); ?>"><?php print($config['WEBSITE_TITLE']); ?></a></p>
		<ul class="social">
			<li><a href="https://facebook.com/britta.json"><i class="fa fa-facebook"></i></a></li>
			<li><a href="https://twitter.com/britta_json"><i class="fa fa-twitter"></i></a></li>
			<li><a href="<?php print($config['BRITTA_WEBSITE']); ?>"><i class="fa fa-github"></i></a></li>
		</ul>
	</footer>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).on('ready', function() {

		$('.slow-intro').delay(5000).fadeIn('slow');

	});
	</script>

</body>
</html>