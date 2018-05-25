<?php
//Include the main class, the rest will be automatically loaded
require $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

//Application Logic in Page

if($userType != 1){

    clearMessage();
    
    Redirect::to('../message.php');

}

$offer = new Offer();
$rows = $offer->selectAll();

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$offersTemplate = new Dwoo\Template\File('../layouts/offers.tpl');
$footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');
$layoutTemplate = new Dwoo\Template\File('../layouts/template/_layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$offersPageData = new Dwoo\Data();
$offersPageData->assign('offersList', objectToArray($rows));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', 'Offers');
$mainPage->assign('userType', $userType);
$mainPage->assign('username', strtoupper($username));
$mainPage->assign('avatar', $avatar);
$mainPage->assign('content', $core->get($offersTemplate, $offersPageData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));


echo $core->get($layoutTemplate, $mainPage);

?>