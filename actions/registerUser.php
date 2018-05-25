<?php

require_once  $_SERVER['DOCUMENT_ROOT']  . '/core/init.php';
//require '../../core/init.php';
//require  '../../vendor/autoload.php';

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();

		if($_POST['type'] == "add")
		{

			$validation = $validate->check($_POST,array(
				'email_id' => array(
					'required' => true, 
					'min' => 5,
					'max' => 50,
					'unique' => 'user'
				),
				"password" => array(
					'required' => true,
					'min' => 6
				),
				'confirmpassword' => array(
					'required' => true,
					'matches' => 'password'
				),
				'firstname' => array(
					'required' => true,
					'min' => '2',
					'max' => '50'
				),
				'lastname' => array(
					'required' => true,
					'min' => '2',
					'max' => '50'
				),
				'country' => array(
					'required' => true,
					'min' => '2',
					'max' => '50'
				),
				'contact_no' => array(
					'required' => true,
					'min' => '2',
					'max' => '50'
				)
			)); 
		
		}else if($_POST['type'] == "edit")
		{

			$validation = $validate->check($_POST,array(
				'email_id' => array(
					'required' => true, 
					'min' => 5,
					'max' => 50,
				),
				"password" => array(
					'required' => true,
					'min' => 6
				),
				'confirmpassword' => array(
					'required' => true,
					'matches' => 'password'
				),
				'firstname' => array(
					'required' => true,
					'min' => '2',
					'max' => '50'
				),
				'lastname' => array(
					'required' => true,
					'min' => '2',
					'max' => '50'
				),
				'country' => array(
					'required' => true,
					'min' => '2',
					'max' => '50'
				),
				'contact_no' => array(
					'required' => true,
					'min' => '2',
					'max' => '50'
				)
			)); 

		}

		if($validation->passed()){

			$remember = true;

			$userId = '';

			$user = new User();

			$image = $_FILES['avatar-image']['tmp_name'];

			if(!empty($image)){
				$imgContent = base64_encode(file_get_contents($image));
			}else{
				$imgContent = NULL;
			}

			try{

				if($_POST['type'] == "add")
				{

					$salt = Hash::salt(32);

					$userId = $user->create(array(
						'email_id' => Input::get('email_id'),
						'password' => Hash::make(Input::get('password'), $salt),
						'salt' => $salt,
						'avatar_image' => $imgContent,
						'firstname' => Input::get('firstname'),
						'lastname' => Input::get('lastname'),
						'address_line_one' => Input::get('address_line_one'),
						'address_line_two' => Input::get('address_line_two'),
						'city' => Input::get('city'),
						'country' => Input::get('country'),
						'contact_no' => Input::get('contact_no'),
						'role' => '2',
					));
				}
				else if($_POST['type'] == "edit")
				{

					$emailId = Input::get('email_id');

					$row = $user->find($emailId);

					$userId = $user->update(array(
						'password' => Hash::make(Input::get('password'), $row->salt),
						'avatar_image' => $imgContent,
						'firstname' => Input::get('firstname'),
						'lastname' => Input::get('lastname'),
						'address_line_one' => Input::get('address_line_one'),
						'address_line_two' => Input::get('address_line_two'),
						'city' => Input::get('city'),
						'country' => Input::get('country'),
						'contact_no' => Input::get('contact_no'),
					), array('email_id', '=', $emailId));

				}else{
					//Delete user code
				}

			} catch(Exception $e){
				die($e->getMessage());
			}

			$login = $user->login(Input::get('email_id'), Input::get('password'), $remember);
			if ($login){

		
				Email::UserAccountRegistrationConfirmation($userId);

				Session::put('message_title', 'Welcome to Hotel Happy Holiday');
				Session::put('message', 'Welcome to Hotel Happy Holiday, ' . Input::get('firstname') . ' ' . Input::get('lastname'));
				Session::put('sub_message', ' Enjoy our premium services via loyalty membership program.');

				Redirect::to('../message.php');

			} else {

				Session::put('message_title', 'There seems to be a problem :(');
				Session::put('message', 'Sorry, logging in no worky.');
				Session::put('sub_message', 'There seems to be a problem :(');

				Redirect::to('../message.php');

				//echo 'Sorry, logging in no worky';
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
	//}

}

?>