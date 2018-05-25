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

		$select = 'SELECT R.room_id, R.room_name, R.thumbnail, R.caption, R.occupancy, R.size, R.rate, R.view, COUNT(A.room_id) AS total_room, (COUNT(A.room_id) - COALESCE(RX.rooms, 0)) AS available_room';

		$table = 'room AS R LEFT JOIN room_allocation AS A USING (room_id) LEFT JOIN (SELECT room_id, COUNT(room_id) AS rooms FROM room_reservation AS RS WHERE ((RS.check_in >= \'' . $_check_in . '\' AND RS.check_in <= \'' . $_check_out . '\') OR (RS.check_in <= \'' . $_check_in . '\' AND RS.check_out >= \'' . $_check_out . '\') OR (RS.check_out >= \'' . $_check_in . '\' AND RS.check_out <= \'' . $_check_out . '\') OR (RS.check_in >= \'' . $_check_in . '\' AND RS.check_out <= \'' . $_check_out . '\')) AND (RS.check_in_actual IS NULL OR (RS.check_in_actual IS NOT NULL AND RS.check_out_actual IS NULL))) AS RX USING (room_id) GROUP BY room_id';

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