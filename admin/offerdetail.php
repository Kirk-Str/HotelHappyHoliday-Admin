<?php
// Include the main class, the rest will be automatically loaded
require_once  $_SERVER['DOCUMENT_ROOT']  . '/core/init.php';

if($userType != 1 || empty($_GET) || empty(Input::get('type'))){

    clearMessage();
    
    Redirect::to('../message.php');

}

$request_type;
$pageTitle;
$row;
$buttonName;

$id = Input::get('offerId');

if(!empty($id)){

    $offer = new Offer();
    $row = $offer->find($id);

    if(!$row){

        clearMessage();
        
        Redirect::to('../message.php');

    }
    
}

$contentData = new Dwoo\Data();

if(Input::get('type') == 'add')
{
    $pageTitle = "ADD NEW OFFER";
    $buttonName = "Save";

    $contentData->assign('id', '');
    $contentData->assign('offer_name', '');
    $contentData->assign('rate', '');
    $contentData->assign('caption', '');
    $contentData->assign('description', '');
}
else
{

  
    if(Input::get('type') == 'delete')
    {
        $pageTitle = "ARE YOU SURE WANT TO DELETE THIS OFFER?";
        $buttonName = "Delete";

    }else
    {
        $pageTitle = "EDIT OFFER";
        $buttonName = "Save";
    }


    $contentData->assign('id', $id);
    $contentData->assign('offer_name', $row->offer_name);
    $contentData->assign('rate', $row->rate);
    $contentData->assign('caption', $row->caption);
    $contentData->assign('description', $row->description);

}

$contentData->assign('request_type', Input::get('type'));
$contentData->assign('pageTitle', $pageTitle);
$contentData->assign('buttonName', $buttonName);

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$offerdetailTemplate = new Dwoo\Template\File('../layouts/offerdetail.tpl');
$footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');
$layoutTemplate = new Dwoo\Template\File('../layouts/template/_layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', $pageTitle);
$mainPage->assign('userType', $userType);
$mainPage->assign('username', strtoupper($username));
$mainPage->assign('avatar', $avatar);
$mainPage->assign('content', $core->get($offerdetailTemplate, $contentData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));


echo $core->get($layoutTemplate, $mainPage);

?>