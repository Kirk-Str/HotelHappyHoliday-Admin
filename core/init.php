<?php

require __dir__ .'../../vendor/autoload.php';

if(session_status()==PHP_SESSION_NONE) session_start();

$GLOBALS['config'] = array (
			'mysql' => array(
					'host' => '127.0.0.1',
					'username' => 'root',
					'password' => '',
					'db' => 'hhdb'
			),
			'remember' => array(
					'cookie_name' => 'hash',
					'cookie_expiry' => 604800
			),
			'session' => array(
					'session_name' => 'user',
					'token_name' => 'token'
			),
			'application_path' => 'http://localhost/hh/'
	);

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	//echo 'User asked to be remembered';
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('user_session',array('hash','=',$hash));

	if($hashCheck->count()){
		//echo 'Hash matches. Log user in.';
		//echo "Check";
		$user = new User($hashCheck->first()->user_id);
		$user ->login();
	}

}
