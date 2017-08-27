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
<title>Home - <?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></title>
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'style.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'custom.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'responsive.css')); ?>">
<link rel="icon" href="<?php print($required->functions->html_escape($config['URL'] . 'images' . DS . 'favicon.png')); ?>">
</head>

<body>
<?php require(ROOT . 'template' . DS . 'header.php'); ?>

	<main class="container">
		<div class="welcome pull-left">
			<p class="time"></p>
		</div>

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

	<div class="welcome-main"></div>

<?php require(ROOT . 'template' . DS . 'footer.php'); ?>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js')); ?>"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'jstz.min.js')); ?>"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'jquery.tooltip.js')); ?>"></script>
	<script type="text/javascript">
	jQuery(document).ready(function() {

		var tz = jstz.determine();
		var timezone = tz.name();

		$.ajax({
			url: '<?php print($required->functions->html_escape($config['URL'] . 'time.php')); ?>',
			type: 'POST',
			data: 'tz=' + timezone,
			success: function(data) {
				$('.time').html(data);
			}
		});

	});
	</script>

</body>
</html>