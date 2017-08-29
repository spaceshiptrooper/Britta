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
<title>Register - <?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></title>
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
			<li><a href="<?php print($required->functions->html_escape($config['URL'])); ?>">Home</a></li>
		</ul>
	</nav>

	<main class="container">
<?php
if(isset($_SESSION['first_name_error'])) {

	if($_SESSION['first_name_error'] == 1) {
?>
		<p class="register-error">Please provide your first name.</p>
<?php
	} elseif($_SESSION['first_name_error'] == 2) {
?>
		<p class="register-error">Your first name <strong>cannot</strong> contain any special characters.</p>
<?php
	} elseif($_SESSION['first_name_error'] == 3) {
?>
		<p class="register-error">Your first name <strong>cannot</strong> be more than <?php print($required->functions->html_escape(MAX_FIRST_NAME)); ?> letters long.</p>
<?php
	} elseif($_SESSION['first_name_error'] == 4) {
?>
		<p class="register-error">Your first name <strong>cannot</strong> be less than <?php print($required->functions->html_escape(MIN_FIRST_NAME)); ?> letters long.</p>
<?php
	}

} elseif(isset($_SESSION['last_name_error'])) {

	if($_SESSION['last_name_error'] == 1) {
?>
		<p class="register-error">Please provide your last name.</p>
<?php
	} elseif($_SESSION['last_name_error'] == 2) {
?>
		<p class="register-error">Your last name <strong>cannot</strong> contain any special characters.</p>
<?php
	} elseif($_SESSION['last_name_error'] == 3) {
?>
		<p class="register-error">Your last name <strong>cannot</strong> be more than <?php print($required->functions->html_escape(MAX_LAST_NAME)); ?> letters long.</p>
<?php
	} elseif($_SESSION['last_name_error'] == 4) {
?>
		<p class="register-error">Your last name <strong>cannot</strong> be less than <?php print($required->functions->html_escape(MIN_LAST_NAME)); ?> letters long.</p>
<?php
	}

} elseif(isset($_SESSION['name_error'])) {
?>
		<p class="register-error">Your first name and your last name cannot be the same.</p>
<?php
} elseif(isset($_SESSION['email_error'])) {

	if($_SESSION['email_error'] == 1) {
?>
		<p class="register-error">Please provide your email address.</p>
<?php
	} elseif($_SESSION['email_error'] == 2) {
?>
		<p class="register-error">The email address you have provided is invalid. Please provide a valid email address.</p>
<?php
	} elseif($_SESSION['email_error'] == 3) {
?>
		<p class="register-error">The email address you have provided already is in use. Please use a different one.</p>
<?php
	}

} elseif(isset($_SESSION['password_error'])) {

	if($_SESSION['password_error'] == 1) {
?>
		<p class="register-error">Please provide a password.</p>
<?php
	} elseif($_SESSION['password_error'] == 2) {
?>
		<p class="register-error">The password you provided does not match. Please go back and correct it.</p>
<?php
	}

} elseif(isset($_SESSION['conf_password_error'])) {
?>
		<p class="register-error">Please confirm your password.</p>
<?php
} elseif(isset($_SESSION['gender_error'])) {

	if($_SESSION['gender_error'] == 1) {
?>
		<p class="register-error">Please select a gender.</p>
<?php
	} elseif($_SESSION['gender_error'] == 2) {
?>
		<p class="register-error">Please select a valid gender.</p>
<?php
	}

} elseif(isset($_SESSION['error'])) {
?>
		<p class="register-error">There was an error creating your account.</p>
<?php
}
?>
		<form action="<?php print($required->functions->html_escape($config['URL'] . 'register.php')); ?>" method="POST" class="register">
			<input type="text" name="first_name" placeholder="First Name" autocomplete="off" value="<?php if(isset($_SESSION['r_first'])) { print($required->functions->html_escape($_SESSION['r_first'])); } ?>">
			<div class="p-t-5"></div>
			<input type="text" name="last_name" placeholder="Last Name" autocomplete="off" value="<?php if(isset($_SESSION['r_last'])) { print($required->functions->html_escape($_SESSION['r_last'])); } ?>">
			<div class="p-t-5"></div>
			<input type="email" name="email" placeholder="Email" autocomplete="off" value="<?php if(isset($_SESSION['r_email'])) { print($required->functions->html_escape($_SESSION['r_email'])); } ?>">
			<div class="p-t-5"></div>
			<input type="password" name="password" placeholder="Password" autocomplete="off" value="<?php if(isset($_SESSION['r_password'])) { print($required->functions->html_escape($_SESSION['r_password'])); } ?>">
			<div class="p-t-5"></div>
			<input type="password" name="conf_password" placeholder="Confirm Password" autocomplete="off" value="<?php if(isset($_SESSION['r_conf_password'])) { print($required->functions->html_escape($_SESSION['r_conf_password'])); } ?>">
			<div class="p-t-15"></div>

			<input type="radio" name="gender" id="female" value="1"<?php if(isset($_SESSION['r_gender'])) { if($_SESSION['r_gender'] == 1) { ?> CHECKED<?php } } ?>><label for="female">Female</label><span class="p-l-40"></span><input type="radio" name="gender" id="male" value="2"<?php if(isset($_SESSION['r_gender'])) { if($_SESSION['r_gender'] == 2) { ?> CHECKED<?php } } ?>><label for="male">Male</label><span class="p-l-40"></span><input type="radio" name="gender" id="unidentified" value="3"<?php if(isset($_SESSION['r_gender'])) { if($_SESSION['r_gender'] == 3) { ?> CHECKED<?php } } ?>><label for="unidentified">Unidentified</label>

			<div class="p-t-15"></div>
			<button type="submit" class="button">Signup</button>
		</form>
	</main>

<?php require(ROOT . 'template' . DS . 'footer.php'); ?>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js')); ?>"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'jquery.tooltip.js')); ?>"></script>

</body>
</html><?php
if(isset($_SESSION['r_first'])) {

	unset($_SESSION['r_first']);

}

if(isset($_SESSION['r_last'])) {

	unset($_SESSION['r_last']);

}

if(isset($_SESSION['r_email'])) {

	unset($_SESSION['r_email']);

}

if(isset($_SESSION['r_password'])) {

	unset($_SESSION['r_password']);

}

if(isset($_SESSION['r_conf_password'])) {

	unset($_SESSION['r_conf_password']);

}

if(isset($_SESSION['r_gender'])) {

	unset($_SESSION['r_gender']);

}

if(isset($_SESSION['first_name_error'])) {

	unset($_SESSION['first_name_error']);

}

if(isset($_SESSION['last_name_error'])) {

	unset($_SESSION['last_name_error']);

}

if(isset($_SESSION['name_error'])) {

	unset($_SESSION['name_error']);

}

if(isset($_SESSION['email_error'])) {

	unset($_SESSION['email_error']);

}

if(isset($_SESSION['password_error'])) {

	unset($_SESSION['password_error']);

}

if(isset($_SESSION['conf_password_error'])) {

	unset($_SESSION['conf_password_error']);

}

if(isset($_SESSION['gender_error'])) {

	unset($_SESSION['gender_error']);

}

if(isset($_SESSION['error'])) {

	unset($_SESSION['error']);

}