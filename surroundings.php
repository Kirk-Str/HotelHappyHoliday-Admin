<?php
// Include the main class, the rest will be automatically loaded
require __DIR__ . '../core/init.php';

if($userType == 1){
    Redirect::to(Config::get('application_path') . 'admin/index.php');
}


//Application Logic in Page
// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$surroundingsTemplate = new Dwoo\Template\File('./layouts/surroundings.tpl');
$exploreTemplate = new Dwoo\Template\File('./layouts/template/_explore.tpl');
$footerTemplate = new Dwoo\Template\File('./layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('./layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('./layouts/template/_validationScripts.tpl');
$layoutTemplate = new Dwoo\Template\File('./layouts/template/_Layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$explorePage = new Dwoo\Data();
$explorePage->assign('explore', $core->get($exploreTemplate));

$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', 'Surroundings');
$mainPage->assign('userType', $userType);
$mainPage->assign('username', strtoupper($username));
$mainPage->assign('content', $core->get($surroundingsTemplate, $explorePage));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));


echo $core->get($layoutTemplate, $mainPage);

?>