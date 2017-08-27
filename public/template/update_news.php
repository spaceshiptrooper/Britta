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
<title>Update News - <?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></title>
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'style.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'custom.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'responsive.css')); ?>">
<link rel="icon" href="<?php print($required->functions->html_escape($config['URL'] . 'images' . DS . 'favicon.png')); ?>">
</head>

<body>
<?php require(ROOT . 'template' . DS . 'header.php'); ?>

	<main class="container">
		<div class="welcome pull-left">
			<h1>Edit News Here</h1>
			<hr>
			<div class="p-t-15"></div>
<?php
if(isset($_SESSION['update_news_error'])) {
?>
			<h1>An Error Occurred</h1>
			<p>Please type something into the text area.</p>
<?php
} elseif(isset($_SESSION['update_news_file_error'])) {
?>
			<h1>An Error Occurred</h1>
			<p>There was an error trying to update the news file.</p>
<?php
} elseif(isset($_SESSION['update_news_success'])) {
?>
			<h1>Successfully Updated!</h1>
			<p>The news has been successfully updated!</p>
<?php
}
?>
			<form action="<?php print($required->functions->html_escape($config['URL'])); ?>update_news.php" method="POST">
				<textarea name="update_news" class="update_news preview" placeholder="Type something in"><?php
$news = strtr($config['USERS_DIRECTORY'], ['users' . DS => 'news' . DS]);
$file = file_get_contents($news . 'news.txt');

print_r($file);
?></textarea>
				<div class="p-t-10"></div>
				<p class="small-information">To use allowed codes, go to <a href="<?php print($required->functions->html_escape($config['URL'] . 'codes.php')); ?>" target="_blank"><?php print($required->functions->html_escape($config['URL'] . 'codes.php')); ?></a></p>
				<button type="submit" class="button">Update</button>
			</form>
		</div>

		<div class="news pull-right">
			<h1>Live Preview</h1>
			<hr>
			<div class="p-t-15"></div>
			<div class="data">
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
		</div>
	</main>

	<div class="welcome-main"></div>

<?php require(ROOT . 'template' . DS . 'footer.php'); ?>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js')); ?>"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'jquery.tooltip.js')); ?>"></script>
	<script type="text/javascript">
	jQuery(document).ready(function() {

		$('.update_news').keyup(function() {

			$.ajax({
				url: '<?php print($required->functions->html_escape($config['URL'] . 'jquery_news.php')); ?>',
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
if(isset($_SESSION['update_news_error'])) {

	unset($_SESSION['update_news_error']);

}

if(isset($_SESSION['update_news_file_error'])) {

	unset($_SESSION['update_news_file_error']);

}

if(isset($_SESSION['update_news_success'])) {

	unset($_SESSION['update_news_success']);

}