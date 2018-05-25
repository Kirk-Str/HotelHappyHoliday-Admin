<?php
class Room {

	private $_db,
			$_data;

	public function __construct($room = null) {
		$this->_db = DB::getInstance();
	}

	public function update($fields = array(),$id=null){

		if(!$this->_db->update('room',$id,$fields)){
			throw new Exception('There was a problem updating the record.');
		}
	}

	public function create($fields=array()){

		if (!$this->_db->insert('room', $fields)){
			throw new Exception('There was a problem creating the the record.');
		}
		
	}

	public function delete($id){

		if(!$this->_db->delete('room',array('room_id', '=', $id))){
			throw new Exception('There was a problem deleting the record.');
		}
		
	}

	public function find($room){

		if(!is_null($room)){
			$field = 'room_id';
			$data = $this ->_db->get('room',array($field, "=", $room));

			if($data->count()){
				$this->_data = $data->first();
				return $this->_data;
			}
		}

		return false;

	}

	public function selectAll(){
	
			$data = $this ->_db->get('room');

			if($data->count()){
				$this->_data = $data->results();
				return $this->_data;
			}

		return false;

	}


	public function getAvailableRooms($checkIn, $checkOut, $occupancy){
		
		$_check_in = (new DateTime($checkIn))->format('Y-m-d');
		$_check_out = (new DateTime($checkOut))->format('Y-m-d');
		$_occupancy = $occupancy;

		$where = null;

		// $select = 'SELECT R.room_id, R.room_name, R.thumbnail, R.caption, R.occupancy, R.total_room, COALESCE(R.total_room - B.Occupied, R.total_room) AS available, R.size, R.rate, R.view';
<<<<<<< HEAD
		
		// $table = 'room AS R LEFT JOIN (SELECT COUNT(room_id) AS Occupied, room_id FROM room_reservation WHERE (room_reservation.check_in  >= \'' . $_check_in . '\' AND room_reservation.check_in <= \'' . $_check_out . '\') OR (room_reservation.check_in <= \'' . $_check_out . '\' AND room_reservation.check_out >= \'' . $_check_out . '\') OR (room_reservation.check_in >= \'' . $_check_in . '\' AND room_reservation.check_out <= \'' . $_check_out . '\') GROUP BY room_id) AS B ON (R.room_id = B.room_id) WHERE R.occupancy >= ' . $_occupancy . ' AND COALESCE(R.total_room - B.Occupied, R.total_room) > 0' ;

		// SELECT R.room_id, R.room_name, R.thumbnail, R.caption, R.occupancy, R.size, R.rate, R.view, COUNT(A.room_id) AS total_room, (COUNT(A.room_id) - COALESCE(RX.rooms, 0)) AS available_room
		// FROM room AS R LEFT JOIN room_allocation AS A USING (room_id) 
		// LEFT JOIN (SELECT room_id, COUNT(room_id) AS rooms FROM room_reservation AS RS WHERE(
		// (RS.check_in >= '2018-04-24' AND RS.check_in <= '2018-04-26') OR
		// (RS.check_in <= '2018-04-24' AND RS.check_out >= '2018-04-26') OR
		// (RS.check_out >= '2018-04-24' AND RS.check_out <= '2018-04-26') OR
		// (RS.check_in >= '2018-04-24' AND RS.check_out <= '2018-04-26')) AND
		// (RS.check_in_actual IS NULL OR (RS.check_in_actual IS NOT NULL AND RS.check_out_actual IS NULL))) AS RX USING (room_id)
		// GROUP BY room_id

		$select = 'SELECT R.room_id, R.room_name, R.thumbnail, R.caption, R.occupancy, R.size, R.rate, R.view, COUNT(A.room_id) AS total_room, (COUNT(A.room_id) - COALESCE(RX.rooms, 0)) AS available_room';

		$table = 'FROM room AS R LEFT JOIN room_allocation AS A USING (room_id) 
		LEFT JOIN (SELECT room_id, COUNT(room_id) AS rooms FROM room_reservation AS RS WHERE(
		(RS.check_in >= '2018-04-24' AND RS.check_in <= '2018-04-26') OR
		(RS.check_in <= '2018-04-24' AND RS.check_out >= '2018-04-26') OR
		(RS.check_out >= '2018-04-24' AND RS.check_out <= '2018-04-26') OR
		(RS.check_in >= '2018-04-24' AND RS.check_out <= '2018-04-26')) AND
		(RS.check_in_actual IS NULL OR (RS.check_in_actual IS NOT NULL AND RS.check_out_actual IS NULL))) AS RX USING (room_id)
		GROUP BY room_id';

		$select = 'SELECT R.room_id, R.room_name, R.thumbnail, R.caption, R.occupancy, COUNT(RX.room_id) AS TotalRoom, COUNT(room_id) - IFNULL(RX.Count, 0) AS AvaiableRoom, R.size, R.rate, R.view';
		
		$table = 'FROM room_allocation AS A INNER JOIN room AS R USING (room_id) LEFT JOIN (SELECT room_id, COUNT(room_id) AS Count FROM room_reservation WHERE (room_reservation.check_in  >= \'' . $_check_in . '\' AND room_reservation.check_in <= \'' . $_check_out . '\') OR (room_reservation.check_in <= \'' . $_check_out . '\' AND room_reservation.check_out >= \'' . $_check_out . '\') OR (room_reservation.check_in >= \'' . $_check_in . '\' AND room_reservation.check_out <= \'' . $_check_out . '\')) AS RX USING (room_id) GROUP BY room_id';
=======
		
		// $table = 'room AS R LEFT JOIN (SELECT COUNT(room_id) AS Occupied, room_id FROM room_reservation WHERE (room_reservation.check_in  >= \'' . $_check_in . '\' AND room_reservation.check_in <= \'' . $_check_out . '\') OR (room_reservation.check_in <= \'' . $_check_out . '\' AND room_reservation.check_out >= \'' . $_check_out . '\') OR (room_reservation.check_in >= \'' . $_check_in . '\' AND room_reservation.check_out <= \'' . $_check_out . '\') GROUP BY room_id) AS B ON (R.room_id = B.room_id) WHERE R.occupancy >= ' . $_occupancy . ' AND COALESCE(R.total_room - B.Occupied, R.total_room) > 0' ;

		$select = 'SELECT R.room_id, R.room_name, R.thumbnail, R.caption, R.occupancy, COUNT(RX.room_id) AS TotalRoom, COUNT(room_id) - IFNULL(RX.Count, 0) AS AvaiableRoom, R.size, R.rate, R.view ';
		
		$table = 'FROM room_allocation AS A INNER JOIN R room USING (room_id) LEFT JOIN (SELECT room_id, COUNT(room_id) AS Count FROM room_reservation WHERE (room_reservation.check_in  >= \'' . $_check_in . '\' AND room_reservation.check_in <= \'' . $_check_out . '\') OR (room_reservation.check_in <= \'' . $_check_out . '\' AND room_reservation.check_out >= \'' . $_check_out . '\') OR (room_reservation.check_in >= \'' .  $_check_in  . '\' AND room_reservation.check_out <= \'' . $_check_out . '\')) AS RX USING (room_id) GROUP BY room_id';
>>>>>>> 8c5553416c8c6287a254ab5712cd3d39eecd13b2

		$data = $this ->_db->action($select, $table);

		if($data->count()){
			$this->_data = $data->results();
			return $this->_data;
		}

		return false;
	
	}

	public function data(){
		return $this->_data;
	}

	public function transactBegin(){
		$this->_db->transactBegin();
	}

	public function transactCommit(){
		$this->_db->transactCommit();
	}

	public function transactRollback(){
		$this->_db->transactRollback();
	}

}