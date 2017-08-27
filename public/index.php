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

			$self = file_get_contents($config['USERS_DIRECTORY'] . $_SESSION[$config['SESSION_COOKIE']] . '.json');
			$self = json_decode($self);

			unset($self->password);

			require_once(ROOT . 'template' . DS . 'home.php');

		} else {

			require_once(ROOT . 'template' . DS . 'login.php');

		}

	} else {

		require_once(ROOT . 'template' . DS . 'login.php');

	}

} else {

	require_once(ROOT . 'template' . DS . 'login.php');

}