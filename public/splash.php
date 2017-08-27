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

class Splash {

	public function __construct($config = []) {

		$this->config = $config;

		if(isset($_GET['step'])) {

			$step = (int) $_GET['step'];

			if($step == 'setup') {

				if($_SERVER['REQUEST_METHOD'] == 'POST') {

					if(!isset($_POST['USERS_DIRECTORY'])) {

						$_SESSION['users_directory_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif($_POST['USERS_DIRECTORY'] == '') {

						$_SESSION['users_directory_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif(!isset($_POST['SESSION_COOKIE'])) {

						$_SESSION['session_cookie_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif($_POST['SESSION_COOKIE'] == '') {

						$_SESSION['session_cookie_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif(!isset($_POST['COOKIE_NAME'])) {

						$_SESSION['cookie_name_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif($_POST['COOKIE_NAME'] == '') {

						$_SESSION['cookie_name_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif(!isset($_POST['URL'])) {

						$_SESSION['url_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif($_POST['URL'] == '') {

						$_SESSION['url_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif(!isset($_POST['MAX_FIRST_NAME'])) {

						$_SESSION['max_first_name_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif($_POST['MAX_FIRST_NAME'] == '') {

						$_SESSION['max_first_name_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif(!isset($_POST['MIN_FIRST_NAME'])) {

						$_SESSION['min_first_name_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif($_POST['MIN_FIRST_NAME'] == '') {

						$_SESSION['min_first_name_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif(!isset($_POST['MAX_LAST_NAME'])) {

						$_SESSION['max_last_name_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif($_POST['MAX_LAST_NAME'] == '') {

						$_SESSION['max_last_name_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif(!isset($_POST['MIN_LAST_NAME'])) {

						$_SESSION['min_last_name_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} elseif($_POST['MIN_LAST_NAME'] == '') {

						$_SESSION['min_last_name_error'] = 1;

						if(isset($_POST['USERS_DIRECTORY'])) {

							if($_POST['USERS_DIRECTORY'] != '') {

								$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];

							}

						}

						if(isset($_POST['SESSION_COOKIE'])) {

							if($_POST['SESSION_COOKIE'] != '') {

								$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];

							}

						}

						if(isset($_POST['COOKIE_NAME'])) {

							if($_POST['COOKIE_NAME'] != '') {

								$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];

							}

						}

						if(isset($_POST['URL'])) {

							if($_POST['URL'] != '') {

								$_SESSION['url'] = $_POST['URL'];

							}

						}

						if(isset($_POST['MAX_FIRST_NAME'])) {

							if($_POST['MAX_FIRST_NAME'] != '') {

								$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];

							}

						}

						if(isset($_POST['MIN_FIRST_NAME'])) {

							if($_POST['MIN_FIRST_NAME'] != '') {

								$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];

							}

						}

						if(isset($_POST['MAX_LAST_NAME'])) {

							if($_POST['MAX_LAST_NAME'] != '') {

								$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];

							}

						}

						if(isset($_POST['MIN_LAST_NAME'])) {

							if($_POST['MIN_LAST_NAME'] != '') {

								$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

							}

						}

						header('Location: ?step=setup');
						die();

					} else {

						$_SESSION['users_directory'] = $_POST['USERS_DIRECTORY'];
						$_SESSION['session_cookie'] = $_POST['SESSION_COOKIE'];
						$_SESSION['cookie_name'] = $_POST['COOKIE_NAME'];
						$_SESSION['url'] = $_POST['URL'];
						$_SESSION['max_first_name'] = $_POST['MAX_FIRST_NAME'];
						$_SESSION['min_first_name'] = $_POST['MIN_FIRST_NAME'];
						$_SESSION['max_last_name'] = $_POST['MAX_LAST_NAME'];
						$_SESSION['min_last_name'] = $_POST['MIN_LAST_NAME'];

						$file = file_get_contents(ROOT . 'config.php');
						$file = str_replace('__USERS_DIRECTORY__', $_POST['USERS_DIRECTORY'], $file);
						file_put_contents(ROOT . 'config.php', $file);

						$file = file_get_contents(ROOT . 'config.php');
						$file = str_replace('__SESSION_COOKIE__', $_POST['SESSION_COOKIE'], $file);
						file_put_contents(ROOT . 'config.php', $file);

						$file = file_get_contents(ROOT . 'config.php');
						$file = str_replace('__COOKIE_NAME__', $_POST['COOKIE_NAME'], $file);
						file_put_contents(ROOT . 'config.php', $file);

						$file = file_get_contents(ROOT . 'config.php');
						$file = str_replace('__URL__', $_POST['URL'], $file);
						file_put_contents(ROOT . 'config.php', $file);

						$file = file_get_contents(ROOT . 'config.php');
						$file = str_replace('__MAX_FIRST_NAME__', $_POST['MAX_FIRST_NAME'], $file);
						file_put_contents(ROOT . 'config.php', $file);

						$file = file_get_contents(ROOT . 'config.php');
						$file = str_replace('__MIN_FIRST_NAME__', $_POST['MIN_FIRST_NAME'], $file);
						file_put_contents(ROOT . 'config.php', $file);

						$file = file_get_contents(ROOT . 'config.php');
						$file = str_replace('__MAX_LAST_NAME__', $_POST['MAX_LAST_NAME'], $file);
						file_put_contents(ROOT . 'config.php', $file);

						$file = file_get_contents(ROOT . 'config.php');
						$file = str_replace('__MIN_LAST_NAME__', $_POST['MIN_LAST_NAME'], $file);
						file_put_contents(ROOT . 'config.php', $file);

						if(file_exists(ROOT . 'images' . DS . 'face.svg')) {

							if(is_writeable(ROOT . 'images' . DS . 'face.svg')) {

								unlink(ROOT . 'images' . DS . 'face.svg');

							}

						}

						if(file_exists(ROOT . 'template' . DS . 'splash.php')) {

							if(is_writeable(ROOT . 'template' . DS . 'splash.php')) {

								unlink(ROOT . 'template' . DS . 'splash.php');

							}

						}

						if(file_exists(ROOT . 'template' . DS . 'splash_setup.php')) {

							if(is_writeable(ROOT . 'template' . DS . 'splash_setup.php')) {

								unlink(ROOT . 'template' . DS . 'splash_setup.php');

							}

						}

						if(file_exists(ROOT . 'splash.php')) {

							if(is_writeable(ROOT . 'splash.php')) {

								unlink(ROOT . 'splash.php');

							}

						}

						if(isset($_POST['url'])) {

							header('Location: ' . $_POST['url']);
							die();

						} else {

							header('Location: /');
							die();

						}

					}

				} else {

					require_once(ROOT . 'template' . DS . 'splash_setup.php');

				}

			} else {

				require_once(ROOT . 'template' . DS . 'splash.php');

			}

		} else {

			require_once(ROOT . 'template' . DS . 'splash.php');

		}

	}

}