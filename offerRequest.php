<?php
// Include the main class, the rest will be automatically loaded
require 'core/init.php';



if($userType != 2 || empty($_GET) || empty(Input::get('type'))){

    clearMessage();
    
    Redirect::to('./message.php');

}

$request_type;
$pageTitle;
$row;
$buttonName;

$offerId = Input::get('offerId');
$id = Input::get('requestId');

if(!empty($offerId)){

    $offer = new Offer();

    if(!$offer->find($offerId)){

        clearMessage();
        
        Redirect::to('./message.php');

    }
    
}

if(!empty($id)){
    
        $request = new Request();
        $row = $request->find($id);
    
        if(!$row){
    
            clearMessage();
            
            Redirect::to('./message.php');
    
        }
        
    }
    

$contentData = new Dwoo\Data();

if(Input::get('type') == 'add')
{
    

    $pageTitle = "NEW REQUEST";
    $buttonName = "Request";

    $contentData->assign('id', '');
    $contentData->assign('offer_id', $offer->data()->offer_id);
    $contentData->assign('offer_caption', $offer->data()->caption);
    //$contentData->assign('description', $offer->data()->description);
    $contentData->assign('rate_per_guest', number_format($offer->data()->rate, 2));
    $contentData->assign('user_id', $userId);
    $contentData->assign('start_at', '');
    $contentData->assign('end_at', '');
    $contentData->assign('note', '');
    $contentData->assign('guests', '');
    $contentData->assign('disabled', '');
}
else
{
   
    if(Input::get('type') == 'delete')
    {
        $pageTitle = "ARE YOU SURE WANT TO CANCEL THIS REQUEST?";
        $buttonName = "Cancel";

    }else if(Input::get('type') == 'view')
    {
        $pageTitle = "VIEW";
        $buttonName = "Ok";
        $contentData->assign('disabled', 'disabled=disabled');

    }else
    {
        $pageTitle = "EDIT REQUEST";
        $buttonName = "Save";
    }

    $contentData->assign('id', $id);
    $contentData->assign('offer_id', $row->data()->offer_id);
    $contentData->assign('offer_caption', $row->data()->caption);
    $contentData->assign('user_id', $row->data()->user_id);
    //$contentData->assign('description', $row->data()->description);
    $contentData->assign('event_start_date', $row->data()->event_start_date);
    $contentData->assign('event_start_end', $row->data()->event_end_date);
    $contentData->assign('note', $row->data()->note);
    $contentData->assign('person', $row->data()->person);
    $contentData->assign('rate', $row->data()->rate);

}


$contentData->assign('request_type', Input::get('type'));
$contentData->assign('pageTitle', $pageTitle);
$contentData->assign('buttonName', $buttonName);

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$offerRequestTemplate = new Dwoo\Template\File('./layouts/offerRequest.tpl');
$footerTemplate = new Dwoo\Template\File('./layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('./layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('./layouts/template/_validationScripts.tpl');
$layoutTemplate = new Dwoo\Template\File('./layouts/template/_layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', $pageTitle);
$mainPage->assign('userType', $userType);
$mainPage->assign('username', strtoupper($username));
$mainPage->assign('avatar', $avatar);
$mainPage->assign('content', $core->get($offerRequestTemplate, $contentData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));


echo $core->get($layoutTemplate, $mainPage);

?>