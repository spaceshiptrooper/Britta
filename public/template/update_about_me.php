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
<title>Update About Me - <?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></title>
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'style.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'custom.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'responsive.css')); ?>">
<link rel="icon" href="<?php print($required->functions->html_escape($config['URL'] . 'images' . DS . 'favicon.png')); ?>">
</head>

<body>
<?php require(ROOT . 'template' . DS . 'header.php'); ?>

	<main class="container">
		<div class="news pull-left">
			<h1>Live Preview of About Me</h1>
			<hr>
			<div class="p-t-15"></div>
			<div class="data">
<?php
$about = strtr($config['USERS_DIRECTORY'], ['users' . DS => 'about' . DS]);
$file = $about . $self->id . '.txt';
$getFile = file_get_contents($file);

if(filesize($file)) {

	$text = $required->functions->codes($required->functions->html_escape($getFile));

	print($text);

} else {

	print('<p>You have not updated your <strong>About Me</strong> yet. Please update it using this page.</p>');

}
?>

			</div>
		</div>

		<div class="main-break"></div>

		<div class="welcome pull-right">
			<h1>Edit About Me</h1>
			<hr>
			<div class="p-t-15"></div>
<?php
if(isset($_SESSION['update_about_me_error'])) {
?>
			<h1>An Error Occurred</h1>
			<p>Please type something into the text area.</p>
<?php
} elseif(isset($_SESSION['update_about_me_file_error'])) {

	if($_SESSION['update_about_me_file_error'] == 1) {
?>
			<h1>An Error Occurred</h1>
			<p>There was an error trying to update your <strong>About Me</strong>. Please try again.</p>
<?php
	} elseif($_SESSION['update_about_me_file_error'] == 2) {
?>
			<h1>An Error Occurred</h1>
			<p>Something went wrong. Your <strong>About Me</strong> could not be found. Please contact an administrator to get this fixed.</p>
<?php
	}

} elseif(isset($_SESSION['update_about_me_success'])) {
?>
			<h1>Successfully Updated!</h1>
			<p>You have successfully updated your <strong>About Me</strong> section!</p>
<?php
}
?>
			<form action="<?php print($required->functions->html_escape($config['URL'])); ?>update_about_me.php" method="POST">
				<textarea name="update_about_me" class="update_about_me preview" placeholder="<?php
$about = strtr($config['USERS_DIRECTORY'], ['users' . DS => 'about' . DS]);
$file = $about . $self->id . '.txt';
if(file_exists($file)) {

	print('Type something in');

} else {

	print('Something went wrong. Your About Me could not be found. Please contact an administrator to get this fixed.');

}
?>"<?php
if(file_exists($file)) {
} else {
?> disabled<?php
}
?>><?php
if(file_exists($file)) {

	$getFile = file_get_contents($file);

	print($getFile);

}
?></textarea>
				<div class="p-t-10"></div>
				<p class="small-information">To use allowed codes, go to <a href="<?php print($required->functions->html_escape($config['URL'] . 'codes.php')); ?>" target="_blank"><?php print($required->functions->html_escape($config['URL'] . 'codes.php')); ?></a></p>
				<button type="submit" class="button"<?php
if(file_exists($file)) {
} else {
?> disabled<?php
}
?>>Update</button>
			</form>
		</div>
	</main>

	<div class="welcome-main"></div>

<?php require(ROOT . 'template' . DS . 'footer.php'); ?>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js')); ?>"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'jquery.tooltip.js')); ?>"></script>
	<script type="text/javascript">
	jQuery(document).ready(function() {

		$('.update_about_me').keyup(function() {

			$.ajax({
				url: '<?php print($required->functions->html_escape($config['URL'] . 'jquery_about_me.php')); ?>',
				type: 'POST',
				data: $(this).serialize(),
				success: function(data) {
					$('.data').html(data);
				}
			});

		});

	});
	</script>

</body>
</html><?php
if(isset($_SESSION['update_about_me_error'])) {

	unset($_SESSION['update_about_me_error']);

}

if(isset($_SESSION['update_about_me_file_error'])) {

	unset($_SESSION['update_about_me_file_error']);

}

if(isset($_SESSION['update_about_me_success'])) {

	unset($_SESSION['update_about_me_success']);

}