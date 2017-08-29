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
<title>Login - <?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></title>
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
			<li class="pull-right p-b-20 p-r-20"><a href="<?php print($required->functions->html_escape($config['URL'])); ?>register.php">Register an account</a></li>
		</ul>
	</nav>

	<main class="container">
		<div class="login pull-left">
<?php
if(isset($_SESSION['email_error'])) {

	if($_SESSION['email_error'] == 1) {
?>
			<p class="login-error">Please type an email in the email field.</p>
<?php
	} elseif($_SESSION['email_error'] == 1) {
?>
			<p class="login-error">The email you have provided is not a real email.</p>
<?php
	} elseif($_SESSION['email_error'] == 2) {
?>
			<p class="login-error">The email or password is incorrect. Please try again.</p>
<?php
	}

} elseif(isset($_SESSION['password_error'])) {

	if($_SESSION['password_error'] == 1) {
?>
			<p class="login-error">Please type in a password into the password field.</p>
<?php
	} elseif($_SESSION['password_error'] == 2) {
?>
			<p class="login-error">The email or password is incorrect. Please try again.</p>
<?php
	}

} elseif(isset($_SESSION['successful_signup'])) {
?>
			<p class="login-success">You have successfully signed up to our website! You can now use the credentials you have just signed up with earlier to log in.</p>
<?php
}
?>
			<form action="<?php print($required->functions->html_escape($config['URL'])); ?>login.php" method="POST">
				<input type="text" name="email" placeholder="Email" autocomplete="off" value="<?php if(isset($_SESSION['email'])) { print($required->functions->html_escape($_SESSION['email'])); } ?>">
				<div class="p-t-5"></div>
				<input type="password" name="password" placeholder="Password" autocomplete="off">
				<div class="p-t-10"></div>
				<button type="submit" class="button">Login</button>
			</form>
		</div>

		<div class="main-break"></div>

		<div class="news pull-right">
<?php
$news = strtr($config['USERS_DIRECTORY'], ['users' . DS => 'news' . DS]);
$file = $news . 'news.txt';
$getFile = file_get_contents($file);

if(filesize($file)) {

	$text = $required->functions->codes($required->functions->html_escape($getFile));

	print($text);

} else {

	print('<p>Sorry, but there is currently no news at this time.</p>');

}
?>

		</div>
	</main>

	<div class="login-main"></div>

<?php require(ROOT . 'template' . DS . 'footer.php'); ?>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js')); ?>"></script>
</body>
</html><?php
if(isset($_SESSION['email_error'])) {

	unset($_SESSION['email_error']);

}

if(isset($_SESSION['password_error'])) {

	unset($_SESSION['password_error']);

}

if(isset($_SESSION['email'])) {

	unset($_SESSION['email']);

}

if(isset($_SESSION['successful_signup'])) {

	unset($_SESSION['successful_signup']);

}