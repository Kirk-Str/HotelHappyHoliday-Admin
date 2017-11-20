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

$username = '';
$userType = 3;

$user = new User();
$userId = Session::exists('user_id') ? Session::get('user_id') : '';
$username = Session::exists('username') ? Session::get('username') : '';
$validUser = $user->find($userId);
$avatar = empty($user->data()->avatar_image) ? Config::get('application_path') . 'assets/images/home/login-layout-avatar.png' : 'data:image;base64,' . $user->data()->avatar_image;

if($validUser){
	$userType = $user->data()->role;
}

