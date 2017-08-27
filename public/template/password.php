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
<title>Password - <?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></title>
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'style.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'custom.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'responsive.css')); ?>">
<link rel="icon" href="<?php print($required->functions->html_escape($config['URL'] . 'images' . DS . 'favicon.png')); ?>">
</head>

<body>
<?php require(ROOT . 'template' . DS . 'header.php'); ?>

	<main class="container">
		<div class="settings">
			<h1>Change your password</h1>
			<hr>
			<div class="p-t-15"></div>
<?php
if(isset($_SESSION['password_error'])) {

	if($_SESSION['password_error'] == 1) {
?>
			<h1>An Error Occurred</h1>
			<p>Please type in your current password.</p>
<?php
	} elseif($_SESSION['password_error'] == 2) {
?>
			<h1>An Error Occurred</h1>
			<p>Please type in your new password.</p>
<?php
	} elseif($_SESSION['password_error'] == 3) {
?>
			<h1>An Error Occurred</h1>
			<p>Please confirm your new password.</p>
<?php
	} elseif($_SESSION['password_error'] == 4) {
?>
			<h1>An Error Occurred</h1>
			<p>Your new password and your confirmation password have to be the same.</p>
<?php
	} elseif($_SESSION['password_error'] == 5) {
?>
			<h1>An Error Occurred</h1>
			<p>Sorry, but that is not your current password.</p>
<?php
	} elseif($_SESSION['password_error'] == 6 OR $_SESSION['password_error'] == 7) {
?>
			<h1>An Error Occurred</h1>
			<p>Something went wrong updating your password.</p>
<?php
	}

} elseif(isset($_SESSION['password_success'])) {
?>
			<h1>Successfully Updated!</h1>
			<p>You have successfully updated your password!</p>
<?php
}
?>
			<form action="<?php print($required->functions->html_escape($config['URL'])); ?>password.php" method="POST">
				<input type="password" name="current_password" placeholder="Current Password" value="<?php
if(isset($_SESSION['current_password'])) {

	print($required->functions->html_escape($_SESSION['current_password']));

}
?>" data-toggle="tooltip" data-placement="top" title="Your current password">
				<div class="p-t-10"></div>
				<input type="password" name="new_password" placeholder="New Password" value="<?php
if(isset($_SESSION['new_password'])) {

	print($required->functions->html_escape($_SESSION['new_password']));

}
?>" data-toggle="tooltip" data-placement="top" title="New Password">
				<div class="p-t-10"></div>
				<input type="password" name="confirm_new_password" placeholder="Confirm New Password" value="<?php
if(isset($_SESSION['confirm_new_password'])) {

	print($required->functions->html_escape($_SESSION['confirm_new_password']));

}
?>" data-toggle="tooltip" data-placement="top" title="Confirm New Password">
				<div class="p-t-10"></div>
				<button type="submit" class="button">Update</button>
			</form>
		</div>
	</main>

	<div class="welcome-main"></div>

<?php require(ROOT . 'template' . DS . 'footer.php'); ?>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js')); ?>"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'jquery.tooltip.js')); ?>"></script>

</body>
</html><?php
if(isset($_SESSION['current_password'])) {

	unset($_SESSION['current_password']);

}

if(isset($_SESSION['new_password'])) {

	unset($_SESSION['new_password']);

}

if(isset($_SESSION['confirm_new_password'])) {

	unset($_SESSION['confirm_new_password']);

}

if(isset($_SESSION['password_error'])) {

	unset($_SESSION['password_error']);

}

if(isset($_SESSION['password_success'])) {

	unset($_SESSION['password_success']);

}