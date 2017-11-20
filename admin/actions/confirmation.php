<?php

require '../../vendor/autoload.php';

if (Input::exists()){

	$reservationId = Input::get('requestId');

	if(Input::get('type')!= "2"){
		//if(Token::check(Input::get('token'))){

			
			$validate = new Validate();
			$validation = '';

			$reservation = new Reservation();
			$reservationStatus = 0;

			if($reservation->find($reservationId)){
				if(empty($reservation->data()->check_in_actual)){
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

						$reservation->update(array(
							'adults_actual' => Input::get('actual_adults'),
							'children_actual' => Input::get('actual_children') ?? NULL,
							'check_in_actual' => Input::get('check_in_single'),
						), array('reservation_id' => $reservationId));

					}
					else if(Input::get('type') == "1")
					{

						$reservation->update(array(
							'check_out_actual' => Input::get('check_out_single'),
						), array('reservation_id' => $reservationId));

					}

				} catch(Exception $e){

					$reservation->transactRollback();
					die($e->getMessage());

				}


				$reservation->transactCommit();


				Redirect::to(Config::get('application_path') . 'admin/confirmation.php?requestId=' . $reservationId);

				// if(Input::get('type') == "0"){
				// 	Redirect::to(Config::get('application_path') . 'admin/confirmationList.php?type=opt-filter-occupied');
				// }else{
				// 	Redirect::to(Config::get('application_path') . 'admin/confirmationList.php?type=opt-filter-left');
				// }
				

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
		//}

	}else{

		Redirect::to(Config::get('application_path') . 'admin/confirmation.php?requestId=' . $reservationId);
		//Redirect::to(Config::get('application_path') . 'admin/index.php?dashboard=new');

	}

}

?>