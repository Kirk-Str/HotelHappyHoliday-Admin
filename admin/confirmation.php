<?php

// Include the main class, the rest will be automatically loaded
require  __DIR__ . '../../vendor/autoload.php';

$check_in = "";
$check_out = "";
$nightStay = "";
$adults = "";
$children = "";
$guests = "";

if (Input::exists('get')){

	//if(Token::check(Input::get('token'))){

		// $validate = new Validate();
		// $validation = $validate->check($_POST,array(
		// 	'check_in' => array(
		// 		'required' => true,
		// 	),
		// 	"check_out" => array(
		// 		'required' => true,
		// 	),
		// 	'adults' => array(
        //         'required' => true,
        //         'min' => 1,
        //     )
		// )); 
		
			//if($validation->passed()){

                
                $reservation = new Reservation();
                $reservation->findReservation(Input::get('requestId'));

                $reservationId = $reservation->data()->id;
                $userId = $reservation->data()->user_id;
                $firstname = $reservation->data()->firstname;
                $lastname = $reservation->data()->lastname;
                // $addressOne = $reservation->data()->address_line_one;
                // $addressTwo = $reservation->data()->address_line_two;
                // $city = $reservation->data()->city;
                // $country = $reservation->data()->country;
                // $contactNo = $reservation->data()->contact_no;

                $reservationId = $reservation->data()->id;
                $reservationDate = new DateTime($reservation->data()->requestTimestamp);
                $adults = $reservation->data()->adults;
                $children = $reservation->data()->children;
                $checkIn = new DateTime($reservation->data()->check_in);
                $checkOut = new DateTime($reservation->data()->check_out);
                $specialRequest = '';//$reservation->data()->user.special_request;
                $totalAmount = $reservation->data()->total_amount;
                $amountReceived = $reservation->data()->deposit_amount;
                $balance = $reservation->data()->balance_amount;
                
                $nightStay = $checkOut->diff($checkIn)->format('%a')+1;
                $roomId = $reservation->data()->room_id;
                $roomSelected = $reservation->data()->room_name;
                $roomRate = $reservation->data()->rate;

				//$checkInActual = new DateTime(Input::get('check_in'));
				//$checkOutActual = new DateTime(Input::get('check_out'));
				
				// $adults = Input::get('adults');
                // $children = Input::get('children');
                // $room_id = Input::get('room_id');

                $checkActionButton = 'Check In';

                
                $totalAmount = $nightStay * $roomRate;
                $minPayable = $totalAmount * (60/100);
                $balancePayable = $totalAmount - $minPayable;

                // Create the controller, it is reusable and can render multiple templates
                $core = new Dwoo\Core();

                // Load a template file, this is reusable if you want to render multiple times the same template with different data
                $confirmation = new Dwoo\Template\File('../layouts/checkInOut.tpl');
                $footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
                $scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
                $validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');
                $layoutTemplate = new Dwoo\Template\File('../layouts/template/_Layout.tpl');

                // Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
                $confirmationData = new Dwoo\Data();

                $confirmationData->assign('reservationId', $reservationId);
                $confirmationData->assign('userId', $userId);
                $confirmationData->assign('firstname', $firstname);
                $confirmationData->assign('lastname', $lastname);

                $confirmationData->assign('checkIn', $checkIn->format('d-m-Y'));
                $confirmationData->assign('checkOut', $checkOut->format('d-m-Y'));
                $confirmationData->assign('nightStay', $nightStay);
                $confirmationData->assign('adults', $adults);
                $confirmationData->assign('children', $children);
                $confirmationData->assign('roomSelected', $roomSelected);
                $confirmationData->assign('roomRate', number_format($roomRate, 2));
                $confirmationData->assign('roomId', $roomId);

                $confirmationData->assign('totalAmount', number_format($totalAmount, 2));
                $confirmationData->assign('minPayable', number_format($minPayable, 2));
                $confirmationData->assign('balanceToBePaid', number_format($balancePayable, 2));

                $confirmationData->assign('disabled', 'disabled=disabled');
                $confirmationData->assign('checkActionButton', $checkActionButton);

                $validationScriptPage = new Dwoo\Data();
                $validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

                $mainPage = new Dwoo\Data();
                $mainPage->assign('pageTitle', 'Availability');
                $mainPage->assign('content', $core->get($confirmation, $confirmationData));
                $mainPage->assign('footer', $core->get($footerTemplate));
                $mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));

                echo $core->get($layoutTemplate, $mainPage);


			// } else {
			// 	foreach($validation->errors() as $error){
			// 		echo $error, '<br>';
			// 	}
			// }
	//}

}

?>