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
			$reservationStatus = 0;

			if($reservation->find($reservationId)){
				
				if($reservation->data()->cancelled){
					$reservationStatus = 3;
				}else if(empty($reservation->data()->check_in_actual)){
					$reservationStatus = 1;
				}else if(!empty($reservation->data()->check_in_actual) && empty($reservation->data()->check_out_actual)){
					$reservationStatus = 2;
				}

				if(Input::get('action') == 'Cancel'){

					$validation = $validate->check($_POST,array(
						'action' => array(
							'required' => true,
						),
					)); 

				}else if($reservationStatus == 1){

					$validation = $validate->check($_POST,array(
						'actual_adults' => array(
							'required' => true,
						),
						'check_in_single' => array(
							'required' => true
						),
					)); 

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

						if(Input::get('action') == 'Cancel'){

							$reservation->update(array(
								'cancelled' => TRUE,
							), array('reservation_id' => $reservationId));

						}
						else if(Input::get('type') == "0")
						{

							$reservation->update(array(
								'adults_actual' => Input::get('actual_adults'),
								'children_actual' => Input::get('actual_children') ?? NULL,
								'check_in_actual' => Input::get('check_in_single'),
							), array('reservation_id' => $reservationId));

						}
						else if(Input::get('type') == "1")
						{

							
							$additionalAmount = Input::get('additional-charges');
							$totalBalanceToBePaid = $balance + $additionalAmount;

							$actualCheckOut = Input::get('check_out_single');
							$totalAmount = $reservation->data()->total_amount;
							$roomRate = $reservation->data()->rate;
							$balancePayable = $reservation->data()->balance_amount;

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


							$reservation->update(array(
								'check_out_actual' => Input::get('check_out_single'),
								'additional_amount' => $additionalAmount,
								'balance_amount' => $balanceAmount,
								'check_out_datetime' => $checkoutDateTime,
							), array('reservation_id' => $reservationId));

						}

					} catch(Exception $e){

						$reservation->transactRollback();
						die($e->getMessage());

					}


					//$reservation->transactCommit();


					Redirect::to(Config::get('application_path') . 'admin/confirmation.php?requestId=' . $reservationId);

					// if(Input::get('type') == "0"){
					// 	Redirect::to(Config::get('application_path') . 'admin/confirmationList.php?type=opt-filter-occupied');
					// }else{
					// 	Redirect::to(Config::get('application_path') . 'admin/confirmationList.php?type=opt-filter-left');
					// }
				

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

				
			Session::put('message_title', 'Ooops!');
			Session::put('message', 'Oops!');
			Session::put('sub_message', '404 or whatever, Page not available.');
		
			Redirect::to('../message.php');

		}

	}else{

		Redirect::to(Config::get('application_path') . 'admin/confirmation.php?requestId=' . $reservationId);
		//Redirect::to(Config::get('application_path') . 'admin/index.php?dashboard=new');

	}

}

?>