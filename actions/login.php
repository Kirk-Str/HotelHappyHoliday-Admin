<?php

require __dir__ .'../../vendor/autoload.php';

 $user = new User();
 if ($user->isLoggedIn()){
	 Redirect::to("../../index.php");
 }

 if(Input::exists()){

 	if (Token::check(Input::get('token'))){

 		$validate = new Validate();
 		$validation = $validate->check($_POST,array(
 			'email_id'=>array('required' => true),
 			'password'=>array('required' => true),
 			));

 		if ($validation->passed()){
 			$user = new User();

 			$remember = (Input::get('remember_me') === 'on') ? true : false;
 			$login = $user->login(Input::get('email_id'), Input::get('password'),$remember);
 			if ($login){

                 Redirect::to('../index.php'); 
                 
 			} else {

 				echo 'Sorry, logging in no worky';
 			}

 		} else {

 			foreach($validation->errors() as $error){
 				echo $error, '<br>';
             }	
             		
		}
 	}
 }
?>