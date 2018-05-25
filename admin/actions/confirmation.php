<?php

require '../../vendor/autoload.php';

if (Input::exists()){

	$reservationId = Input::get('requestId');

	if(Input::get('type') != "2" && Input::get('type') != "3"){
		//if(Token::check(Input::get('token'))){

			$approvalStatus = null;

			$validate = new Validate();
			$validation = '';

			$reservation = new Reservation();
			$roomAllocation = new RoomAllocation();
			
			$reservationStatus = 0;

			if($reservation->find($reservationId)){
				
				if($reservation->data()->cancelled){
					$reservationStatus = 3;
				}else if(empty($reservation->data()->check_in_actual)){
					$reservationStatus = 1;
				}else if(!empty($reservation->data()->check_in_actual) && empty($reservation->data()->check_out_actual)){
					$reservationStatus = 2;
				}

				//Cancel Val Function
				if(Input::get('action') == 'Cancel'){

					$validation = $validate->check($_POST,array(
						'action' => array(
							'required' => true,
						),
					)); 

				//Check-In Val Function
				}else if($reservationStatus == 1){

					$validation = $validate->check($_POST,array(
						'actual_adults' => array(
							'required' => true,
						),
						'check_in_single' => array(
							'required' => true
						),
						'room_no' => array(
							'required' => true
						),
					)); 

				//Check-Out Val Function
				}else if($reservationStatus == 2){
					

					$validation = $validate->check($_POST,array(
						'check_out_single' => array(
							'required' => true
						),
					)); 

				}

		
				if($validation->passed()){

					//$reservation->transactBegin();

					try{

						//Cancel Val Function
						if(Input::get('action') == 'Cancel'){

							$reservation->update(array(
								'cancelled' => TRUE,
							), array('reservation_id' => $reservationId));

						}

						//Check-In Val Function
						else if(Input::get('type') == "0")
						{

							//Updating Occupied Room Record
							$roomAllocation->update(
								array(
									'room_status' => 2), 
								array(
									array('room_no', '=', Input::get('room_no')),
									'AND',
									array('room_id', '=', $reservation->data()->room_id)));

							//Updating Reservation Record
							$reservation->update(array(
								'adults_actual' => Input::get('actual_adults'),
								'children_actual' => Input::get('actual_children') ?? NULL,
								'check_in_actual' => Input::get('check_in_single'),
								'room_no' => Input::get('room_no'),
							), array('reservation_id' => $reservationId));

						}
						
						//Check-Out Val Function
						else if(Input::get('type') == "1")
						{

							$actualCheckOut = Input::get('check_out_single');
							$totalAmount = $reservation->data()->total_amount;
							$roomRate = $reservation->data()->rate;
							$balancePayable = $reservation->data()->balance_amount;

							$additionalAmount = Input::get('additional-charges');
							$totalBalanceToBePaid = $balancePayable + $additionalAmount;

							$checkIn = new DateTime($reservation->data()->check_in);
							$checkOut = new DateTime($reservation->data()->check_out);
							$reservedNightStays = $checkOut->diff($checkIn)->format('%a')+1;

							$CheckInDate = new DateTime($reservation->data()->check_in_actual);
							$CheckOutDate = new DateTime($actualCheckOut);
							$actualNightStays = $CheckOutDate->diff($CheckInDate)->format('%a')+1;

							$checkoutDateTime =  (new DateTime())->format('Y-m-d H:i:s');

							if (($actualNightStays * $roomRate) >= $totalAmount){
								
								$balanceAmount = abs(($balancePayable + (($actualNightStays - $reservedNightStays) *  $roomRate)) +  $additionalAmount);
					
							}else{
					
								$balanceAmount = abs(($balancePayable - (($reservedNightStays - $actualNightStays) *  $roomRate))  +  $additionalAmount);
					
							}

							//Updating Occupied Room Record
							$roomAllocation->update(
								array(
									'room_status' => 3), 
								array(
									array('room_no', '=', $reservation->data()->room_no),
									'AND',
									array('room_id', '=', $reservation->data()->room_id)));


							//Updating Reservation Record
							$reservation->update(array(
								'check_out_actual' => Input::get('check_out_single'),
								'additional_amount' => $additionalAmount,
								'balance_amount' => $balanceAmount,
								'check_out_datetime' => $checkoutDateTime,
							), array('reservation_id' => $reservationId));
	
							Email::RoomCheckoutAndBilling($reservationId);

						}

					} catch(Exception $e){

						$reservation->transactRollback();
						die($e->getMessage());

					}


					//$reservation->transactCommit();


					Redirect::to(Config::get('application_path') . 'admin/confirmation.php?requestId=' . $reservationId);

				} else {
					
					foreach($validation->errors() as $error){
						
						$error .= $error . '</br>';
						
					}

					Session::put('message_title', 'There seems to be a problem :(');
					Session::put('message', 'There seems to be a problem :(');
					Session::put('sub_message', $error);
					Redirect::to(Config::get('application_path') . 'message.php');

				}
		//}

				
			Session::put('message_title', 'Ooops!');
			Session::put('message', 'Oops!');
			Session::put('sub_message', '404 or whatever, Page not available.');
		
			Redirect::to(Config::get('application_path') . 'message.php');

		}

	}else{

		Redirect::to(Config::get('application_path') . 'admin/confirmation.php?requestId=' . $reservationId);
		//Redirect::to(Config::get('application_path') . 'admin/index.php?dashboard=new');

	}

}

?>