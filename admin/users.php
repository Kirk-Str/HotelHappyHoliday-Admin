<?php
// Include the main class, the rest will be automatically loaded
require __DIR__ . '../../core/init.php';


//Application Logic in Page
if($userType != 1 || empty($_GET)){

    clearMessage();
    
    Redirect::to('../message.php');

}


$user = new User();
$row = '';

//listing records based on following parameters
//type = Null: all users,
//type = 'admin': only admin users
//type = 'registered': registered users
//type = 'non-registered': non-registered users
//type = 'deactivated': deactivated users
    
if(Input::get("type") === "opt-filter-all"){
    $rows = $user->listUsers();
}elseif(Input::get("type") === "opt-filter-admin-user"){
    $rows = $user->listUsers('admin');
}elseif(Input::get("type") === "opt-filter-registered-user"){
    $rows = $user->listUsers('registered');
}elseif(Input::get("type") === "opt-filter-non-registered-user"){
    $rows = $user->listUsers('non-registered');
}elseif(Input::get("type") === "opt-filter-deactivated-user"){
    $rows = $user->listUsers('deactivated');
}

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$confirmationTemplate = new Dwoo\Template\File('../layouts/users.tpl');
$footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');

$layoutTemplate = new Dwoo\Template\File('../layouts/template/_Layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$confirmationPageData = new Dwoo\Data();
$confirmationPageData->assign('usersList', objectToArray($rows));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', 'Users');
$mainPage->assign('userType', $userType);
$mainPage->assign('username', strtoupper($username));
$mainPage->assign('avatar', $avatar);
$mainPage->assign('content', $core->get($confirmationTemplate, $confirmationPageData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));


echo $core->get($layoutTemplate, $mainPage);

?>