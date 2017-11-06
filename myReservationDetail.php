<?php

// Include the main class, the rest will be automatically loaded
require __DIR__ . '../core/init.php';

//Application Logic in Page
if($userType != 2){

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

if($reservation->findReservation(Input::get('requestId'), $userId)){

    $reservationId = $reservation->data()->id;
    $firstname = $reservation->data()->firstname;
    $lastname = $reservation->data()->lastname;
    $requestTimestamp = new DateTime($reservation->data()->requestTimestamp);

    $roomId = $reservation->data()->room_id;
    $roomSelected = $reservation->data()->room_name;
    $roomRate = $reservation->data()->rate;

    $adults = $reservation->data()->adults;
    $children = $reservation->data()->children;

    $checkIn = new DateTime($reservation->data()->check_in);
    $checkOut = new DateTime($reservation->data()->check_out);
    $nightStay = $checkOut->diff($checkIn)->format('%a')+1;

    $specialRequest = '';//$reservation->data()->user.special_request;

    $totalAmount = $reservation->data()->total_amount;
    $advancePaid = $reservation->data()->deposit_amount;
    $balanceToBePaid = $reservation->data()->balance_amount;
    
    
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
    $checkActionButton = 'Ok';

    // Create the controller, it is reusable and can render multiple templates
    $core = new Dwoo\Core();

    // Load a template file, this is reusable if you want to render multiple times the same template with different data
    $confirmation = new Dwoo\Template\File('./layouts/myReservationDetail.tpl');
    $footerTemplate = new Dwoo\Template\File('./layouts/template/_footer.tpl');
    $scriptTemplate = new Dwoo\Template\File('./layouts/template/_scripts.tpl');
    $validationScriptTemplate = new Dwoo\Template\File('./layouts/template/_validationScripts.tpl');
    $layoutTemplate = new Dwoo\Template\File('./layouts/template/_Layout.tpl');

    // Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
    $myReservationDetail = new Dwoo\Data();

    $myReservationDetail->assign('type', $type);
    $myReservationDetail->assign('reservationId', $reservationId);

    $myReservationDetail->assign('requestedDate', $requestTimestamp->format('d-m-Y'));
    $myReservationDetail->assign('checkIn', $checkIn->format('d-m-Y'));
    $myReservationDetail->assign('checkOut', $checkOut->format('d-m-Y'));
    $myReservationDetail->assign('nightStays', $nightStay);
    $myReservationDetail->assign('adults', $adults);
    $myReservationDetail->assign('children', $children);
    $myReservationDetail->assign('roomSelected', $roomSelected);
    $myReservationDetail->assign('roomRate', number_format($roomRate, 2));
    $myReservationDetail->assign('roomId', $roomId);

    $myReservationDetail->assign('totalAmount', number_format($totalAmount, 2));
    $myReservationDetail->assign('advancePaid', number_format($advancePaid, 2));
    $myReservationDetail->assign('balanceToBePaid', number_format($balanceToBePaid, 2));

    $myReservationDetail->assign('disabled', 'disabled=disabled');
    $myReservationDetail->assign('checkActionButton', $checkActionButton);

    $validationScriptPage = new Dwoo\Data();
    $validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

    $mainPage = new Dwoo\Data();
    $mainPage->assign('pageTitle', 'Availability');
    $mainPage->assign('userType', $userType);
    $mainPage->assign('username', strtoupper($username));
    $mainPage->assign('content', $core->get($confirmation, $myReservationDetail));
    $mainPage->assign('footer', $core->get($footerTemplate));
    $mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));

    echo $core->get($layoutTemplate, $mainPage);

}else{

    Session::put('message_title', 'Ooops!');
    Session::put('message', 'Oops!');
    Session::put('sub_message', '404 or whatever, Page not available.');

    Redirect::to('./message.php');

}

?>