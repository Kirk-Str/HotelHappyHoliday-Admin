<?php

require  __DIR__ . '../../vendor/autoload.php';

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();
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
		
			if($validation->passed()){

				$user = new User();

				$salt = Hash::salt(32);

				try{

						$user->create(array(
							'email_id' => Input::get('email_id'),
							'password' => Hash::make(Input::get('password'), $salt),
							'salt' => $salt,
                            'firstname' => Input::get('firstname'),
                            'lastname' => Input::get('lastname'),
                            'address_line_one' => Input::get('address_line_one'),
                            'address_line_two' => Input::get('address_line_two'),
                            'city' => Input::get('city'),
                            'country' => Input::get('country'),
                            'contact_no' => Input::get('contact_no'),
							'role' => '2',
						));

				} catch(Exception $e){
					die($e->getMessage());
				}

				$login = $user->login(Input::get('email_id'), Input::get('password'),$remember);
				if ($login){
   
					Redirect::to('../index.php'); 
					
				} else {
   
					echo 'Sorry, logging in no worky';
				}
  

				Session::put('message_title', 'Welcome to Hotel Happy Holiday');
				Session::put('message', 'Welcome to Hotel Happy Holiday, ' . Input::get('firstname') . ' ' . Input::get('lastname'));
				Session::put('sub_message', ' Enjoy our premium services via loyalty membership program.');

				Redirect::to('../message.php');

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	//}

}

?>