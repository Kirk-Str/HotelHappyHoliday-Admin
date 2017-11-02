<?php
// Include the main class, the rest will be automatically loaded
require __DIR__ . '../../core/init.php';

//Application Logic in Page

if($userType != 1){

    clearMessage();
    
    Redirect::to('../message.php');

}

$room = new Reservation();

$rows = $room->listRequests();

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
$dashboardData->assign('reservationList', objectToArray($rows));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', 'Rooms');
$mainPage->assign('userType', $userType);
$mainPage->assign('username', strtoupper($username));
$mainPage->assign('reservationList', objectToArray($rows));
$mainPage->assign('content',  $core->get($dashboardTemplate, $dashboardData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));


echo $core->get($layoutTemplate, $mainPage);

?>