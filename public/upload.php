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

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	require_once(ROOT . 'logic.php');
	$logic = new Logic($config);
	$logic->upload($_FILES);

} else {

	if(isset($_GET['rel'])) {

		if($_GET['rel'] == 'delete') {

			if(file_exists($config['USERS_DIRECTORY'] . $_SESSION[$config['SESSION_COOKIE']] . '.json')) {

				// The image can be moved and was successfully uploaded.
				$_SESSION['delete_photo_success'] = 1;

				$file = file_get_contents($config['USERS_DIRECTORY'] . $_SESSION[$config['SESSION_COOKIE']] . '.json');

				$object = json_decode($file);

				if($object->avatar == '') {
				} else {

					$file = str_replace('"avatar": "' . $object->avatar . '"', '"avatar": ""', $file);

				}

				file_put_contents($config['USERS_DIRECTORY'] . $_SESSION[$config['SESSION_COOKIE']] . '.json', $file);

			} else {

				$_SESSION['delete_photo_error'] = 1;

			}

			header('Location: ' . $config['URL'] . 'upload.php');
			die();

		}

	} else {

		if(file_exists($config['USERS_DIRECTORY'] . $_SESSION[$config['SESSION_COOKIE']] . '.json')) {

			$self = file_get_contents($config['USERS_DIRECTORY'] . $_SESSION[$config['SESSION_COOKIE']] . '.json');
			$self = json_decode($self);

			unset($self->password);

			require_once(ROOT . 'template' . DS . 'upload.php');

		} else {

			require_once(ROOT . 'template' . DS . '404.php');

		}

	}

}