<?php

require  __DIR__ . '../../vendor/autoload.php';

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST,array(
			'email_id' => array(
				'required' => true, 
				'min' => 5,
				'max' => 50
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
			),
			'check_in' => array(
				'required' => true,
			),
			"check_out" => array(
				'required' => true,
			),
			'adults' => array(
                'required' => true,
                'min' => 1,
			),
			'userType' => array(
                'required' => true,
            )
		)); 
		
			if($validation->passed()){

				$request = new Request();
				$user = new User();
				$room = new Room();
				$rate = $room->find(Input::get('room_id'))->rate;
				$userId = Session::get('user_id');

				try{

						$check_in = new DateTime(Input::get('check_in'));
						$check_out = new DateTime(Input::get('check_out'));

						$request->create(array(
							'room_id' => Input::get('room_id'),
							'user_id' => $userId,
							'check_in' =>  $check_in->format('Y-m-d'),
							'check_out' => $check_out->format('Y-m-d'),
							'adults' => Input::get('adults'),
							'children' => Input::get('children'),
							'rate' => $rate,
                            'request_type' => 'room'
						));

						if(Input::get('userType') === 2){

							$user->create(array(
								'email_id' => Input::get('email_id'),
								'firstname' => Input::get('firstname'),
								'lastname' => Input::get('lastname'),
								'address_line_one' => Input::get('address_line_one'),
								'address_line_two' => Input::get('address_line_two'),
								'city' => Input::get('city'),
								'country' => Input::get('country'),
								'contact_no' => Input::get('contact_no'),
								'role' => '3',
							));

						}

				} catch(Exception $e){
					die($e->getMessage());
				}

				Session::put('message_title', 'Reservation');
				Session::put('message', 'Reservation Success!');
				Session::put('sub_message', 'Your reservation has been successfully registered.');

				Redirect::to('../message.php');

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	//}

}

?>