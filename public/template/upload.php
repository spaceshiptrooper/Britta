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
<title>Upload Avatar - <?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></title>
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'style.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'custom.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'responsive.css')); ?>">
<link rel="icon" href="<?php print($required->functions->html_escape($config['URL'] . 'images' . DS . 'favicon.png')); ?>">
</head>

<body>
<?php require(ROOT . 'template' . DS . 'header.php'); ?>

	<main class="container">
<?php
if(isset($_SESSION['upload_photo_error'])) {

	if($_SESSION['upload_photo_error'] == 1) {
?>
		<p class="upload-error">Please upload an image.</p>
<?php
	} elseif($_SESSION['upload_photo_error'] == 2) {
?>
		<p class="upload-error"><?php print($required->functions->html_escape($_SESSION['upload_photo_error_message'])); ?></p>
<?php
	} elseif($_SESSION['upload_photo_error'] == 3) {
?>
		<p class="upload-error">Sorry, your file is too large. Please upload a much smaller file.</p>
<?php
	} elseif($_SESSION['upload_photo_error'] == 4) {
?>
		<p class="upload-error">There was a problem uploading your image. Please try again.</p>
<?php
	} elseif($_SESSION['upload_photo_error'] == 5) {
?>
		<p class="upload-error">Please upload a real image file.</p>
<?php
	}

} elseif(isset($_SESSION['upload_photo_success'])) {
?>
		<p class="upload-success">Your picture has been uploaded!</p>
<?php
} elseif(isset($_SESSION['delete_photo_success'])) {
?>
		<p class="upload-success">Your picture has been deleted successfully!</p>
<?php
} elseif(isset($_SESSION['delete_photo_error'])) {
?>
		<p class="upload-error">There was an error trying to delete your picture.</p>
<?php
}

if($self->avatar != '') {
?>
		<img src="<?php print($required->functions->html_escape($config['URL'] . 'avatars' . DS . $self->avatar)); ?>" alt="<?php print($required->functions->html_escape($self->first_name . '\'s picture')); ?>" class="avatar">
<?php
}
?>
		<form action="<?php print($required->functions->html_escape($config['URL'] . 'upload.php')); ?>" method="POST" enctype="multipart/form-data" id="form">
			<div class="file-input">
				<input type="file" name="upload_photo" id="file" accept="image/*">
				<span class="file">Choose</span>
				<span class="label" data-js-label>No file selected</span>
			</div>
			<div class="p-t-10"></div>
			<button type="submit" class="button">Upload</button>
<?php
if($self->avatar != '') {
?>
			<a href="<?php print($required->functions->html_escape($config['URL'] . 'upload.php?rel=delete')); ?>" class="button pull-right">Delete Avatar</a>
<?php
}
?>
		</form>
	</main>

<?php require(ROOT . 'template' . DS . 'footer.php'); ?>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js')); ?>"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'jquery.tooltip.js')); ?>"></script>

</body>
</html><?php
if(isset($_SESSION['upload_photo_error'])) {

	unset($_SESSION['upload_photo_error']);

}

if(isset($_SESSION['upload_photo_error_message'])) {

	unset($_SESSION['upload_photo_error_message']);

}

if(isset($_SESSION['upload_photo_success'])) {

	unset($_SESSION['upload_photo_success']);

}

if(isset($_SESSION['delete_photo_success'])) {

	unset($_SESSION['delete_photo_success']);

}

if(isset($_SESSION['delete_photo_error'])) {

	unset($_SESSION['delete_photo_error']);

}