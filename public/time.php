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

					print('<script src="' . $required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js') . '"></script>');

					$date = new DateTime('now', new DateTimeZone($_POST['tz']));

					$morning = [
						'12 AM',
						'1 AM',
						'2 AM',
						'3 AM',
						'4 AM',
						'5 AM',
						'6 AM',
						'7 AM',
						'8 AM',
						'9 AM',
						'10 AM',
						'11 AM'
					];

					$afternoon = [
						'1 PM',
						'2 PM',
						'3 PM',
						'4 PM',
						'5 PM'
					];

					$evening = [
						'6 PM',
						'7 PM'
					];

					$night = [
						'8 PM',
						'9 PM',
						'10 PM',
						'11 PM'
					];

					if(in_array($date->format('g A'), $morning)) {

						print('Good morning <strong><a href="' . $config['URL'] . 'profile.php?id=' . $self->id . '" data-toggle="tooltip" data-placement="top" title="' . $required->functions->html_escape($self->first_name . ' ' . $self->last_name) . '">' . $required->functions->html_escape($self->first_name) . '</a></strong>.<br />Did you get Starbucks yet?');

					} elseif(in_array($date->format('g A'), $afternoon)) {

						print('Good afternoon <strong><a href="' . $config['URL'] . 'profile.php?id=' . $self->id . '" data-toggle="tooltip" data-placement="top" title="' . $required->functions->html_escape($self->first_name . ' ' . $self->last_name) . '">' . $required->functions->html_escape($self->first_name) . '</a></strong>.');

					} elseif(in_array($date->format('g A'), $evening)) {

						print('Such a bright evening, don&#039;t you think <strong><a href="' . $config['URL'] . 'profile.php?id=' . $self->id . '" data-toggle="tooltip" data-placement="top" title="' . $required->functions->html_escape($self->first_name . ' ' . $self->last_name) . '">' . $required->functions->html_escape($self->first_name) . '</a></strong>?');

					} elseif(in_array($date->format('g A'), $night)) {

						print('How is your night going <strong><a href="' . $config['URL'] . 'profile.php?id=' . $self->id . '" data-toggle="tooltip" data-placement="top" title="' . $required->functions->html_escape($self->first_name . ' ' . $self->last_name) . '">' . $required->functions->html_escape($self->first_name) . '</a></strong>?');

					} elseif(strpos($date->format('g A'), '12') !== false) {

						print('Have you eaten lunch yet <strong><a href="' . $config['URL'] . 'profile.php?id=' . $self->id . '" data-toggle="tooltip" data-placement="top" title="' . $required->functions->html_escape($self->first_name . ' ' . $self->last_name) . '">' . $required->functions->html_escape($self->first_name) . '</a></strong>?');

					}

				} else {

					print('Nothing');

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