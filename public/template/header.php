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

$final_url = strtr($config['URL'], ['https://' => '', 'http://' => '']);

if(isset($this)) {

	$required = $this;

}
?>
	<header class="banner">
		<h1><a href="<?php print($required->functions->html_escape($config['URL'])); ?>"><span class="logo-100 title"></span></a><?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></h1>
	</header>

	<nav>
		<ul>
			<li><a href="<?php print($required->functions->html_escape($config['URL'])); ?>"<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == $final_url) { ?> class="active"<?php } ?>>Home</a></li>
<?php
if($self->user_level == 2) {
?>
			<li><a href="<?php print($required->functions->html_escape($config['URL'])); ?>update_news.php"<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == $final_url . 'update_news.php') { ?> class="active"<?php } ?>>Update News</a></li>
<?php
}
?>
			<li><a href="<?php print($required->functions->html_escape($config['URL'])); ?>upload.php"<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == $final_url . 'upload.php') { ?> class="active"<?php } ?>>Upload Avatar</a></li>
			<li><a href="<?php print($required->functions->html_escape($config['URL'])); ?>update_about_me.php"<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == $final_url . 'update_about_me.php') { ?> class="active"<?php } ?>>Update About Me</a></li>
			<li><a href="<?php print($required->functions->html_escape($config['URL'])); ?>settings.php"<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == $final_url . 'settings.php') { ?> class="active"<?php } ?>>Update Settings</a></li>
			<li><a href="<?php print($required->functions->html_escape($config['URL'])); ?>password.php"<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == $final_url . 'password.php') { ?> class="active"<?php } ?>>Change Password</a></li>
			<li><a href="<?php print($required->functions->html_escape($config['URL'] . 'profile.php?id=' . $_SESSION[$config['SESSION_COOKIE']])); ?>"<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == $final_url . 'profile.php?id=' . $_SESSION[$config['SESSION_COOKIE']]) { ?> class="active"<?php } ?>>My Profile</a></li>
			<li><a href="<?php print($required->functions->html_escape($config['URL'])); ?>logout.php">Logout</a></li>
		</ul>
	</nav>
