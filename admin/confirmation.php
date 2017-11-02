<?php

// Include the main class, the rest will be automatically loaded
require __DIR__ . '../../core/init.php';

//Application Logic in Page
if($userType != 1){

    clearMessage();
    
    Redirect::to('../message.php');

}


$check_in = "";
$check_out = "";
$nightStay = 0;
$adults = "";
$children = "";
$guests = "";
$type = 0;

$reservation = new Reservation();

if($reservation->findReservation(Input::get('requestId'))){

    $reservationId = $reservation->data()->id;
    $userId = $reservation->data()->user_id;
    $firstname = $reservation->data()->firstname;
    $lastname = $reservation->data()->lastname;
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

    $actualAdults = $reservation->data()->actual_adults;
    $actualChildren = $reservation->data()->actual_children;

    $actualCheckIn = '';
    $actualCheckOut = '';
    $disabledCheckIn = '';
    $disabledCheckOut = '';
    $disabledAdults = '';
    $disabledChildren = '';
    $requiredCheckIn = '';
    $requiredCheckOut = '';
    $actualNightStays = 0;
    $balanceAmountLabel = '';
    $balanceAmount = 0.00;


    //$totalAmount = $nightStay * $roomRate;
    $minPayable = $totalAmount * (60/100);
    $balancePayable = $totalAmount - $minPayable;


    if(empty($reservation->data()->actual_check_in)){
        $disabledCheckOut = 'disabled=disabled';
        $checkActionButton = 'Check In';
    }

    if(!empty($reservation->data()->actual_check_in)){
        $disabledCheckIn = 'disabled=disabled';
        $disabledAdults = 'disabled=disabled';
        $disabledChildren = 'disabled=disabled';
        $requiredCheckIn = 'required';
        $actualCheckIn = (new DateTime($reservation->data()->actual_check_in))->format('Y-m-d');
        $checkActionButton = "Check Out";
        $type = 1;
    }

    if(!empty($reservation->data()->actual_check_out)){
        $disabledCheckOut = 'disabled=disabled';
        $requiredCheckOut = 'required';
        $CheckInDate = new DateTime($reservation->data()->actual_check_in);
        $CheckOutDate = new DateTime($reservation->data()->actual_check_out);
        $actualNightStays = $CheckOutDate->diff($CheckInDate)->format('%a')+1;
        $actualCheckOut = $CheckOutDate->format('Y-m-d');
        $type = 2;
        $checkActionButton = "Ok";

        $request = new Request();
        $request->find($reservationId);
        $reservedCheckInDate = new DateTime($request->data()->check_in);
        $reservedCheckOutDate = new DateTime($request->data()->check_out);
        $reservedNightStays = $reservedCheckOutDate->diff($reservedCheckInDate)->format('%a')+1;


        
        
        //If guests stay more than pre-booked days, they have to pay additional amount for the days they stayed extra.
        //Or if the guests leave before the checkout day Hotel has to give the balance to guest
        // Following is where that happens.

        if (($actualNightStays * $roomRate) >= $totalAmount){

            $balanceAmountLabel = 'Balance To Be Paid';
            $balanceAmount = abs($balancePayable + (($actualNightStays - $reservedNightStays) *  $roomRate));

        }else{

            $balanceAmountLabel = 'Balance To Be Given';
            $balanceAmount = abs($balancePayable - (($reservedNightStays - $actualNightStays) *  $roomRate));

        }

    }
    


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

    $confirmationData->assign('type', $type);
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


    $confirmationData->assign('actualAdults', $actualAdults);
    $confirmationData->assign('actualChildren', $actualChildren);
    $confirmationData->assign('actualCheckIn', $actualCheckIn);
    $confirmationData->assign('actualCheckOut', $actualCheckOut);
    $confirmationData->assign('actualNightStays', $actualNightStays);
    $confirmationData->assign('balanceAmount', number_format($balanceAmount, 2));


    $confirmationData->assign('balanceAmountLabel', $balanceAmountLabel);
    $confirmationData->assign('requiredCheckIn', $requiredCheckIn);
    $confirmationData->assign('requiredCheckOut', $requiredCheckOut);

  

    $confirmationData->assign('disabled', 'disabled=disabled');
    $confirmationData->assign('disabledCheckIn', $disabledCheckIn);
    $confirmationData->assign('disabledCheckOut', $disabledCheckOut);
    $confirmationData->assign('disabledAdults', $disabledAdults);
    $confirmationData->assign('disabledChildren', $disabledChildren);
    $confirmationData->assign('checkActionButton', $checkActionButton);

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

}else{

    Session::put('message_title', 'Ooops!');
    Session::put('message', 'Oops!');
    Session::put('sub_message', '404 or whatever, Page not available.');

    Redirect::to('../message.php');

}

?>