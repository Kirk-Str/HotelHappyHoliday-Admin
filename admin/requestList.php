<?php
// Include the main class, the rest will be automatically loaded
require_once  $_SERVER['DOCUMENT_ROOT']  . '/core/init.php';

//Application Logic in Page
if($userType != 1 || empty($_GET)){

    clearMessage();
    
    Redirect::to('../message.php');

}


$request = new Request();
$rows = '';

//listing records based on following parameters
	//type = Null: not checked-in yet,
	//type = 'occupied': checked in
	//type = 'left': left the offer
    //type = 'canceled': canceled or didn't show up
    
if(Input::get("type") === "opt-filter-all"){
    $rows = $request->listRequests();
}elseif(Input::get("type") === "opt-filter-new"){
    $rows = $request->listRequests('new');
}elseif(Input::get("type") === "opt-filter-accepted"){
    $rows = $request->listRequests('accepted');
}elseif(Input::get("type") === "opt-filter-declined"){
    $rows = $request->listRequests('declined');
}

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$confirmationTemplate = new Dwoo\Template\File('../layouts/requestList.tpl');
$footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');

$layoutTemplate = new Dwoo\Template\File('../layouts/template/_layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));


$confirmationPageData = new Dwoo\Data();
$confirmationPageData->assign('offerList', objectToArray($rows));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', 'Offer Requests');
$mainPage->assign('userType', $userType);
$mainPage->assign('username', strtoupper($username));
$mainPage->assign('avatar', $avatar);
$mainPage->assign('content', $core->get($confirmationTemplate, $confirmationPageData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));


echo $core->get($layoutTemplate, $mainPage);

?>