<?php

require __DIR__ . '../../core/init.php';

if($userType == 1){
    Redirect::to(Config::get('application_path') . 'admin/index.php');
}

 if(Input::exists()){

 	if (Token::check(Input::get('token'))){

 		$validate = new Validate();
 		$validation = $validate->check($_POST,array(
 			'email_id'=>array('required' => true),
 			'password'=>array('required' => true),
 			));

 		if ($validation->passed()){

 			$remember = (Input::get('remember_me') === 'on') ? true : false;
 			$login = $user->login(Input::get('email_id'), Input::get('password'),$remember);
 			if ($login){

                 Redirect::to('../index.php'); 
                 
 			} else {

				Session::put('message_title', 'There seems to be a problem :(');
				Session::put('message', 'Sorry, logging in no worky.');
				Session::put('sub_message', 'There seems to be a problem :(');

				Redirect::to('../message.php');

 			}

 		} else {

 			foreach($validation->errors() as $error){
				
				$error .= $error . '</br>';
				
			}

			Session::put('message_title', 'There seems to be a problem :(');
			Session::put('message', 'Sorry, logging in no worky.');
			Session::put('sub_message', $error);
			Redirect::to('../message.php');
             		
		}
 	}
 }
?>