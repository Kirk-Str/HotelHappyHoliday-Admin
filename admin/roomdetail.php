<?php
// Include the main class, the rest will be automatically loaded
require '..\vendor\autoload.php';

$request_type;
$pageTitle;
$row;
$buttonName;
$id = '';
$contentData = new Dwoo\Data();


if(isset($_GET['type']) && $_GET['type'] == 'add')
{
    $pageTitle = "ADD NEW ROOM";
    $buttonName = "Save";

    $contentData->assign('id', '');
    $contentData->assign('room_name', '');
    $contentData->assign('total_room', '');
    $contentData->assign('occupancy', '');
    $contentData->assign('size', '');
    $contentData->assign('rate', '');
    $contentData->assign('caption', '');
    $contentData->assign('description', '');
}
else
{

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
    }

    if(isset($_GET['type']) && $_GET['type'] == 'delete')
    {
        $pageTitle = "ARE YOU SURE WANT TO DELETE THIS ROOM?";
        $buttonName = "Delete";

    }else
    {
        $pageTitle = "EDIT ROOM";
        $buttonName = "Edit";
    }

    $room = new Room();
    $row = $room->find($id);

    $contentData->assign('id', $id);
    $contentData->assign('room_name', $row->room_name);
    $contentData->assign('total_room', $row->total_room);
    $contentData->assign('occupancy', $row->occupancy);
    $contentData->assign('size', $row->size);
    $contentData->assign('rate', $row->rate);
    $contentData->assign('caption', $row->caption);
    $contentData->assign('description', $row->description);

}

$contentData->assign('request_type', $_GET['type']);
$contentData->assign('pageTitle', $pageTitle);
$contentData->assign('buttonName', $buttonName);

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Load a template file, this is reusable if you want to render multiple times the same template with different data
$roomdetailTemplate = new Dwoo\Template\File('../layouts/roomdetail.tpl');
$footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
$scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
$validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');
$layoutTemplate = new Dwoo\Template\File('../layouts/template/_Layout.tpl');

// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
$validationScriptPage = new Dwoo\Data();
$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

$mainPage = new Dwoo\Data();
$mainPage->assign('pageTitle', $pageTitle);
$mainPage->assign('content', $core->get($roomdetailTemplate, $contentData));
$mainPage->assign('footer', $core->get($footerTemplate));
$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));


echo $core->get($layoutTemplate, $mainPage);

?>