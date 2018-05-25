<?php
class RoomAllocation {

	private $_db,
			$_data;

	public function __construct($room = null) {
		$this->_db = DB::getInstance();
	}

	public function update($fields = array(), $id = array()){

		if(!$this->_db->update('room_allocation',$id,$fields)){
			throw new Exception('There was a problem updating the record.');
		}
	}

	public function create($fields=array()){

		if (!$this->_db->insert('room_allocation', $fields)){
			throw new Exception('There was a problem creating the the record.');
		}
		
	}

	public function delete($id = array()){

		if(!$this->_db->delete('room_allocation', $id)){
			throw new Exception('There was a problem deleting the record.');
		}
		
	}

	public function find($id, $roomId){

		if(!is_null($id) && !is_null($roomId)){

			$where = array(
				array('room_allocation.room_no', "=", $id),
				'AND',
				array('room_allocation.room_id', "=", $roomId)
			);

			$select = 'SELECT room_allocation.room_no, room_allocation.room_id, room_allocation.door_no, room_allocation.room_status, room.room_name';

			$table = 'room_allocation INNER JOIN room ON (room_allocation.room_id = room.room_id)';

			$data = $this ->_db->action($select, $table, $where);

			if($data->count()){
				$this->_data = $data->first();
				return $this->_data;
			}
		}

		return false;

	}

	public function selectAll(){

		$select = 'SELECT room_allocation.room_no, room_allocation.room_id, room_allocation.door_no, room_allocation.room_status, room.room_name as room_type, room_reservation.reservation_id';
	
		$table = 'room_allocation INNER JOIN room ON (room_allocation.room_id = room.room_id) LEFT JOIN (SELECT reservation_id, room_id, room_no FROM room_reservation WHERE room_reservation.check_in_actual IS NOT NULL AND room_reservation.check_out_actual IS NULL AND room_reservation.cancelled IS NULL ) AS room_reservation ON room_reservation.room_id = room_allocation.room_id AND room_reservation.room_no = room_allocation.room_no ORDER BY room_id, door_no';

		$data = $this ->_db->action($select, $table);

		if($data->count()){
			$this->_data = $data->results();
			return $this->_data;
		}

		return false;

	}

	//RoomId = Yes, RoomNo = No : Selects same type and vacant room list
	//RoomId = Yes, RoomNo = Yes : Selects same type and vacant rooms except explicite room mentioned in RoomNo
	public function availableRooms($roomId, $roomNo = null){

		$select = 'SELECT room_allocation.room_no, room_allocation.door_no';
	
		$table = 'room_allocation';

		$where = '';

		if(is_null($roomId)){

				$where = array(array('room_allocation.room_id', '=', $roomId),
				'AND',
				array('room_allocation.room_no', '<>', $roomNo),
				'AND',
				array('room_allocation.room_status', '=', 1)
			);
		}else{

			$where = array(
				array('room_allocation.room_id', '=', $roomId),
				'AND',
				array('room_allocation.room_status', '=', 1)
			);

		}
		

		$data = $this ->_db->action($select, $table, $where);

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