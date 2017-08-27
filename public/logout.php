<?php
///////////////////////////////////////////////////////////////
//
//		BRITTA
//		Author: spaceshiptrooper
//		Copyright: 2017 Britta
//		Version: 0.0.0.1
//		File Last Updated: 8/27/2017 at 3:53 A.M.
//
///////////////////////////////////////////////////////////////

require_once('required.php');
$required = new Required();

if(isset($_SESSION[$config['SESSION_COOKIE']])) {

	if(isset($_COOKIE[$config['COOKIE_NAME']])) {

		if($_SESSION[$config['SESSION_COOKIE']] == $_COOKIE[$config['COOKIE_NAME']]) {

			unset($_SESSION[$config['SESSION_COOKIE']]);

			setcookie($config['COOKIE_NAME'], $_COOKIE[$config['COOKIE_NAME']], time() - 3600, DS, '.' . $_SERVER['SERVER_NAME'], isset($_SERVER['HTTPS']), true);

			session_destroy();

			header('Location: ' . $config['URL']);
			die();

		} else {

			header('Location: ' . $config['URL']);
			die();

		}

	} else {

		header('Location: ' . $config['URL']);
		die();

	}

} else {

	header('Location: ' . $config['URL']);
	die();

}