<?php
// Include the main class, the rest will be automatically loaded
require '..\vendor\autoload.php';



$reservation = new Reservation();

$reservation->findReservation(Input::get('requestId'));

$emailId = $reservation->data()->email_id;
$firstname = $reservation->data()->firstname;
$lastname = $reservation->data()->lastname;
$addressOne = $reservation->data()->address_line_one;
$addressTwo = $reservation->data()->address_line_two;
$city = $reservation->data()->city;
$country = $reservation->data()->country;
$contactNo = $reservation->data()->contact_no;

$reservationId = $reservation->data()->id;
$reservationDate = new DateTime($reservation->data()->requestTimestamp);
$room = $reservation->data()->room_name;
$adults = $reservation->data()->adults;
$children = $reservation->data()->children;
$checkIn = $reservation->data()->check_in;
$checkOut = $reservation->data()->check_out;
$specialRequest = '';//$reservation->data()->user.special_request;
$totalAmount = $reservation->data()->total_amount;
$amountReceived = $reservation->data()->deposit_amount;
$balance = $reservation->data()->balance_amount;



// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$reservationdetailTemplate = new Dwoo\Template\File('../layouts/reservationconfirmation.tpl');
$footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');
$layoutTemplate = new Dwoo\Template\File('../layouts/template/_Layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$reservationData = new Dwoo\Data();
$reservationData->assign('email', $emailId);
$reservationData->assign('firstname', $firstname);
$reservationData->assign('lastname', $lastname);
$reservationData->assign('addressOne', $addressOne);
$reservationData->assign('addressTwo', $addressTwo);
$reservationData->assign('city', $city);
$reservationData->assign('country', $country);
$reservationData->assign('contactNo', $contactNo);

$reservationData->assign('reservationId', $reservationId);
$reservationData->assign('reservationDate', $reservationDate->format('d-m-Y'));
$reservationData->assign('room', $room);
$reservationData->assign('adults', $adults);
$reservationData->assign('children', $children);
$reservationData->assign('checkIn', $checkIn);
$reservationData->assign('checkOut', $checkOut);
$reservationData->assign('specialRequest', $specialRequest);
$reservationData->assign('totalAmount', $totalAmount);
$reservationData->assign('amountReceived', $amountReceived);
$reservationData->assign('balance', $balance);

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', 'Rooms');
$mainPage->assign('content', $core->get($reservationdetailTemplate, $reservationData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));


echo $core->get($layoutTemplate, $mainPage);

?>