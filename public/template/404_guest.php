<?php
///////////////////////////////////////////////////////////////
//
//		BRITTA
//		Author: spaceshiptrooper
//		Copyright: 2017 Britta
//		Version: 0.0.0.1
//		File Last Updated: 6/28/2017 at 11:11 P.M.
//
///////////////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Not Found - <?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></title>
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'style.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'custom.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'responsive.css')); ?>">
<link rel="icon" href="<?php print($required->functions->html_escape($config['URL'] . 'images' . DS . 'favicon.png')); ?>">
</head>

<body>
	<header class="banner">
		<h1><a href="<?php print($required->functions->html_escape($config['URL'])); ?>"><span class="logo-100 title"></span></a><?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></h1>
	</header>

	<nav>
		<ul>
			<li class="pull-left"><a href="<?php print($required->functions->html_escape($config['URL'])); ?>">Home</a></li>
			<li class="pull-right p-b-20 p-r-20"><a href="<?php print($required->functions->html_escape($config['URL'])); ?>register.php">Register an account</a></li>
		</ul>
	</nav>

	<main class="container">
		<h1>Sorry, this page isn't available</h1>
		<p>The link you followed may be broken, or the page may have been removed.</p>
	</main>

<?php require(ROOT . 'template' . DS . 'footer.php'); ?>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js')); ?>"></script>

</body>
</html>