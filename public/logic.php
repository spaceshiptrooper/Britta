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

use LetterAvatar\LetterAvatar;

class Logic {

	public function __construct($config = NULL) {

		$this->config = $config;

	}

	public function login($array = []) {

		if(!isset($array['email'])) {

			$_SESSION['email_error'] = 1;

			header('Location: ' . $_SERVER['REQUEST_URI']);
			die();

		} elseif($array['email'] == '') {

			$_SESSION['email_error'] = 1;

			header('Location: ' . $_SERVER['REQUEST_URI']);
			die();

		} elseif(!isset($array['password'])) {

			$_SESSION['password_error'] = 1;

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			header('Location: ' . $_SERVER['REQUEST_URI']);
			die();

		} elseif($array['password'] == '') {

			$_SESSION['password_error'] = 1;

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			header('Location: ' . $_SERVER['REQUEST_URI']);
			die();

		} elseif(!filter_var($array['email'], FILTER_VALIDATE_EMAIL, FILTER_FLAG_STRIP_HIGH)) {

			$_SESSION['email_error'] = 2;

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			header('Location: ' . $_SERVER['REQUEST_URI']);
			die();

		} else {

			header('Content-Type: application/json');

			$grab = glob($this->config['USERS_DIRECTORY'] . '*');

			$user = [];

			foreach($grab as $key => $users) {

				if($users == $this->config['USERS_DIRECTORY'] . 'index.htmm' OR $users == $this->config['USERS_DIRECTORY'] . 'index.html') {
				} else {

					$object = file_get_contents($users);

					$obj = json_decode($object);

					@$user[$obj->email] = $obj;

				}

			}

			if(isset($user[$array['email']])) {

				if(password_verify($array['password'], $user[$array['email']]->password)) {

					$_SESSION[$this->config['SESSION_COOKIE']] = $user[$array['email']]->id;
					setcookie($this->config['COOKIE_NAME'], $user[$array['email']]->id, time()+60*60*24*365, DS, '.' . $_SERVER['SERVER_NAME'], isset($_SERVER['HTTPS']), true);

					header('Location: ' . $this->config['URL']);
					die();

				} else {

					$_SESSION['password_error'] = 2;

					header('Location: ' . $this->config['URL']);
					die();

				}

			} else {

				$_SESSION['email_error'] = 2;

				header('Location: ' . $this->config['URL']);
				die();

			}

		}

	}

	public function rehash_the_password($password) {

		/*
			The reason why we use this function is because the hashed password can
			contain \/ from the Json encoded function which for some reason cannot
			be modified from the Json file.

			In order for us to update our password later on, this password string within
			the Json file cannot contain \/. So to do this, we use strpos to check whether
			or not the password contains \/ in it.

			If the password does, re-run this function until the password doesn't contain \/
			anymore.
		*/

		$cost = [
			'cost' => $this->config['COST']
		];

		if(strpos($password, '\\/') !== false) {

			return $this->rehash_the_password($password);

		} else {

			$password = password_hash($password, PASSWORD_BCRYPT, $cost);

			return $password;

		}

	}

	public function generate_avatar($email, $first_name, $last_name) {

		$avatar = new LetterAvatar;

		$avatars = hash('sha256', $email . time());

		$av = $avatars . '.png';

		$generate_file = ROOT . 'avatars' . DS . $av;

		if(file_exists($generate_file)) {

			return $this->generate_avatar($email, $first_name, $last_name);

		} else {

			$avatar
				->generate($first_name . ' ' . $last_name, 300)
				->saveAsPng($generate_file);

			return $av;

		}

	}

