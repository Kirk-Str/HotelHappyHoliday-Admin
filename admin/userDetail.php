<?php
// Include the main class, the rest will be automatically loaded
require_once  $_SERVER['DOCUMENT_ROOT']  . '/core/init.php';

if($userType != 1 || empty($_GET) || empty(Input::get('type'))){
    
    clearMessage();
    Redirect::to('../message.php');

}

$user = new User();

$id = Input::get('userId');

$row = $user->find($id);

$request_type;
$pageTitle;
$row;
$buttonName;
$id = '';
$contentData = new Dwoo\Data();

$contentData->assign('email', '');
$contentData->assign('password', '');
$contentData->assign('firstname', '');
$contentData->assign('lastname', '');
$contentData->assign('address1', '');
$contentData->assign('address2', '');
$contentData->assign('city', '');
$contentData->assign('country', '');
$contentData->assign('contactNo', '');    

$contentData->assign('registered', '');
$contentData->assign('admin', '');
$contentData->assign('nonRegistered', '');
$contentData->assign('deactivated', '');


if(Input::get('type') == 'add')
{

    $pageTitle = "NEW USER";
    $buttonName = "Save";

}
else
{

    $pageTitle = "EDIT USER";
    $buttonName = "Save";

    if($row){

        $contentData->assign('email', $row->email_id);
        $contentData->assign('password', '12345678');
        $contentData->assign('firstname', $row->firstname);
        $contentData->assign('lastname', $row->lastname);
        $contentData->assign('address1', $row->address_line_one);
        $contentData->assign('address2', $row->address_line_two);
        $contentData->assign('city', $row->city);
        $contentData->assign('country', $row->country);
        $contentData->assign('contactNo', $row->contact_no);
        
        $role = $row->role;
        
        if($role == 2){
            $contentData->assign('registered', 'selected');
        }elseif($role == 1){
            $contentData->assign('admin', 'selected');
        }elseif($role == 3){
            $contentData->assign('nonRegistered', 'selected');
        }elseif($role == 0){
            $contentData->assign('deactivated', 'selected');
        }

    }
}

$contentData->assign('request_type', Input::get('type'));
$contentData->assign('pageTitle', $pageTitle);
$contentData->assign('buttonName', $buttonName);
$contentData->assign('userType', $userType);

//Application Logic in Page
// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$registerTemplate = new Dwoo\Template\File('../layouts/register.tpl');
$exploreTemplate = new Dwoo\Template\File('../layouts/template/_explore.tpl');
$footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');
$layoutTemplate = new Dwoo\Template\File('../layouts/template/_layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$contentData->assign('explore', $core->get($exploreTemplate));


$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', 'User - ' . $pageTitle);
$mainPage->assign('userType', $userType);
$mainPage->assign('username', strtoupper($username));
$mainPage->assign('avatar', $avatar);
$mainPage->assign('content', $core->get($registerTemplate, $contentData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));

echo $core->get($layoutTemplate, $mainPage);

?>