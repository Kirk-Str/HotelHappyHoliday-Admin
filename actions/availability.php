<?php

// Include the main class, the rest will be automatically loaded
require_once  $_SERVER['DOCUMENT_ROOT']  . '/core/init.php';
//require '../../core/init.php';

if($userType == 1){
    Redirect::to(Config::get('application_path') . 'admin/index.php');
}

$check_in = "";
$check_out = "";
$adults = "";
$children = "";
$guests = "";

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST,array(
			'check_in_h' => array(
				'required' => true,
			),
			"check_out_h" => array(
				'required' => true,
			),
			'adults' => array(
				'required' => true,
			)
		)); 
		
			if($validation->passed()){

				$check_in = new DateTime(Input::get('check_in_h'));
				$check_out = new DateTime(Input::get('check_out_h'));
				$adults = Input::get('adults');
				$children = Input::get('children');
				$guests = sprintf("%s Adult(s) and %s Child(Children)", $adults, $children);

				$room = new Room();
				$rows = $room->getAvailableRooms($check_in->format('d-m-Y'), $check_out->format('d-m-Y'), $adults);
				
				// Create the controller, it is reusable and can render multiple templates
				$core = new Dwoo\Core();
			
				// Load a template file, this is reusable if you want to render multiple times the same template with different data
				$availability = new Dwoo\Template\File('../layouts/availability.tpl');
				$footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
				$scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
				$validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');
				$layoutTemplate = new Dwoo\Template\File('../layouts/template/_layout.tpl');
			
				// Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
				$confirmationData = new Dwoo\Data();
				$confirmationData->assign('checkIn', $check_in->format('d-m-Y'));
				$confirmationData->assign('checkOut', $check_out->format('d-m-Y'));
				$confirmationData->assign('adults', $adults);
				$confirmationData->assign('children', $children);
				$confirmationData->assign('guests', $guests);
				$confirmationData->assign('suitesList', objectToArray($rows));
			
				$validationScriptPage = new Dwoo\Data();
				$validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));
			
				$mainPage = new Dwoo\Data();
				$mainPage->assign('pageTitle', 'Availability');
				$mainPage->assign('userType', $userType);
				$mainPage->assign('username', strtoupper($username));
				$mainPage->assign('avatar', $avatar);
				$mainPage->assign('content', $core->get($availability, $confirmationData));
				$mainPage->assign('footer', $core->get($footerTemplate));
				$mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));
			
				echo $core->get($layoutTemplate, $mainPage);

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	//}

}

?>