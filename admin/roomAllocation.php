<?php
// Include the main class, the rest will be automatically loaded
require_once  $_SERVER['DOCUMENT_ROOT']  . '/core/init.php';

if($userType != 1 || empty(Input::get('type'))){

    clearMessage();
    
    Redirect::to('../message.php');

}

$request_type;
$pageTitle;
$row;
$roomRows;
$buttonName;
$id = Input::get('roomNo');
$roomId = Input::get('roomId');

$contentData = new Dwoo\Data();

$contentData->assign('id', '');
$contentData->assign('door_id', '');
$contentData->assign('door_no', '');
$contentData->assign('room_status', '');
$contentData->assign('vacant', '');
$contentData->assign('occupied', '');
$contentData->assign('dirty', '');
$request_type = Input::get('type');

if(Input::get('type') == 'add')
{
    $pageTitle = "ADD NEW ROOM";
    $buttonName = "Save";

    $room = new Room();
    $roomRows = $room->selectAll();
    $contentData->assign('roomTypeList', objectToArray($roomRows));
}
else
{
    
    if (empty($id) || empty($roomId)){

        clearMessage();
            
        Redirect::to('../message.php');

    }else{

        $roomAllocation = new RoomAllocation();
        $row = $roomAllocation->find($id, $roomId);

        if(!$row){

            clearMessage();
            
            Redirect::to('../message.php');

        }

    }

       
    if(Input::get('type') == 'delete'){

        $reservation = new Reservation();
        $reservation->listRequestExist($id);

        if(intval($reservation->data()->records) > 0){

            $pageTitle = "RECORD EXIST, CANNOT BE DELETED!";
            $buttonName = "Ok";
            $request_type = '';

        }else{

            $pageTitle = "ARE YOU SURE WANT TO DELETE THIS ROOM?";
            $buttonName = "Delete";

        }     

    }else{

        $pageTitle = "EDIT ROOM";
        $buttonName = "Save";
    }

    $contentData->assign('id', $id);
    $contentData->assign('room_id', $row->room_id);
    $contentData->assign('room_name', $row->room_name);
    $contentData->assign('door_no', $row->door_no);

    $roomStatus = $row->room_status;

    if($roomStatus == 1){
        $contentData->assign('vacant', 'selected');
    }elseif($roomStatus == 2){
        $contentData->assign('occupied', 'selected');
    }elseif($roomStatus == 3){
        $contentData->assign('dirty', 'selected');
    }

}

$contentData->assign('request_type', $request_type);
$contentData->assign('pageTitle', $pageTitle);
$contentData->assign('buttonName', $buttonName);

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$roomdetailTemplate = new Dwoo\Template\File('../layouts/roomAllocation.tpl');
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
$mainPage->assign('content', $core->get($roomdetailTemplate, $contentData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));


echo $core->get($layoutTemplate, $mainPage);

?>