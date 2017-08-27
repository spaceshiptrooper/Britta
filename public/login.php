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

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(empty($_POST)) {

		header('Location: ' . $config['URL']);
		die();

	} else {

		require_once(ROOT . 'logic.php');
		$logic = new Logic($config);
		$logic->login($_POST);

	}

} else {

	$_SESSION['email_error'] = 1;

	header('Location: ' . $config['URL']);
	die();

}