<?php

require  __DIR__ . '../../../vendor/autoload.php';

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

			$user = new User();

			$image = $_FILES['avatar-image']['tmp_name'];

			if(!empty($image)){
				$imgContent = base64_encode(file_get_contents($image));
			}else{
				$imgContent = NULL;
			}

			try{

				if(Input::get('type') == "add")
				{

					$salt = Hash::salt(32);

					$user->create(array(
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
						'role' => Input::get('role'),
					));
					
				}
				else if(Input::get('type') == "edit")
				{

					$emailId = Input::get('email_id');

					$row = $user->find($emailId);
					$updateArray = '';

					if($imgContent == NULL){

						$updateArray = array(
							'password' => Hash::make(Input::get('password'), $row->salt),
							'firstname' => Input::get('firstname'),
							'lastname' => Input::get('lastname'),
							'address_line_one' => Input::get('address_line_one'),
							'address_line_two' => Input::get('address_line_two'),
							'city' => Input::get('city'),
							'country' => Input::get('country'),
							'contact_no' => Input::get('contact_no'),
							'role' => Input::get('role')
						);

					}else{

						$updateArray = array(
							'password' => Hash::make(Input::get('password'), $row->salt),
							'avatar_image' => $imgContent,
							'firstname' => Input::get('firstname'),
							'lastname' => Input::get('lastname'),
							'address_line_one' => Input::get('address_line_one'),
							'address_line_two' => Input::get('address_line_two'),
							'city' => Input::get('city'),
							'country' => Input::get('country'),
							'contact_no' => Input::get('contact_no'),
							'role' => Input::get('role')
						);

					}

					$user->update($updateArray, array('email_id' =>  "'$emailId'"));

				}else{
					//Delete user code
				}

			} catch(Exception $e){
				die($e->getMessage());
			}

			Redirect::to('../users.php?type=opt-filter-all');

				//echo 'Sorry, logging in no worky';	
		} else {

			foreach($validation->errors() as $error){
				
				$error .= $error . '</br>';
				
			}

			Session::put('message_title', 'There seems to be a problem :(');
			Session::put('message', 'There seems to be a problem :(');
			Session::put('sub_message', $error);
			Redirect::to('../message.php');
		}
	//}

}

?>