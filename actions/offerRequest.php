<?php

require_once  $_SERVER['DOCUMENT_ROOT']  . '/core/init.php';

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST,array(
			'offer_id' => array(
				'required' => true
			),
            'event_start_date_h' => array(
				'required' => true,
            ),
            'event_end_date_h' => array(
				'required' => true
            ),
            'guests' => array(
				'required' => true,
			)
		)); 
		
			if($validation->passed()){

				$request = new Request();
				$offer = new Offer();
				
				$offerId = Input::get('offer_id');
				$startAt = new DateTime(Input::get('event_start_date_h'));
				$endAt = new DateTime(Input::get('event_end_date_h'));

				$offer->find($offerId);
				$rate = $offer->data()->rate;
				
				try{	

					if(Input::get('type') == 'add'){

						$requestId = $request->create(array(
							'offer_id' => $offerId,
							'user_id' => $userId,
							'event_start_date' => $startAt->format('Y-m-d'),
							'event_end_date' => $endAt->format('Y-m-d'),
							'guests' => Input::get('guests'),
							'note' => Input::get('note'),
							'rate' => $rate
						));

					}

				} catch(Exception $e){

					die($e->getMessage());
				}

				Email::OfferRequestConfirmation($requestId);

				Session::put('message_title', 'Offer Request');
				Session::put('message', 'Offer Request has been sent successfully!');
				Session::put('sub_message', 'Our Holiday representatives will get back to you shortly. Your request no is:' . $requestId . '.</br> Please note the reservation no for reference purposes.');

				Redirect::to('../message.php');

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