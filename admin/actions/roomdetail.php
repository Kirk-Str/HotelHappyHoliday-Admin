<?php

require '../../vendor/autoload.php';

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST,array(
			'room_name' => array(
				'required' => true,
				'max' => 50
			),
			"total_room" => array(
				'required' => true
			),
			'occupancy' => array(
				'required' => true
			),
			'size' => array(
				'max' => '20'
            ),
            'rate' => array(
				'required' => true
            ),
            'caption' => array(
				'required' => true,
				'max' => '100'
            ),
            'description' => array(
				'max' => '1000'
            )
		)); 
		
			if($validation->passed()){

				$room = new Room();

				try{

					if($_POST['type'] == "add")
					{

						$room->create(array(
							'room_name' => Input::get('room_name'),
							'total_room' => Input::get('total_room'),
                            'occupancy' => Input::get('occupancy'),
                            'size' => Input::get('size'),
                            'rate' => Input::get('rate'),
                            'caption' => Input::get('caption'),
                            'description' => Input::get('description')
						));
					}
					else if($_POST['type'] == "edit")
					{
						$room->update(array(
							'room_name' => Input::get('room_name'),
							'total_room' => Input::get('total_room'),
                            'occupancy' => Input::get('occupancy'),
                            'size' => Input::get('size'),
                            'rate' => Input::get('rate'),
                            'caption' => Input::get('caption'),
                            'description' => Input::get('description')
						), $_POST['id']);
					}
					else if($_POST['type'] == "delete")
					{
						$room->delete($_POST['id']);
					}

				} catch(Exception $e){
					die($e->getMessage());
				}

				Redirect::to(Config::get('application_path') . 'admin/rooms.php');

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	//}

}

?>