<?php
// Include the main class, the rest will be automatically loaded
require 'core/init.php';

// Create the controller, it is reusable and can render multiple templates

//Application Logic in Page

$titleDefault = 'Page not found!';
$messageDefault = 'Oops, Page not found!';
$subMessageDefault = 'There seems to be a problem :(';
$gotoPageDefault = '<a href=' . Config::get('application_path') . 'index.php' . '>Go to Homepage</a>';

$messageTitle = Session::exists('message_title') ? Session::get('message_title') : $titleDefault;
$message = Session::exists('message') ? Session::get('message') : $messageDefault;
$subMessage = Session::exists('sub_message') ? Session::get('sub_message') : $subMessageDefault;
$gotoPage = Session::exists('goto_page') ? Session::get('goto_page') : $gotoPageDefault;

$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$welcomePageTemplate = new Dwoo\Template\File('./layouts/message.tpl');
$exploreTemplate = new Dwoo\Template\File('./layouts/template/_explore.tpl');
$footerTemplate = new Dwoo\Template\File('./layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('./layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('./layouts/template/_validationScripts.tpl');
$layoutTemplate = new Dwoo\Template\File('./layouts/template/_layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$explorePage = new Dwoo\Data();
$explorePage->assign('explore', $core->get($exploreTemplate));
$explorePage->assign('message', $message);
$explorePage->assign('subMessage', $subMessage);
$explorePage->assign('gotoPage', $gotoPage);

$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', $messageTitle);
$mainPage->assign('username', strtoupper($username));
$mainPage->assign('avatar', $avatar);
$mainPage->assign('content', $core->get($welcomePageTemplate, $explorePage));
$mainPage->assign('footer', '');
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));

echo $core->get($layoutTemplate, $mainPage);

?>