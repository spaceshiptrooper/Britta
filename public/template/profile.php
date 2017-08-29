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
<title><?php print($required->functions->html_escape($user->first_name . ' ' . $user->last_name)); ?>'s Profile - <?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></title>
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'style.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'custom.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'responsive.css')); ?>">
<link rel="icon" href="<?php print($required->functions->html_escape($config['URL'] . 'images' . DS . 'favicon.png')); ?>">
</head>

<body>
<?php require(ROOT . 'template' . DS . 'header.php'); ?>

	<main class="container">
		<div class="news pull-left">
			<h1>About <?php print($required->functions->html_escape($user->first_name . ' ' . $user->last_name)); ?></h1>
			<hr>
			<div class="p-t-15"></div>
			<div class="data">
<?php
$about = strtr($config['USERS_DIRECTORY'], ['users' . DS => 'about' . DS]);
$file = $about . $user->id . '.txt';
if(file_exists($file)) {

	$getFile = file_get_contents($file);

	if(filesize($file)) {

		$text = $required->functions->codes($required->functions->html_escape($getFile));

		print($text);

	} else {

		print('<p>' . $required->functions->html_escape($user->first_name . ' hasn\'t updated '));

		if($user->gender == 'Female') {

			print('her');

		} elseif($user->gender == 'Male') {

			print('his');

		} else {

			print('their');

		}

		print(' profile yet.</p>');

	}

} else {

	print('<p>Something went wrong. Your <strong>About Me</strong> could not be found. Please contact an administrator to get this fixed.</p>');

}
?>

			</div>
		</div>

		<div class="main-break"></div>

		<div class="welcome pull-right">
			<h1><?php print($required->functions->html_escape($user->first_name . ' ' . $user->last_name)); ?></h1>
			<hr>
<?php
if($user->avatar != '') {
?>
			<img src="<?php print($required->functions->html_escape($config['URL'] . 'avatars' . DS . $user->avatar)); ?>" alt="<?php print($required->functions->html_escape($user->first_name)); ?>'s picture" class="avatar side">
<?php
} else {
?>
			<img src="<?php print($required->functions->html_escape($config['URL'] . 'images' . DS . 'logo.png')); ?>" alt="<?php print($required->functions->html_escape($user->first_name)); ?>'s picture" class="avatar side">
<?php
}
?>
		</div>
	</main>

	<div class="welcome-main"></div>

<?php require(ROOT . 'template' . DS . 'footer.php'); ?>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js')); ?>"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'jquery.tooltip.js')); ?>"></script>

	<script type="text/javascript">
	jQuery(document).ready(function() {

		$('.top').tooltip({align: 'top'});

	});
	</script>

</body>
</html>