<?php
// Include the main class, the rest will be automatically loaded
require 'core/init.php';

//Application Logic in Page

if($userType == 1){
    Redirect::to(Config::get('application_path') . 'admin/index.php?dashboard=opt-filter-new');
}


//Application Logic in Page
$offer = new Offer();
$rows = $offer->selectAll();

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$homeTemplate = new Dwoo\Template\File('./layouts/home.tpl');
$exploreTemplate = new Dwoo\Template\File('./layouts/template/_explore.tpl');
$footerTemplate = new Dwoo\Template\File('./layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('./layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('./layouts/template/_validationScripts.tpl');
$layoutTemplate = new Dwoo\Template\File('./layouts/template/_layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$contentData = new Dwoo\Data();
$contentData->assign('explore', $core->get($exploreTemplate));
$contentData->assign('offersList', objectToArray($rows));
$contentData->assign('userType', $userType);

$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', 'Home');
$mainPage->assign('userType', $userType);
$mainPage->assign('username', strtoupper($username));
$mainPage->assign('avatar', $avatar);
$mainPage->assign('content', $core->get($homeTemplate, $contentData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));

echo $core->get($layoutTemplate, $mainPage);

?>