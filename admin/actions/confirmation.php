<?php

require '../../vendor/autoload.php';

if (Input::exists()){

	if(Input::get('type')!= "2"){

		//if(Token::check(Input::get('token'))){

			$reservationId = $_GET['requestId'];
			$validate = new Validate();
			$validation = '';

			$reservation = new Reservation();
			$reservationStatus = 0;

			if($reservation->findReservation($reservationId)){
				if(empty($reservation->data()->actual_check_in)){
					$reservationStatus = 1;
				}else{
					$reservationStatus = 2;
				}
			}


			if($reservationStatus == 1){

				$validation = $validate->check($_POST,array(
					'actual_adults' => array(
						'required' => true,
					),
					'check_in_single' => array(
						'required' => true
					),
				)); 

			}else{

				$validation = $validate->check($_POST,array(
					'check_out_single' => array(
						'required' => true
					),
				)); 

			}

			
			
			if($validation->passed()){

				$reservation = new Reservation();

				$reservation->transactBegin();

				try{




					if(Input::get('type') == "0")
					{

						$reservation->checkIn(array(
							'adults' => Input::get('actual_adults'),
							'children' => Input::get('actual_children') ?? NULL,
							'check_in' => Input::get('check_in_single'),
						), array('request_id' => $reservationId));

					}
					else if(Input::get('type') == "1")
					{

						$reservation->checkIn(array(
							'check_out' => Input::get('check_out_single'),
						), array('request_id' => $reservationId));

						$request = new Request();
						$request->find($reservationId);
						$request->update(array('approval_status'=> 1, 'approval_timestamp' => date('Y-m-d h:i:s a')), $reservationId);
					}

				} catch(Exception $e){

					$reservation->transactRollback();
					die($e->getMessage());

				}


				$reservation->transactCommit();

				Redirect::to(Config::get('application_path') . 'admin/index.php');

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
		//}

	}else{

		Redirect::to(Config::get('application_path') . 'admin/index.php');

	}

}

?>