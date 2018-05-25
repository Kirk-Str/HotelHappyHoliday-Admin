<?php

require '../../vendor/autoload.php';

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();
		if(Input::get('type') == "add")
		{
			$validation = $validate->check($_POST,array(
				'room_id' => array(
					'required' => true,
				),
				"door_no" => array(
					'required' => true
				),
				'room_status' => array(
					'required' => true
				),
			)); 

		}else{

			$validation = $validate->check($_POST,array(
				'room_id' => array(
					'required' => true,
				),
				"door_no" => array(
					'required' => true
				),
			)); 

		}
		
		
		if($validation->passed()){

			$roomAllocation = new RoomAllocation();
			
			try{

				if(Input::get('type') == "add")
				{
					$roomAllocation->create(array(
						'room_id' => Input::get('room_id'),
						'door_no' => Input::get('door_no'), 
						'room_status' => Input::get('room_status'),
					));

				}
				else if(Input::get('type') == "edit")
				{
					
					$fields = array(
						'door_no' => Input::get('door_no'), 
						'room_status' => Input::get('room_status'));

					$where = array(
						array('room_no', '=', Input::get('id')),
						'AND',
						array('room_id', '=', Input::get('room_id')));

					$roomAllocation->update($fields, $where);
					
				}
				else if(Input::get('type') == "delete")
				{
					$where = array(
						array('room_no', '=', Input::get('id')),
						'AND',
						array('room_id', '=', Input::get('room_id')));

					$roomAllocation->delete($where);
				}

			} catch(Exception $e){
				die($e->getMessage());
			}

			Redirect::to(Config::get('application_path') . 'admin/roomsOverview.php');

		} else {
			foreach($validation->errors() as $error){
				echo $error, '<br>';
			}
		}
	//}

}

?>