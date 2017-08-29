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
<title>Settings - <?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></title>
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'style.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'custom.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'responsive.css')); ?>">
<link rel="icon" href="<?php print($required->functions->html_escape($config['URL'] . 'images' . DS . 'favicon.png')); ?>">
</head>

<body>
<?php require(ROOT . 'template' . DS . 'header.php'); ?>

	<main class="container">
		<div class="settings">
			<h1>Edit Settings</h1>
			<hr>
			<div class="p-t-15"></div>
<?php
if(isset($_SESSION['first_name_error'])) {
?>
			<h1>An Error Occurred</h1>
			<p>Please type your first name into the text field.</p>
<?php
} elseif(isset($_SESSION['last_name_error'])) {
?>
			<h1>An Error Occurred</h1>
			<p>Please type your last name into the text field.</p>
<?php
} elseif(isset($_SESSION['name_error'])) {
?>
			<h1>An Error Occurred</h1>
			<p>Your first name and your last name cannot be the same.</p>
<?php
} elseif(isset($_SESSION['email_error'])) {
?>
			<h1>An Error Occurred</h1>
			<p>Your first name and your last name cannot be the same.</p>
<?php
} elseif(isset($_SESSION['gender_error'])) {
?>
			<h1>An Error Occurred</h1>
			<p>Please choose a gender.</p>
<?php
} elseif(isset($_SESSION['settings_error'])) {

	if($_SESSION['settings_error'] == 1) {
?>
			<h1>An Error Occurred</h1>
			<p>There was an error trying to update your settings. Please try again.</p>
<?php
	} elseif($_SESSION['settings_error'] == 2) {
?>
			<h1>An Error Occurred</h1>
			<p>Something went wrong. Your settings could not be found. Please contact an administrator to get this fixed.</p>
<?php
	}

} elseif(isset($_SESSION['settings_success'])) {
?>
			<h1>Successfully Updated!</h1>
			<p>You have successfully updated your settings!</p>
<?php
}
?>
			<form action="<?php print($required->functions->html_escape($config['URL'])); ?>settings.php" method="POST">
				<input type="text" name="first_name" placeholder="First Name" value="<?php
if(isset($_SESSION['first_name'])) {

	print($required->functions->html_escape($_SESSION['first_name']));

} elseif(isset($self->first_name)) {

	print($required->functions->html_escape($self->first_name));

}
?>" data-toggle="tooltip" data-placement="top" title="Your first name">
				<div class="p-t-10"></div>
				<input type="text" name="last_name" placeholder="Last Name" value="<?php
if(isset($_SESSION['last_name'])) {

	print($required->functions->html_escape($_SESSION['last_name']));

} elseif(isset($self->last_name)) {

	print($required->functions->html_escape($self->last_name));

}
?>" data-toggle="tooltip" data-placement="top" title="Your last name">
				<div class="p-t-10"></div>

				<input type="email" name="email" placeholder="Email" value="<?php
if(isset($_SESSION['email'])) {

	print($required->functions->html_escape($_SESSION['email']));

} elseif(isset($self->email)) {

	print($required->functions->html_escape($self->email));

}
?>" data-toggle="tooltip" data-placement="top" title="Your email address">
				<div class="p-t-10"></div>

				<div data-toggle="tooltip" data-placement="top" title="Your gender">
					<input type="radio" name="gender" id="female" value="1"<?php
if(isset($_SESSION['gender'])) {

	if($_SESSION['gender'] == 1) {

		print(' CHECKED');

	}

} elseif(isset($self->gender)) {

	if($self->gender == 'Female') {

		print(' CHECKED');

	}

}
?>><label for="female">Female</label><span class="p-l-40"></span><input type="radio" name="gender" id="male" value="2"<?php
if(isset($_SESSION['gender'])) {

	if($_SESSION['gender'] == 2) {

		print(' CHECKED');

	}

} elseif(isset($self->gender)) {

	if($self->gender == 'Male') {

		print(' CHECKED');

	}

}
?>><label for="male">Male</label><span class="p-l-40"></span><input type="radio" name="gender" id="unidentified" value="3"<?php
if(isset($_SESSION['gender'])) {

	if($_SESSION['gender'] == 3) {

		print(' CHECKED');

	}

} elseif(isset($self->gender)) {

	if($self->gender == 'Unidentified') {

		print(' CHECKED');

	}

}
?>><label for="unidentified">Unidentified</label>
				</div>

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

if(isset($_SESSION['gender_error'])) {

	unset($_SESSION['gender_error']);

}

if(isset($_SESSION['settings_error'])) {

	unset($_SESSION['settings_error']);

}

if(isset($_SESSION['settings_success'])) {

	unset($_SESSION['settings_success']);

}