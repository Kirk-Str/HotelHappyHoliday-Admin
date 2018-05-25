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
			),
		)); 
		
			if($validation->passed()){

				$room = new Room();

				$image = $_FILES['room-image']['tmp_name'];
				$imgContent = base64_encode(file_get_contents($image));
				
				try{

					if(Input::get('type') == "add")
					{

						$room->create(array(
							'room_name' => Input::get('room_name'),
							'thumbnail' => $imgContent, 
							'total_room' => Input::get('total_room'),
                            'occupancy' => Input::get('occupancy'),
                            'size' => Input::get('size'),
                            'rate' => Input::get('rate'),
                            'caption' => Input::get('caption'),
                            'description' => Input::get('description')
						));
					}
					else if(Input::get('type') == "edit")
					{

						$updateArray = '';
						if(empty($imgContent)){
							
							$updateArray = array(
								'room_name' => Input::get('room_name'),
								'total_room' => Input::get('total_room'),
								'occupancy' => Input::get('occupancy'),
								'size' => Input::get('size'),
								'rate' => Input::get('rate'),
								'caption' => Input::get('caption'),
								'description' => Input::get('description'));
						}
						else{

							$updateArray = array(
								'room_name' => Input::get('room_name'),
								'thumbnail' => $imgContent, 
								'total_room' => Input::get('total_room'),
								'occupancy' => Input::get('occupancy'),
								'size' => Input::get('size'),
								'rate' => Input::get('rate'),
								'caption' => Input::get('caption'),
								'description' => Input::get('description'));

						}

						$room->update($updateArray, array('room_id' => Input::get('id')));
						
					}
					else if(Input::get('type') == "delete")
					{
						$room->delete(Input::get('id'));
					}

				} catch(Exception $e){
					die($e->getMessage());
				}

				Redirect::to(Config::get('application_path') . 'admin/roomTypes.php');

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	//}

}

?>