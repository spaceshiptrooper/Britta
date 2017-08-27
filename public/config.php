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

class Config {

	public function run() {

		$config = [
			'USERS_DIRECTORY' => '__USERS_DIRECTORY__',
			'SESSION_COOKIE' => '__SESSION_COOKIE__',
			'COOKIE_NAME' => '__COOKIE_NAME__',
			'URL' => '__URL__',
			'MAX_FIRST_NAME' => '__MAX_FIRST_NAME__',
			'MIN_FIRST_NAME' => '__MIN_FIRST_NAME__',
			'MAX_LAST_NAME' => '__MAX_LAST_NAME__',
			'MIN_LAST_NAME' => '__MIN_LAST_NAME__',
			'COST' => '10',
			'ALLOWED_MIME_TYPES' => [
				'image/png',
				'image/jpg',
				'image/jpeg',
				'image/gif',
			]
		];

		return $config;

	}

}