	public function register($array = []) {

		if(!isset($array['first_name'])) {

			$_SESSION['first_name_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif($array['first_name'] == '') {

			$_SESSION['first_name_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif(!isset($array['last_name'])) {

			$_SESSION['last_name_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif($array['last_name'] == '') {

			$_SESSION['last_name_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif(!isset($array['email'])) {

			$_SESSION['email_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif($array['email'] == '') {

			$_SESSION['email_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif(!isset($array['password'])) {

			$_SESSION['password_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif($array['password'] == '') {

			$_SESSION['password_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif(!isset($array['conf_password'])) {

			$_SESSION['conf_password_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif($array['conf_password'] == '') {

			$_SESSION['conf_password_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif(!isset($array['gender'])) {

			$_SESSION['gender_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif(!filter_var($array['email'], FILTER_VALIDATE_EMAIL, FILTER_FLAG_STRIP_HIGH)) {

			$_SESSION['email_error'] = 2;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif($array['password'] != $array['conf_password']) {

			$_SESSION['password_error'] = 2;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} elseif(!is_numeric($array['gender'])) {

			$_SESSION['gender_error'] = 2;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['r_first'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['r_last'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['r_email'] = $array['email'];

				}

			}

			if(isset($array['password'])) {

				if($array['password'] != '') {

					$_SESSION['r_password'] = $array['password'];

				}

			}

			if(isset($array['conf_password'])) {

				if($array['conf_password'] != '') {

					$_SESSION['r_conf_password'] = $array['conf_password'];

				}

			}

			if(isset($array['gender'])) {

				if($array['gender'] != '') {

					$_SESSION['r_gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'register.php');
			die();

		} else {

			$grab = glob($this->config['USERS_DIRECTORY'] . '*');

			$user = [];

			foreach($grab as $key => $users) {

				if($users == $this->config['USERS_DIRECTORY'] . 'index.htmm' OR $users == $this->config['USERS_DIRECTORY'] . 'index.html') {
				} else {

					$object = file_get_contents($users);

					$obj = json_decode($object);

					@$user[$obj->email] = $obj;

				}

			}

			if(isset($user[$array['email']])) {

				$_SESSION['email_error'] = 3;

				if(isset($array['first_name'])) {

					if($array['first_name'] != '') {

						$_SESSION['r_first'] = $array['first_name'];

					}

				}

				if(isset($array['last_name'])) {

					if($array['last_name'] != '') {

						$_SESSION['r_last'] = $array['last_name'];

					}

				}

				if(isset($array['email'])) {

					if($array['email'] != '') {

						$_SESSION['r_email'] = $array['email'];

					}

				}

				if(isset($array['password'])) {

					if($array['password'] != '') {

						$_SESSION['r_password'] = $array['password'];

					}

				}

				if(isset($array['conf_password'])) {

					if($array['conf_password'] != '') {

						$_SESSION['r_conf_password'] = $array['conf_password'];

					}

				}

				if(isset($array['gender'])) {

					if($array['gender'] != '') {

						$_SESSION['r_gender'] = $array['gender'];

					}

				}

				header('Location: ' . $this->config['URL'] . 'register.php');
				die();

			} elseif(preg_match('/[!@#$%^&*()+=\\[\]\';,\/{}|":+<>?~\\\\0123456789]/', $array['first_name'])) {

				$_SESSION['first_name_error'] = 2;

				if(isset($array['first_name'])) {

					if($array['first_name'] != '') {

						$_SESSION['r_first'] = $array['first_name'];

					}

				}

				if(isset($array['last_name'])) {

					if($array['last_name'] != '') {

						$_SESSION['r_last'] = $array['last_name'];

					}

				}

				if(isset($array['email'])) {

					if($array['email'] != '') {

						$_SESSION['r_email'] = $array['email'];

					}

				}

				if(isset($array['password'])) {

					if($array['password'] != '') {

						$_SESSION['r_password'] = $array['password'];

					}

				}

				if(isset($array['conf_password'])) {

					if($array['conf_password'] != '') {

						$_SESSION['r_conf_password'] = $array['conf_password'];

					}

				}

				if(isset($array['gender'])) {

					if($array['gender'] != '') {

						$_SESSION['r_gender'] = $array['gender'];

					}

				}

				header('Location: ' . $this->config['URL'] . 'register.php');
				die();

			} elseif(preg_match('/[!@#$%^&*()+=\\[\]\';,\/{}|":+<>?~\\\\0123456789]/', $array['last_name'])) {

				$_SESSION['last_name_error'] = 2;

				if(isset($array['first_name'])) {

					if($array['first_name'] != '') {

						$_SESSION['r_first'] = $array['first_name'];

					}

				}

				if(isset($array['last_name'])) {

					if($array['last_name'] != '') {

						$_SESSION['r_last'] = $array['last_name'];

					}

				}

				if(isset($array['email'])) {

					if($array['email'] != '') {

						$_SESSION['r_email'] = $array['email'];

					}

				}

				if(isset($array['password'])) {

					if($array['password'] != '') {

						$_SESSION['r_password'] = $array['password'];

					}

				}

				if(isset($array['conf_password'])) {

					if($array['conf_password'] != '') {

						$_SESSION['r_conf_password'] = $array['conf_password'];

					}

				}

				if(isset($array['gender'])) {

					if($array['gender'] != '') {

						$_SESSION['r_gender'] = $array['gender'];

					}

				}

				header('Location: ' . $this->config['URL'] . 'register.php');
				die();

			} elseif(mb_strlen($array['first_name'], 'UTF-8') > MAX_FIRST_NAME) {

				$_SESSION['first_name_error'] = 3;

				if(isset($array['first_name'])) {

					if($array['first_name'] != '') {

						$_SESSION['r_first'] = $array['first_name'];

					}

				}

				if(isset($array['last_name'])) {

					if($array['last_name'] != '') {

						$_SESSION['r_last'] = $array['last_name'];

					}

				}

				if(isset($array['email'])) {

					if($array['email'] != '') {

						$_SESSION['r_email'] = $array['email'];

					}

				}

				if(isset($array['password'])) {

					if($array['password'] != '') {

						$_SESSION['r_password'] = $array['password'];

					}

				}

				if(isset($array['conf_password'])) {

					if($array['conf_password'] != '') {

						$_SESSION['r_conf_password'] = $array['conf_password'];

					}

				}

				if(isset($array['gender'])) {

					if($array['gender'] != '') {

						$_SESSION['r_gender'] = $array['gender'];

					}

				}

				header('Location: ' . $this->config['URL'] . 'register.php');
				die();

			} elseif(mb_strlen($array['first_name'], 'UTF-8') < MIN_FIRST_NAME) {

				$_SESSION['first_name_error'] = 4;

				if(isset($array['first_name'])) {

					if($array['first_name'] != '') {

						$_SESSION['r_first'] = $array['first_name'];

					}

				}

				if(isset($array['last_name'])) {

					if($array['last_name'] != '') {

						$_SESSION['r_last'] = $array['last_name'];

					}

				}

				if(isset($array['email'])) {

					if($array['email'] != '') {

						$_SESSION['r_email'] = $array['email'];

					}

				}

				if(isset($array['password'])) {

					if($array['password'] != '') {

						$_SESSION['r_password'] = $array['password'];

					}

				}

				if(isset($array['conf_password'])) {

					if($array['conf_password'] != '') {

						$_SESSION['r_conf_password'] = $array['conf_password'];

					}

				}

				if(isset($array['gender'])) {

					if($array['gender'] != '') {

						$_SESSION['r_gender'] = $array['gender'];

					}

				}

				header('Location: ' . $this->config['URL'] . 'register.php');
				die();

			} elseif(mb_strlen($array['last_name'], 'UTF-8') > MAX_LAST_NAME) {

				$_SESSION['last_name_error'] = 3;

				if(isset($array['first_name'])) {

					if($array['first_name'] != '') {

						$_SESSION['r_first'] = $array['first_name'];

					}

				}

				if(isset($array['last_name'])) {

					if($array['last_name'] != '') {

						$_SESSION['r_last'] = $array['last_name'];

					}

				}

				if(isset($array['email'])) {

					if($array['email'] != '') {

						$_SESSION['r_email'] = $array['email'];

					}

				}

				if(isset($array['password'])) {

					if($array['password'] != '') {

						$_SESSION['r_password'] = $array['password'];

					}

				}

				if(isset($array['conf_password'])) {

					if($array['conf_password'] != '') {

						$_SESSION['r_conf_password'] = $array['conf_password'];

					}

				}

				if(isset($array['gender'])) {

					if($array['gender'] != '') {

						$_SESSION['r_gender'] = $array['gender'];

					}

				}

				header('Location: ' . $this->config['URL'] . 'register.php');
				die();

			} elseif(mb_strlen($array['last_name'], 'UTF-8') < MIN_LAST_NAME) {

				$_SESSION['last_name_error'] = 4;

				if(isset($array['first_name'])) {

					if($array['first_name'] != '') {

						$_SESSION['r_first'] = $array['first_name'];

					}

				}

				if(isset($array['last_name'])) {

					if($array['last_name'] != '') {

						$_SESSION['r_last'] = $array['last_name'];

					}

				}

				if(isset($array['email'])) {

					if($array['email'] != '') {

						$_SESSION['r_email'] = $array['email'];

					}

				}

				if(isset($array['password'])) {

					if($array['password'] != '') {

						$_SESSION['r_password'] = $array['password'];

					}

				}

				if(isset($array['conf_password'])) {

					if($array['conf_password'] != '') {

						$_SESSION['r_conf_password'] = $array['conf_password'];

					}

				}

				if(isset($array['gender'])) {

					if($array['gender'] != '') {

						$_SESSION['r_gender'] = $array['gender'];

					}

				}

				header('Location: ' . $this->config['URL'] . 'register.php');
				die();

			} elseif($array['first_name'] == $array['last_name']) {

				$_SESSION['name_error'] = 1;

				if(isset($array['first_name'])) {

					if($array['first_name'] != '') {

						$_SESSION['r_first'] = $array['first_name'];

					}

				}

				if(isset($array['last_name'])) {

					if($array['last_name'] != '') {

						$_SESSION['r_last'] = $array['last_name'];

					}

				}

				if(isset($array['email'])) {

					if($array['email'] != '') {

						$_SESSION['r_email'] = $array['email'];

					}

				}

				if(isset($array['password'])) {

					if($array['password'] != '') {

						$_SESSION['r_password'] = $array['password'];

					}

				}

				if(isset($array['conf_password'])) {

					if($array['conf_password'] != '') {

						$_SESSION['r_conf_password'] = $array['conf_password'];

					}

				}

				if(isset($array['gender'])) {

					if($array['gender'] != '') {

						$_SESSION['r_gender'] = $array['gender'];

					}

				}

				header('Location: ' . $this->config['URL'] . 'register.php');
				die();

			} else {

				if(isset($array['first_name'])) {

					if($array['first_name'] != '') {

						$_SESSION['r_first'] = $array['first_name'];

					}

				}

				if(isset($array['last_name'])) {

					if($array['last_name'] != '') {

						$_SESSION['r_last'] = $array['last_name'];

					}

				}

				if(isset($array['email'])) {

					if($array['email'] != '') {

						$_SESSION['r_email'] = $array['email'];

					}

				}

				if(isset($array['password'])) {

					if($array['password'] != '') {

						$_SESSION['r_password'] = $array['password'];

					}

				}

				if(isset($array['conf_password'])) {

					if($array['conf_password'] != '') {

						$_SESSION['r_conf_password'] = $array['conf_password'];

					}

				}

				if(isset($array['gender'])) {

					if($array['gender'] != '') {

						$_SESSION['r_gender'] = $array['gender'];

					}

				}

				// Check whether or not the last element of the array is the index file.
				// If it is, use array_pop to remove that element from the array.
				// The array should ONLY contain the user's file based on their ID.
				// If any other file exists in this 
				if(end($grab) == $this->config['USERS_DIRECTORY'] . 'index.html') {

					array_pop($grab);

				}

				$last = end($grab);

				$final = strtr($last, [
					$this->config['USERS_DIRECTORY'] => '',
					'.json' => '',
					'index.htmm' => '',
					'index.html' => ''
				]);

				$final++;

				if($array['gender'] == 1) {

					$gender = 'Female';

				} elseif($array['gender'] == 2) {

					$gender = 'Male';

				} elseif($array['gender'] == 3) {

					$gender = 'Unidentified';

				} else {

					$gender = 'Unidentified';

				}

				if(is_writable($this->config['USERS_DIRECTORY'])) {

					$file = $this->config['USERS_DIRECTORY'] . $final . '.json';
					$handle = fopen($file, 'w'); //implicitly creates file

					$data = new stdClass();

					$data->id = "$final";
					$data->email = $array['email'];
					$data->password = $this->rehash_the_password($array['password']);
					$data->first_name = ucfirst($array['first_name']);
					$data->last_name = ucfirst($array['last_name']);
					$data->gender = $gender;
					$data->avatar = $this->generate_avatar($array['email'], ucfirst($array['first_name']), ucfirst($array['last_name']));
					$data->user_level = '1';

					$new = json_encode($data, JSON_PRETTY_PRINT);
					fwrite($handle, $new);

					$about_me = strtr($this->config['USERS_DIRECTORY'], [
						'users' . DS => 'about' . DS
					]);
					$about_me = $about_me . $final . '.txt';
					$handle_about_me = fopen($about_me, 'w'); //implicitly creates file
					$new_about_me = '';
					fwrite($handle_about_me, $new_about_me);

					$_SESSION['successful_signup'] = 1;

					if(isset($_SESSION['r_first'])) {

						unset($_SESSION['r_first']);

					}

					if(isset($_SESSION['r_last'])) {

						unset($_SESSION['r_last']);

					}

					if(isset($_SESSION['r_email'])) {

						unset($_SESSION['r_email']);

					}

					if(isset($_SESSION['r_password'])) {

						unset($_SESSION['r_password']);

					}

					if(isset($_SESSION['r_conf_password'])) {

						unset($_SESSION['r_conf_password']);

					}

					if(isset($_SESSION['r_gender'])) {

						unset($_SESSION['r_gender']);

					}

					if(isset($_SESSION['first_name_error'])) {

						unset($_SESSION['first_name_error']);

					}

					if(isset($_SESSION['last_name_error'])) {

						unset($_SESSION['last_name_error']);

					}

					if(isset($_SESSION['email_error'])) {

						unset($_SESSION['email_error']);

					}

					if(isset($_SESSION['password_error'])) {

						unset($_SESSION['password_error']);

					}

					if(isset($_SESSION['conf_password_error'])) {

						unset($_SESSION['conf_password_error']);

					}

					if(isset($_SESSION['gender_error'])) {

						unset($_SESSION['gender_error']);

					}

					if(isset($_SESSION['error'])) {

						unset($_SESSION['error']);

					}

					header('Location: ' . $this->config['URL']);
					die();

				} else {

					$_SESSION['error'] = 1;

					header('Location: ' . $this->config['URL'] . 'register.php');
					die();

				}

			}

		}

	}

	public function upload($array = []) {

		if(empty($array['upload_photo']['name'])) {

			$_SESSION['upload_photo_error'] = 1;

			header('Location: ' . $this->config['URL'] . 'upload.php');
			die();

		} else {

			// Check to see if there was any errors in the process
			if($array['upload_photo']['error'] !== UPLOAD_ERR_OK) {

				// Check to see whether the file uploading errors exists
				if(isset($phpFileUploadErrors[$array['upload_photo']['error']])) {

					// If it exist and it's a 0, ignore it.
					if($array['upload_photo']['error'] == 0) {
					} else {

						$_SESSION['upload_photo_error'] = 2;

						$_SESSION['upload_photo_error_message'] = $phpFileUploadErrors[$array['upload_photo']['error']];

						header('Location: ' . $this->config['URL'] . 'upload.php');
						die();

					}

				}

			} else {

				$name = $array['upload_photo']['name']; // Create a $name variable and append the name to it.
				$tmp = $array['upload_photo']['tmp_name']; // Create a $tmp variable and append the tmp_name to it.
				$size = $array['upload_photo']['size']; // Create a $size variable and append the size to it.

				$finfo = new finfo(FILEINFO_MIME_TYPE); // Create a new finfo connection
				$mime = $finfo->file($tmp); // Get the mime type of the tmp file.
				// We want to take the mime type of the tmp file and not the original file because
				// Checking the mime type of a file usually will check the mime type
				// Of the file extension.
				// So to avoid this, we need to check the mime type of the tmp file since the tmp file
				// Contains and carries over the original mime type of the file

				// An alternative to finfo() is mime_content_type
				// Which is currently only available in PHP 7.

				// Check to see if the mime type is currently within our allowed mime type array.
				if(in_array($mime, $this->config['ALLOWED_MIME_TYPES'])) {

					// Create our own custom filename.
					// We shouldn't use people's filenames
					// Because it can overwrite an image if there are two different images
					// With the same filename.

					// With this particular filename, we basically generate a hash for the filename.

					// In order to understand what is happening, we first generate a random number from 0 - 10000.
					// We then take that number and append it the current time stamp using UNIX timestamp.
					// This will then be hashed upon using sha256. This means that the values of the current string
					// Before the hash WILL ALWAYS be different.
					// No matter what.
					$new_name = hash('sha256', time() . rand(0, 10000));

					$ext = substr(strrchr($name, '.'), 1); // Get the file extension from the original filename.
					$file = ROOT . 'avatars' . DS . $new_name . '.' . $ext; // Append our newly created filename along with the old file extension to the string.

					// Check to see if the file size is larger than 5,000,000 bytes which is also equivalent to 5 MB.
					if($size > 5000000) {

						$_SESSION['upload_photo_error'] = 3;

						header('Location: ' . $this->config['URL'] . 'upload.php');
						die();

					} else {

						// Check to see if the file can be moved.
						if(move_uploaded_file($tmp, $file)) {

							if(file_exists($this->config['USERS_DIRECTORY'] . $_SESSION[$this->config['SESSION_COOKIE']] . '.json')) {

								// The image can be moved and was successfully uploaded.
								$_SESSION['upload_photo_success'] = 1;

								$file = file_get_contents($this->config['USERS_DIRECTORY'] . $_SESSION[$this->config['SESSION_COOKIE']] . '.json');

								$object = json_decode($file);

								if($object->avatar == '') {

									$file = str_replace('"avatar": ""', '"avatar": "' . $new_name . '.' . $ext . '"', $file);

								} else {

									$file = str_replace($object->avatar, $new_name . '.' . $ext, $file);
								file_put_contents($this->config['USERS_DIRECTORY'] . $_SESSION[$this->config['SESSION_COOKIE']] . '.json', $file);

								}

								file_put_contents($this->config['USERS_DIRECTORY'] . $_SESSION[$this->config['SESSION_COOKIE']] . '.json', $file);

								header('Location: ' . $this->config['URL'] . 'upload.php');
								die();

							} else {

								$_SESSION['upload_photo_error'] = 4;

								header('Location: ' . $this->config['URL'] . 'upload.php');
								die();

							}

						} else {

							// The image could not be moved
							$_SESSION['upload_photo_error'] = 4;

							header('Location: ' . $this->config['URL'] . 'upload.php');
							die();

						}

					}

				} else {

					// The mime type of the tmp file says that the file isn't a real image.
					// Most likely a modified file to use image file extensions such as .jpg, .jpeg, .gif, .png, .etc.
					$_SESSION['upload_photo_error'] = 4;

					header('Location: ' . $this->config['URL'] . 'upload.php');
					die();

				}

			}

		}

	}

	public function update_news($array = []) {

		if(!isset($array['update_news'])) {

			$_SESSION['update_news_error'] = 1;

			header('Location: ' . $this->config['URL'] . 'update_news.php');
			die();

		} elseif($array['update_news'] == '') {

			$_SESSION['update_news_error'] = 1;

			header('Location: ' . $this->config['URL'] . 'update_news.php');
			die();

		} else {

			$news = strtr($this->config['USERS_DIRECTORY'], [
				'users' . DS => 'news' . DS
			]);
			$file = $news . 'news.txt';
			$getFile = file_get_contents($file);

			if(file_put_contents($file, $array['update_news'])) {

				$_SESSION['update_news_success'] = 1;

				header('Location: ' . $this->config['URL'] . 'update_news.php');
				die();

			} else {

				$_SESSION['update_news_file_error'] = 1;

				header('Location: ' . $this->config['URL'] . 'update_news.php');
				die();

			}

		}

	}

	public function update_about_me($array = []) {

		$self = file_get_contents($this->config['USERS_DIRECTORY'] . $_SESSION[$this->config['SESSION_COOKIE']] . '.json');
		$self = json_decode($self);

		unset($self->password);

		if(!isset($array['update_about_me'])) {

			$_SESSION['update_about_me_error'] = 1;

			header('Location: ' . $this->config['URL'] . 'update_about_me.php');
			die();

		} elseif($array['update_about_me'] == '') {

			$_SESSION['update_about_me_error'] = 1;

			header('Location: ' . $this->config['URL'] . 'update_about_me.php');
			die();

		} else {

			$about = strtr($this->config['USERS_DIRECTORY'], [
				'users' . DS => 'about' . DS
			]);
			$file = $about . $self->id . '.txt';

			if(file_exists($file)) {

				$getFile = file_get_contents($file);

				if(file_put_contents($file, $array['update_about_me'])) {

					$_SESSION['update_about_me_success'] = 1;

					header('Location: ' . $this->config['URL'] . 'update_about_me.php');
					die();

				} else {

					$_SESSION['update_about_me_file_error'] = 1;

					header('Location: ' . $this->config['URL'] . 'update_about_me.php');
					die();

				}

			} else {

				$_SESSION['update_about_me_file_error'] = 2;

				header('Location: ' . $this->config['URL'] . 'update_about_me.php');
				die();

			}

		}

	}

	public function update_settings($array = []) {

		$self = file_get_contents($this->config['USERS_DIRECTORY'] . $_SESSION[$this->config['SESSION_COOKIE']] . '.json');
		$self = json_decode($self);

		unset($self->password);

		if(!isset($array['first_name'])) {

			$_SESSION['first_name_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['first_name'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['last_name'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			if(isset($array['gender'])) {

				if(is_numeric($array['gender'])) {

					$_SESSION['gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'settings.php');
			die();

		} elseif($array['first_name'] == '') {

			$_SESSION['first_name_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['first_name'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['last_name'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			if(isset($array['gender'])) {

				if(is_numeric($array['gender'])) {

					$_SESSION['gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'settings.php');
			die();

		} elseif(!isset($array['last_name'])) {

			$_SESSION['last_name_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['first_name'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['last_name'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			if(isset($array['gender'])) {

				if(is_numeric($array['gender'])) {

					$_SESSION['gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'settings.php');
			die();

		} elseif($array['last_name'] == '') {

			$_SESSION['last_name_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['first_name'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['last_name'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			if(isset($array['gender'])) {

				if(is_numeric($array['gender'])) {

					$_SESSION['gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'settings.php');
			die();

		} elseif($array['first_name'] == $array['last_name']) {

			$_SESSION['name_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['first_name'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['last_name'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			if(isset($array['gender'])) {

				if(is_numeric($array['gender'])) {

					$_SESSION['gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'settings.php');
			die();

		} elseif(!isset($array['email'])) {

			$_SESSION['email_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['first_name'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['last_name'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			if(isset($array['gender'])) {

				if(is_numeric($array['gender'])) {

					$_SESSION['gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'settings.php');
			die();

		} elseif($array['last_name'] == '') {

			$_SESSION['email_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['first_name'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['last_name'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			if(isset($array['gender'])) {

				if(is_numeric($array['gender'])) {

					$_SESSION['gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'settings.php');
			die();

		} elseif(!isset($array['gender'])) {

			$_SESSION['gender_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['first_name'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['last_name'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			if(isset($array['gender'])) {

				if(is_numeric($array['gender'])) {

					$_SESSION['gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'settings.php');
			die();

		} elseif(!isset($array['gender'])) {

			$_SESSION['gender_error'] = 1;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['first_name'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['last_name'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			if(isset($array['gender'])) {

				if(is_numeric($array['gender'])) {

					$_SESSION['gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'settings.php');
			die();

		} elseif(!filter_var($array['email'], FILTER_VALIDATE_EMAIL, FILTER_FLAG_STRIP_HIGH)) {

			$_SESSION['email_error'] = 2;

			if(isset($array['first_name'])) {

				if($array['first_name'] != '') {

					$_SESSION['first_name'] = $array['first_name'];

				}

			}

			if(isset($array['last_name'])) {

				if($array['last_name'] != '') {

					$_SESSION['last_name'] = $array['last_name'];

				}

			}

			if(isset($array['email'])) {

				if($array['email'] != '') {

					$_SESSION['email'] = $array['email'];

				}

			}

			if(isset($array['gender'])) {

				if(is_numeric($array['gender'])) {

					$_SESSION['gender'] = $array['gender'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'settings.php');
			die();

		} else {

			$file = $this->config['USERS_DIRECTORY'] . $self->id . '.json';

			if(file_exists($file)) {

				$getFile = file_get_contents($file);
				$getFile = str_replace($self->first_name, ucfirst($array['first_name']), $getFile);

				if(file_put_contents($file, $getFile)) {

					$getFile = file_get_contents($file);
					$getFile = str_replace($self->last_name, ucfirst($array['last_name']), $getFile);

					if($array['gender'] == 1) {

						$getFile = file_get_contents($file);
						$getFile = str_replace($self->gender, 'Female', $getFile);

					} elseif($array['gender'] == 2) {

						$getFile = file_get_contents($file);
						$getFile = str_replace($self->gender, 'Male', $getFile);

					} elseif($array['gender'] == 3) {

						$getFile = file_get_contents($file);
						$getFile = str_replace($self->gender, 'Unidentified', $getFile);

					}

					$getFile = file_get_contents($file);
					$getFile = str_replace($self->email, $array['email'], $getFile);

					if(file_put_contents($file, $getFile)) {

						$_SESSION['settings_success'] = 1;

						header('Location: ' . $this->config['URL'] . 'settings.php');
						die();

					} else {

						$_SESSION['settings_error'] = 1;

						header('Location: ' . $this->config['URL'] . 'settings.php');
						die();

					}

				} else {

					$_SESSION['settings_error'] = 1;

					header('Location: ' . $this->config['URL'] . 'settings.php');
					die();

				}

			} else {

				$_SESSION['settings_error'] = 2;

				header('Location: ' . $this->config['URL'] . 'settings.php');
				die();

			}

		}

	}

	public function update_password($array = []) {

		$self = file_get_contents($this->config['USERS_DIRECTORY'] . $_SESSION[$this->config['SESSION_COOKIE']] . '.json');
		$self = json_decode($self);

		if(!isset($array['current_password'])) {

			$_SESSION['password_error'] = 1;

			if(isset($array['current_password'])) {

				if($array['current_password'] != '') {

					$_SESSION['current_password'] = $array['current_password'];

				}

			}

			if(isset($array['new_password'])) {

				if($array['new_password'] != '') {

					$_SESSION['new_password'] = $array['new_password'];

				}

			}

			if(isset($array['confirm_new_password'])) {

				if($array['confirm_new_password'] != '') {

					$_SESSION['confirm_new_password'] = $array['confirm_new_password'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'password.php');
			die();

		} elseif($array['current_password'] == '') {

			$_SESSION['password_error'] = 1;

			if(isset($array['current_password'])) {

				if($array['current_password'] != '') {

					$_SESSION['current_password'] = $array['current_password'];

				}

			}

			if(isset($array['new_password'])) {

				if($array['new_password'] != '') {

					$_SESSION['new_password'] = $array['new_password'];

				}

			}

			if(isset($array['confirm_new_password'])) {

				if($array['confirm_new_password'] != '') {

					$_SESSION['confirm_new_password'] = $array['confirm_new_password'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'password.php');
			die();

		} elseif(!isset($array['new_password'])) {

			$_SESSION['password_error'] = 2;

			if(isset($array['current_password'])) {

				if($array['current_password'] != '') {

					$_SESSION['current_password'] = $array['current_password'];

				}

			}

			if(isset($array['new_password'])) {

				if($array['new_password'] != '') {

					$_SESSION['new_password'] = $array['new_password'];

				}

			}

			if(isset($array['confirm_new_password'])) {

				if($array['confirm_new_password'] != '') {

					$_SESSION['confirm_new_password'] = $array['confirm_new_password'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'password.php');
			die();

		} elseif($array['new_password'] == '') {

			$_SESSION['password_error'] = 2;

			if(isset($array['current_password'])) {

				if($array['current_password'] != '') {

					$_SESSION['current_password'] = $array['current_password'];

				}

			}

			if(isset($array['new_password'])) {

				if($array['new_password'] != '') {

					$_SESSION['new_password'] = $array['new_password'];

				}

			}

			if(isset($array['confirm_new_password'])) {

				if($array['confirm_new_password'] != '') {

					$_SESSION['confirm_new_password'] = $array['confirm_new_password'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'password.php');
			die();

		} elseif(!isset($array['confirm_new_password'])) {

			$_SESSION['password_error'] = 3;

			if(isset($array['current_password'])) {

				if($array['current_password'] != '') {

					$_SESSION['current_password'] = $array['current_password'];

				}

			}

			if(isset($array['new_password'])) {

				if($array['new_password'] != '') {

					$_SESSION['new_password'] = $array['new_password'];

				}

			}

			if(isset($array['confirm_new_password'])) {

				if($array['confirm_new_password'] != '') {

					$_SESSION['confirm_new_password'] = $array['confirm_new_password'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'password.php');
			die();

		} elseif($array['confirm_new_password'] == '') {

			$_SESSION['password_error'] = 3;

			if(isset($array['current_password'])) {

				if($array['current_password'] != '') {

					$_SESSION['current_password'] = $array['current_password'];

				}

			}

			if(isset($array['new_password'])) {

				if($array['new_password'] != '') {

					$_SESSION['new_password'] = $array['new_password'];

				}

			}

			if(isset($array['confirm_new_password'])) {

				if($array['confirm_new_password'] != '') {

					$_SESSION['confirm_new_password'] = $array['confirm_new_password'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'password.php');
			die();

		} elseif($array['new_password'] != $array['confirm_new_password']) {

			$_SESSION['password_error'] = 4;

			if(isset($array['current_password'])) {

				if($array['current_password'] != '') {

					$_SESSION['current_password'] = $array['current_password'];

				}

			}

			if(isset($array['new_password'])) {

				if($array['new_password'] != '') {

					$_SESSION['new_password'] = $array['new_password'];

				}

			}

			if(isset($array['confirm_new_password'])) {

				if($array['confirm_new_password'] != '') {

					$_SESSION['confirm_new_password'] = $array['confirm_new_password'];

				}

			}

			header('Location: ' . $this->config['URL'] . 'password.php');
			die();

		} else {

			$file = $this->config['USERS_DIRECTORY'] . $self->id . '.json';

			if(file_exists($file)) {

				if(password_verify($array['current_password'], $self->password)) {

					$new_password = $this->rehash_the_password($array['new_password']);

					$getFile = file_get_contents($file);
					$getFile = str_replace($self->password, $new_password, $getFile);

					if(file_put_contents($file, $getFile)) {

						$_SESSION['password_success'] = 1;

						header('Location: ' . $this->config['URL'] . 'password.php');
						die();

					} else {

						$_SESSION['password_error'] = 6;

						header('Location: ' . $this->config['URL'] . 'password.php');
						die();

					}

				} else {

					$_SESSION['password_error'] = 5;

					if(isset($array['current_password'])) {

						if($array['current_password'] != '') {

							$_SESSION['current_password'] = $array['current_password'];

						}

					}

					if(isset($array['new_password'])) {

						if($array['new_password'] != '') {

							$_SESSION['new_password'] = $array['new_password'];

						}

					}

					if(isset($array['confirm_new_password'])) {

						if($array['confirm_new_password'] != '') {

							$_SESSION['confirm_new_password'] = $array['confirm_new_password'];

						}

					}

					header('Location: ' . $this->config['URL'] . 'password.php');
					die();

				}

			} else {

				$_SESSION['password_error'] = 7;

				if(isset($array['current_password'])) {

					if($array['current_password'] != '') {

						$_SESSION['current_password'] = $array['current_password'];

					}

				}

				if(isset($array['new_password'])) {

					if($array['new_password'] != '') {

						$_SESSION['new_password'] = $array['new_password'];

					}

				}

				if(isset($array['confirm_new_password'])) {

					if($array['confirm_new_password'] != '') {

						$_SESSION['confirm_new_password'] = $array['confirm_new_password'];

					}

				}

				header('Location: ' . $this->config['URL'] . 'password.php');
				die();

			}

		}

	}

}