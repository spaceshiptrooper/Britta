<?php
///////////////////////////////////////////////////////////////
//
//		BRITTA
//		Author: spaceshiptrooper
//		Copyright: 2017 Britta
//		Version: 0.0.0.1
//		File Last Updated: 6/28/2017 at 11:23 P.M.
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
		<h1>Hello and thank you for using <?php print($this->config['WEBSITE_TITLE']); ?>!</h1>
		<p>For the first input field, <strong>remember to move the users directory outside of your public directory</strong>.</p>
<?php
if(isset($_SESSION['users_directory_error'])) {
?>
		<p>Please type something into the user's directory field.</p>
<?php
} elseif(isset($_SESSION['session_cookie_error'])) {
?>
		<p>Please type something into the session cookie field.</p>
<?php
} elseif(isset($_SESSION['cookie_name_error'])) {
?>
		<p>Please type something into the session cookie field.</p>
<?php
} elseif(isset($_SESSION['url_error'])) {
?>
		<p>Please type something into the URL field.</p>
<?php
} elseif(isset($_SESSION['max_first_name_error'])) {
?>
		<p>Please type something into the max first name field.</p>
<?php
} elseif(isset($_SESSION['min_first_name_error'])) {
?>
		<p>Please type something into the min first name field.</p>
<?php
} elseif(isset($_SESSION['max_last_name_error'])) {
?>
		<p>Please type something into the max last name field.</p>
<?php
} elseif(isset($_SESSION['min_last_name_error'])) {
?>
		<p>Please type something into the min last name field.</p>
<?php
}
?>
		<form action="" class="setup" method="POST">
			<input type="text" name="USERS_DIRECTORY" placeholder="The user's directory location for instance /var/www/britta/users/" value="<?php if(isset($_SESSION['users_directory'])) { print($_SESSION['users_directory']); } ?>">
			<div class="p-t-5"></div>
			<input type="text" name="SESSION_COOKIE" placeholder="A session cookie name. It can be anything." value="<?php if(isset($_SESSION['session_cookie'])) { print($_SESSION['session_cookie']); } ?>">
			<div class="p-t-5"></div>
			<input type="text" name="COOKIE_NAME" placeholder="A cookie name. It can be anything, but don't use the same one you have used in session cookie name." value="<?php if(isset($_SESSION['cookie_name'])) { print($_SESSION['cookie_name']); } ?>">
			<div class="p-t-5"></div>
			<input type="text" name="URL" placeholder="The URL of this website including trailing slash so for instance https://localhost.com/samples/britta/" value="<?php if(isset($_SESSION['url'])) { print($_SESSION['url']); } ?>">
			<div class="p-t-5"></div>
			<input type="text" name="MAX_FIRST_NAME" placeholder="The maximum amount of characters you want to allow for a user's first name." value="<?php if(isset($_SESSION['max_first_name'])) { print($_SESSION['max_first_name']); } ?>">
			<div class="p-t-5"></div>
			<input type="text" name="MIN_FIRST_NAME" placeholder="The minimum amount of characters you want to allow for a user's first name." value="<?php if(isset($_SESSION['min_first_name'])) { print($_SESSION['min_first_name']); } ?>">
			<div class="p-t-5"></div>
			<input type="text" name="MAX_LAST_NAME" placeholder="The maximum amount of characters you want to allow for a user's last name." value="<?php if(isset($_SESSION['max_last_name'])) { print($_SESSION['max_last_name']); } ?>">
			<div class="p-t-5"></div>
			<input type="text" name="MIN_LAST_NAME" placeholder="The minimum amount of characters you want to allow for a user's last name." value="<?php if(isset($_SESSION['min_last_name'])) { print($_SESSION['min_last_name']); } ?>">
			<div class="p-t-20"></div>
			<button type="submit" class="button">Submit</button>
		</form>
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

<?php
if(isset($_SESSION['users_directory_error'])) {

	unset($_SESSION['users_directory_error']);

}

if(isset($_SESSION['session_cookie_error'])) {

	unset($_SESSION['session_cookie_error']);

}

if(isset($_SESSION['users_directory'])) {

	unset($_SESSION['users_directory']);

}

if(isset($_SESSION['session_cookie'])) {

	unset($_SESSION['session_cookie']);

}

if(isset($_SESSION['cookie_name'])) {

	unset($_SESSION['cookie_name']);

}

if(isset($_SESSION['url'])) {

	unset($_SESSION['url']);

}

if(isset($_SESSION['max_first_name'])) {

	unset($_SESSION['max_first_name']);

}

if(isset($_SESSION['min_first_name'])) {

	unset($_SESSION['min_first_name']);

}

if(isset($_SESSION['max_last_name'])) {

	unset($_SESSION['max_last_name']);

}

if(isset($_SESSION['min_last_name'])) {

	unset($_SESSION['min_last_name']);

}
?>
</body>
</html>