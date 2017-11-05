<?php

require __DIR__ . '../../core/init.php';

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
            ),
			'card_type' => array(
                'required' => true,
            ),
			'card_no' => array(
				'required' => true,
				'min' => 16,
				'max' => 16,
            ),
			'card_holders_name' => array(
                'required' => true,
            ),
			'expiry_month' => array(
				'required' => true,
				'min' => 2,
            ),
			'expiry_year' => array(
				'required' => true,
				'min' => 4,
            )
		)); 
		
			if($validation->passed()){

				$check_in = new DateTime(Input::get('check_in'));
				$check_out = new DateTime(Input::get('check_out'));
				$nightStay = $check_in->diff($check_out)->format('%a')+1;

				$request = new Request();
				$reservation = new Reservation();
				$room = new Room();
				$room->find(Input::get('room_id'));

				$rate = $room->data()->rate;
				$roomSelected = $room->data()->room_name;
				
                $totalAmount = $nightStay * $rate;
                $minPayable = $totalAmount * (60/100);
				$balancePayable = $totalAmount - $minPayable;
				
				try{	


					$user->transactBegin();

					if(!$validUser == 3){
						
						$userId = $user->create(array(
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

					$requestId = $request->create(array(
						'room_id' => Input::get('room_id'),
						'user_id' => $userId,
						'check_in' =>  $check_in->format('Y-m-d'),
						'check_out' => $check_out->format('Y-m-d'),
						'adults' => Input::get('adults'),
						'children' => Input::get('children'),
						'rate' => $rate,
						'request_type' => 'room'
					));

					$reservation->create(array(
						'request_id' => $requestId,
						'check_in' =>  NULL,
						'check_out' => NULL,
						'adults' => Input::get('adults'),
						'children' => Input::get('children'),
						'total_amount' => $totalAmount,
						'deposit_amount' => $minPayable,
						'balance_amount' => $balancePayable,
						'card_type' => Input::get('card_type'),
						'card_no' => Input::get('card_no'),
						'holders_name' => Input::get('card_holders_name'),
						'card_expiry_month' => Input::get('expiry_month'),
						'card_expiry_year' => Input::get('expiry_year'),
					));

					
					$user->transactCommit();
					
					


				} catch(Exception $e){

					$user->transactRollback();

					die($e->getMessage());
				}

				Session::put('message_title', 'Reservation');
				Session::put('message', 'Reservation Success!');
				Session::put('sub_message', 'Your reservation Id:' . $requestId . '.</br>Please bring the reservation ID when Check-In.');

				Redirect::to('../message.php');

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	//}

}

?>