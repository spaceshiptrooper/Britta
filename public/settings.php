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

				if($_SERVER['REQUEST_METHOD'] == 'POST') {

					require_once(ROOT . 'logic.php');
					$logic = new Logic($config);
					$logic->update_settings($_POST);

				} else {

					require_once(ROOT . 'template' . DS . 'settings.php');

				}

			} else {

				require_once(ROOT . 'template' . DS . '404_guest.php');

			}

		} else {

			require_once(ROOT . 'template' . DS . '404_guest.php');

		}

	} else {

		require_once(ROOT . 'template' . DS . '404_guest.php');

	}

} else {

	require_once(ROOT . 'template' . DS . '404_guest.php');

}