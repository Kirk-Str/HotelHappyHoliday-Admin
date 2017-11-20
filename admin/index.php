<?php
// Include the main class, the rest will be automatically loaded
require __DIR__ . '../../core/init.php';

//Application Logic in Page

if($userType != 1 || empty($_GET)){

    clearMessage();
    
    Redirect::to('../message.php');

}

$dashboardFor = '';
$newBookings = 0;
$newOccupiedReservation = 0;
$newOffers = 0;

$reservation = new Reservation();
$request = new Request();

$rows = '';

//listing records based on following parameters
	//type = Null: not checked-in yet,
	//type = 'occupied': checked in
	//type = 'left': left the room
    //type = 'canceled': canceled or didn't show up
$rows = $reservation->listRequests();
$newBookings = $rows ? count($rows) : 0;

$rows = $reservation->listRequests('occupied');
$newOccupiedReservation = $rows ? count($rows) : 0;

$rowsRequest = $request->listRequests('new');
$newRequests = $rowsRequest ? count($rowsRequest) : 0;

// $rows = $reservation->listRequests('occupied');
// $newOccupiedReservation = count($rows);

if(Input::get("dashboard") == "opt-filter-new"){
    $dashboardFor = 'New Bookings';
    $rows = $reservation->listRequests();
}elseif(Input::get("dashboard") == "opt-filter-occupied"){
    $dashboardFor = 'Occupied Rooms';
    $rows = $reservation->listRequests('occupied');
}elseif(Input::get("dashboard") == "opt-filter-offers"){
    $dashboardFor = 'New Offer Reqests';
    $rows = $request->listRequests('new');
}
// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$dashboardTemplate = new Dwoo\Template\File('../layouts/dashboard.tpl');
$footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');
$layoutTemplate = new Dwoo\Template\File('../layouts/template/_Layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$dashboardData = new Dwoo\Data();
$dashboardData->assign('newBookings', $newBookings);
$dashboardData->assign('newOccupiedReservation', $newOccupiedReservation);
$dashboardData->assign('newRequests', $newRequests);
$dashboardData->assign('dashboardFor', $dashboardFor);


if(Input::get("dashboard") != "opt-filter-offers"){

    $dashboardData->assign('reservationList', objectToArray($rows));
    
}
else{

    $dashboardData->assign('offerList', objectToArray($rows));

}

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', 'Rooms');
$mainPage->assign('userType', $userType);
$mainPage->assign('username', strtoupper($username));
$mainPage->assign('avatar', $avatar);
$mainPage->assign('content',  $core->get($dashboardTemplate, $dashboardData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));

echo $core->get($layoutTemplate, $mainPage);

?>