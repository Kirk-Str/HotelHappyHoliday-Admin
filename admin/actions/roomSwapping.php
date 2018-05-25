<?php

require '../../vendor/autoload.php';

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();

		$validation = $validate->check($_POST,array(
			'reservation_id' => array(
				'required' => true,
			),
			"new_room_no" => array(
				'required' => true
			),
		)); 

		if($validation->passed()){

			try{

				$roomAllocation = new RoomAllocation();
				$reservationId = Input::get('reservation_id');
				$newRoomNo = Input::get('new_room_no');
				$reservation = new Reservation();
			
				$reservation->find($reservationId);
				$roomId = $reservation->data()->room_id;
				$oldRoomNo = $reservation->data()->room_no;

				$reservation->update(array(
					'room_no' => $newRoomNo
				),array(
					'reservation_id' => $reservationId
				));
				
				$fields = array(
					'room_status' => 3);

				$where = array(
					array('room_no', '=', $oldRoomNo),
					'AND',
					array('room_id', '=',  $roomId));

				$roomAllocation->update($fields, $where);

				$fields = array(
					'room_status' => 2);

				$where = array(
					array('room_no', '=', $newRoomNo),
					'AND',
					array('room_id', '=',  $roomId));

				$roomAllocation->update($fields, $where);

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