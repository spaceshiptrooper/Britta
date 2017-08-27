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

class Required {

	public function __construct() {

		if(session_id() == '') {
			session_start();
		}

		if(!defined('DS')) {
			define('DS', '/');
		}

		if(!defined('ROOT')) {
			define('ROOT', realpath(__DIR__) . DS);
		}

		$this->configuration();
		$this->getFunctions();
		$this->intro();
		$this->checkFile();

	}

	protected function configuration() {

		global $config;

		require_once(ROOT . 'config.php');
		$new_config = new Config();
		$config = $new_config->run();
		$this->config = $config;

		require_once(ROOT . 'vendor' . DS . 'autoload.php');

		$config['WEBSITE_TITLE'] = 'Britta';
		$config['BRITTA_WEBSITE'] = 'https://github.com/spaceshiptrooper/Britta';

		$this->config = $config;

		if(isset($_SESSION['URL'])) {

			$this->config['URL'] = $_SESSION['URL'];

		}

		if(!defined('MAX_FIRST_NAME')) {
			define('MAX_FIRST_NAME', $this->config['MAX_FIRST_NAME']);
		}

		if(!defined('MIN_FIRST_NAME')) {
			define('MIN_FIRST_NAME', $this->config['MIN_FIRST_NAME']);
		}

		if(!defined('MAX_LAST_NAME')) {
			define('MAX_LAST_NAME', $this->config['MAX_LAST_NAME']);
		}

		if(!defined('MIN_LAST_NAME')) {
			define('MIN_LAST_NAME', $this->config['MIN_LAST_NAME']);
		}

		if(PHP_VERSION < '5.4') {

			require_once(ROOT . 'vendor' . DS . 'password_compat-master' . DS . 'lib' . DS . 'password.php');

		}

	}

	public function getFunctions() {

		require_once(ROOT . 'functions.php');
		$this->functions = new Functions($this->config);
		return $this->functions;

	}

	protected function intro() {

		if(file_exists(ROOT . 'splash.php')) {

			require_once(ROOT . 'splash.php');
			new Splash($this->config);
			die();

		}

	}

	public function checkFile() {

		$config = $this->config;

		if(isset($_GET['url'])) {

			if(file_exists(ROOT . $_GET['url'])) {
			} else {

				if(isset($_SESSION[$config['SESSION_COOKIE']])) {

					if(isset($_COOKIE[$config['COOKIE_NAME']])) {

						if($_SESSION[$config['SESSION_COOKIE']] == $_COOKIE[$config['COOKIE_NAME']]) {

							if(file_exists($config['USERS_DIRECTORY'] . $_SESSION[$config['SESSION_COOKIE']] . '.json')) {

								$self = file_get_contents($config['USERS_DIRECTORY'] . $_SESSION[$config['SESSION_COOKIE']] . '.json');
								$self = json_decode($self);

								unset($self->password);

								require_once(ROOT . 'template' . DS . 'required' . DS . '404.php');
								die();

							} else {

								require_once(ROOT . 'template' . DS . 'required' . DS . '404_guest.php');
								die();

							}

						} else {

							require_once(ROOT . 'template' . DS . 'required' . DS . '404_guest.php');
							die();

						}

					} else {

						require_once(ROOT . 'template' . DS . 'required' . DS . '404_guest.php');
						die();

					}

				} else {

					require_once(ROOT . 'template' . DS . 'required' . DS . '404_guest.php');
					die();

				}

			}

		}

	}

}