<?php

require  __DIR__ . '../../vendor/autoload.php';

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST,array(
			'start_date' => array(
				'required' => true
			),
			"end_date" => array(
				'required' => true
			),
			'adults' => array(
				'required' => true
			)
		)); 
		
			if($validation->passed()){

				$reservation = new Booking();

				$salt = Hash::salt(32);

				try{

						$reservation->create(array(
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

				Session::flash('reservationname', Input::get('firstname'));

				Redirect::to('../welcome.php');

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	//}

}

?>