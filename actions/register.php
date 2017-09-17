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
							'role' => '1',
						));

				} catch(Exception $e){
					die($e->getMessage());
				}

				Session::flash('username', Input::get('firstname'));

				Redirect::to('../welcome.php');

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	//}

}

?>