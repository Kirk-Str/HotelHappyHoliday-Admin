<?php

// Include the main class, the rest will be automatically loaded
require __DIR__ . '../../core/init.php';

if($userType == 1){
    Redirect::to(Config::get('application_path') . 'admin/index.php');
}

$check_in = "";
$check_out = "";
$nightStay = "";
$adults = "";
$children = "";
$guests = "";

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST,array(
			'check_in' => array(
				'required' => true,
			),
			"check_out" => array(
				'required' => true,
			),
			'adults' => array(
                'required' => true,
                'min' => 1,
            )
		)); 
		
			if($validation->passed()){

				$check_in = new DateTime(Input::get('check_in'));
				$check_out = new DateTime(Input::get('check_out'));
				$nightStay = $check_in->diff($check_out)->format('%a')+1;
				$adults = Input::get('adults');
                $children = Input::get('children');
                $room_id = Input::get('room_id');

                

                if($validUser){

                    $firstname = $user->data()->firstname;
                    $lastname = $user->data()->lastname;
                    $email_id = $user->data()->email_id;
                    $address_line_one = $user->data()->address_line_one;
                    $address_line_two = $user->data()->address_line_two;
                    $city = $user->data()->city;
                    $country = $user->data()->country;
                    $contact_no = $user->data()->contact_no;

                }

                $room = new Room();
                $roomSelected = $room->find($room_id)->room_name;
                $roomRate = $room->find($room_id)->rate;

                $totalAmount = $nightStay * $roomRate;
                $minPayable = $totalAmount * (60/100);
                $balancePayable = $totalAmount - $minPayable;

                // Create the controller, it is reusable and can render multiple templates
                $core = new Dwoo\Core();

                // Load a template file, this is reusable if you want to render multiple times the same template with different data
                $confirmation = new Dwoo\Template\File('../layouts/confirmation.tpl');
                $footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
                $scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
                $validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');
                $layoutTemplate = new Dwoo\Template\File('../layouts/template/_Layout.tpl');

                // Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
                $confirmationData = new Dwoo\Data();
                $confirmationData->assign('checkIn', $check_in->format('d-m-Y'));
                $confirmationData->assign('checkOut', $check_out->format('d-m-Y'));
                $confirmationData->assign('nightStay', $nightStay);
                $confirmationData->assign('adults', $adults);
                $confirmationData->assign('children', $children);
                $confirmationData->assign('roomSelected', $roomSelected);
                $confirmationData->assign('roomRate', number_format($roomRate, 2));
                $confirmationData->assign('roomId', $room_id);

                $confirmationData->assign('totalAmount', number_format($totalAmount, 2));
                $confirmationData->assign('minPayable', number_format($minPayable, 2));
                $confirmationData->assign('balanceToBePaid', number_format($balancePayable, 2));

                if($validUser){

                    $confirmationData->assign('userId', $userId);
                    $confirmationData->assign('userType', '2');
                    $confirmationData->assign('disabled', 'disabled');
                    $confirmationData->assign('buttonName', 'Confirm Reservation');
                    $confirmationData->assign('firstname', $firstname);
                    $confirmationData->assign('lastname', $lastname);
                    $confirmationData->assign('emailId', $email_id);
                    $confirmationData->assign('addressLineOne', $address_line_one);
                    $confirmationData->assign('addressLineTwo', $address_line_two);
                    $confirmationData->assign('city', $city);
                    $confirmationData->assign('country', $country);
                    $confirmationData->assign('contactNo', $contact_no);

                }else{

                    $confirmationData->assign('userId', '');
                    $confirmationData->assign('userType', '3');
                    $confirmationData->assign('disabled', '');
                    $confirmationData->assign('buttonName', 'Confirm Reservation');

                    $confirmationData->assign('firstname', '');
                    $confirmationData->assign('lastname', '');
                    $confirmationData->assign('emailId', '');
                    $confirmationData->assign('addressLineOne', '');
                    $confirmationData->assign('addressLineTwo', '');
                    $confirmationData->assign('city', '');
                    $confirmationData->assign('country', '');
                    $confirmationData->assign('contactNo', '');
                }
                

                $validationScriptPage = new Dwoo\Data();
                $validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

                $mainPage = new Dwoo\Data();
                $mainPage->assign('pageTitle', 'Availability');
                $mainPage->assign('userType', $userType);
				$mainPage->assign('username', strtoupper($username));
                $mainPage->assign('content', $core->get($confirmation, $confirmationData));
                $mainPage->assign('footer', $core->get($footerTemplate));
                $mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));

                echo $core->get($layoutTemplate, $mainPage);


			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	//}

}

?>