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

			header('Location: ' . $config['URL']);
			die();

		}

	}

}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(empty($_POST)) {

		header('Location: ' . $config['URL']);
		die();

	} else {

		require_once(ROOT . 'logic.php');
		$logic = new Logic($config);
		$logic->register($_POST);

	}

} else {

	require_once(ROOT . 'template' . DS . 'register.php');

}