<?php

// Include the main class, the rest will be automatically loaded
require __DIR__ . '../../core/init.php';

//Application Logic in Page
if($userType != 1 || empty($_GET)){

    clearMessage();
    
    Redirect::to('../message.php');

}

$guests = '';
$type = 0;
$checkActionButton = 'Ok';
$disableApprovalStatus = false;
$requestId = Input::get('requestId');

$request = new Request();

if($request->find(Input::get('requestId'))){

    $offerId = $request->data()->offer_id;
    $userId = $request->data()->user_id;
    $requestTimestamp = new DateTime($request->data()->request_timestamp);
    $startAt = new DateTime($request->data()->event_start_date);
    $endAt = new DateTime($request->data()->event_end_date);
    $rate = $request->data()->rate;
    $guests =  $request->data()->guests;
    $note =  $request->data()->note;
    $approvalStatus =  (is_null($request->data()->approval_status) ? 'New Request' : ($request->data()->approval_status == 1 ? 'Accepted' : 'Declined'));
    $approvalTimestamp =  new DateTime($request->data()->approval_timestamp);

    $user = new User();
    $user->find($userId);

    $firstname = $user->data()->firstname;
    $lastname = $user->data()->lastname;
    
    $offer = new Offer();
    $offer->find($offerId);

    $offerCaption = $offer->data()->caption;
    $offerDescription = $offer->data()->description;


    // Create the controller, it is reusable and can render multiple templates
    $core = new Dwoo\Core();

    //Load a template file, this is reusable if you want to render multiple times the same template with different data
    $requestTemplate = new Dwoo\Template\File('../layouts/request.tpl');
    $footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
    $scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
    $validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');

    $layoutTemplate = new Dwoo\Template\File('../layouts/template/_Layout.tpl');

    // Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
    $contentData = new Dwoo\Data();

    $contentData->assign('type', $type);
    $contentData->assign('requestId', $requestId);
    $contentData->assign('offerId', $offerId);
    $contentData->assign('userId', $userId);
    $contentData->assign('firstname', $firstname);
    $contentData->assign('lastname', $lastname);

    $contentData->assign('offerCaption', $offerCaption);
    $contentData->assign('offerName', $offerDescription);

    $contentData->assign('requestedTimestamp', $requestTimestamp->format('d-m-Y'));
    $contentData->assign('startAt', $startAt->format('d-m-Y'));
    $contentData->assign('endAt', $endAt->format('d-m-Y'));
    $contentData->assign('rate', number_format($rate, 2));
    $contentData->assign('guests', $guests);
    $contentData->assign('note', $note);
    $contentData->assign('approvalStatus', $approvalStatus);
    $contentData->assign('approvalTimestamp', is_null($request->data()->approval_status) ? '' : $approvalTimestamp->format('d-m-Y'));

    $contentData->assign('disabled', 'disabled=disabled');
    $contentData->assign('disabledApprovalStatus', $disableApprovalStatus);

    $validationScriptPage = new Dwoo\Data();
    $validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

    $mainPage = new Dwoo\Data();
    $mainPage->assign('pageTitle', 'Availability');
    $mainPage->assign('userType', $userType);
    $mainPage->assign('username', strtoupper($username));
    $mainPage->assign('avatar', $avatar);
    $mainPage->assign('content', $core->get($requestTemplate, $contentData));
    $mainPage->assign('footer', $core->get($footerTemplate));
    $mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));

    echo $core->get($layoutTemplate, $mainPage);

}else{

    Session::put('message_title', 'Ooops!');
    Session::put('message', 'Oops!');
    Session::put('sub_message', '404 or whatever, Page not available.');

    Redirect::to('../message.php');

}

?>