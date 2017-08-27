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

			if(file_exists($config['USERS_DIRECTORY'] . $_SESSION[$config['SESSION_COOKIE']] . '.json')) {

				$self = file_get_contents($config['USERS_DIRECTORY'] . $_SESSION[$config['SESSION_COOKIE']] . '.json');
				$self = json_decode($self);

				unset($self->password);

				if($self->user_level == 2) {

					if($_SERVER['REQUEST_METHOD'] == 'POST') {

						if(!isset($_POST['update_news'])) {

							print('Nothing');

						} elseif($_POST['update_news'] == '') {

							print('Nothing');

						} else {

							print('<script src="' . $required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js') . '"></script>');

							print($required->functions->codes($required->functions->html_escape($_POST['update_news'])));

						}

					} else {

						print('Nothing');

					}

				} else {

					print('Nothing');

				}

			} else {

				print('Nothing');

			}

		} else {

			print('Nothing');

		}

	} else {

		print('Nothing');

	}

} else {

	print('Nothing');

}