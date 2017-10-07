<?php
// Include the main class, the rest will be automatically loaded
require  __DIR__ . './vendor/autoload.php';
// Create the controller, it is reusable and can render multiple templates


$messageTitle = Session::get('message_title');
$message = Session::get('message');
$subMessage = Session::get('sub_message');

$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$welcomePageTemplate = new Dwoo\Template\File('./layouts/message.tpl');
$exploreTemplate = new Dwoo\Template\File('./layouts/template/_explore.tpl');
$footerTemplate = new Dwoo\Template\File('./layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('./layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('./layouts/template/_validationScripts.tpl');
$layoutTemplate = new Dwoo\Template\File('./layouts/template/_Layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$explorePage = new Dwoo\Data();
$explorePage->assign('explore', $core->get($exploreTemplate));
$explorePage->assign('message', $message);
$explorePage->assign('subMessage', $subMessage);

$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', $messageTitle);
$mainPage->assign('content', $core->get($welcomePageTemplate, $explorePage));
$mainPage->assign('footer', '');
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));

echo $core->get($layoutTemplate, $mainPage);

?>