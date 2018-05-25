<?php
class Reservation {

	private $_db,
			$_data;

	public function __construct($room = null) {
		$this->_db = DB::getInstance();
	}


    public function create($fields=array()){

        if (!$this->_db->insert('room_reservation', $fields)){
            throw new Exception('There was a problem creating the the record.');
        }
		
		return $this->_db->lastInsertId();
		
	}

	public function update($fields = array(),$id=null){
		
				if(!$this->_db->update('room_reservation',$id,$fields)){
					throw new Exception('There was a problem updating the record.');
				}
			}

			
	public function delete($id){

		if(!$this->_db->delete('room_reservation',array('id', '=', $id))){
			throw new Exception('There was a problem deleting the record.');
		}
		
	}

	public function find($reservationId, $userId = null){

		$where = 'id';

		if($userId){
			$where = array(
			array('reservation_id',  '=',  $reservationId),
			'AND',
			array('user.user_id',  '=',  $userId));
		}else{
			$where = array('reservation_id',  '=',  $reservationId);
		}

		$data = $this ->_db->action('SELECT user.user_id, user.email_id, user.firstname, user.lastname, user.address_line_one, user.address_line_two, user.city,user.country, user.contact_no, room_reservation.reservation_id, room_reservation.requestTimestamp, room_reservation.adults, room_reservation.children, room_reservation.check_in, room_reservation.check_out, DATEDIFF(room_reservation.check_out, room_reservation.check_in) AS nightstays, room_reservation.rate,room_reservation.adults_actual, room_reservation.children_actual, room_reservation.check_in_actual, room_reservation.check_out_actual, room_reservation.total_amount,room_reservation.deposit_amount, room_reservation.additional_amount, room_reservation.balance_amount, room_reservation.cancelled, room_reservation.room_id, room.room_name, room_reservation.room_no,room_allocation.door_no' , 'room_reservation INNER JOIN user ON (room_reservation.user_id = user.user_id) LEFT JOIN room_allocation ON (room_allocation.room_id = room_reservation.room_id AND room_allocation.room_no = room_reservation.room_no) INNER JOIN room ON (room_reservation.room_id = room.room_id)', $where);
		
		if($data->count()){
			$this->_data = $data->first();
			return $this->_data;
		}

		return false;

	}

	public function listRequestExist($roomNo){

		$select = 'SELECT COUNT(room_reservation.reservation_id) as records';

		$table = 'room_reservation';

		$where = array('room_reservation.room_no',  '=',  $roomNo);

		$data = $this ->_db->action($select, $table, $where);

		if($data->count()){
			$this->_data = $data->first();
			return $this->_data;
		}

		return false;

	}

	//listing records based on following parameters
	//type = Null: not checked-in yet,
	//type = 'occupied': checked in
	//type = 'left': left the room
	//type = 'canceled': canceled or didn't show up

	public function listRequests($type = null){
	
			$where = null;

			$select = 'SELECT room_reservation.reservation_id, user.firstname, user.lastname, room.room_name, room_reservation.adults, room_reservation.children, room_reservation.check_in, room_reservation.check_out, DATEDIFF(room_reservation.check_out, room_reservation.check_in) AS nightstays';

			$table = 'room_reservation INNER JOIN user ON (room_reservation.user_id = user.user_id) INNER JOIN room ON (room_reservation.room_id = room.room_id)';

			if($type == null){

				$where = array(
					array('room_reservation.check_in_actual',  'IS',  NULL),
					'AND',
					array('room_reservation.check_out_actual',  'IS',  NUll),
					'AND',
					array('room_reservation.cancelled',  'IS',  NULL));
				$data = $this ->_db->action($select, $table, $where);

			}
			else if($type === 'occupied'){

				$myNull = NULL;
				$where = array(
					array('room_reservation.check_in_actual',  'IS NOT', NULL ),
					'AND',
					array('room_reservation.check_out_actual',  'IS', NULL ),
					'AND',
					array('room_reservation.cancelled',  'IS',  NULL));
				$data = $this ->_db->action($select, $table, $where);

			}else if($type === 'left'){

				$where = array(
					array('room_reservation.check_in_actual',  'IS NOT',  NULL),
					'AND',
					array('room_reservation.check_out_actual',  'IS NOT',  NUll),
					'AND',
					array('room_reservation.cancelled',  'IS',  NULL));
				$data = $this ->_db->action($select, $table, $where);


			}else if($type === 'canceled'){

				$where = array('room_reservation.cancelled',  '=',  TRUE);
				$data = $this ->_db->action($select, $table, $where);

			}
			
			if($data->count()){
				$this->_data = $data->results();
				return $this->_data;
			}

		return false;

	}

	
	//listing records based on following parameters
	//type = Null: all history,
	//type = 'new': new requests

	public function listMyRequests($userId, $type = null){
		
			$where = null;

			$select = 'SELECT room_reservation.reservation_id, user.firstname, user.lastname, room.room_name, room_reservation.adults, room_reservation.children, room_reservation.check_in, room_reservation.check_out, DATEDIFF(room_reservation.check_out, room_reservation.check_in) AS nightstays';

			$table = 'room_reservation INNER JOIN user ON (room_reservation.user_id = user.user_id) INNER JOIN room ON (room_reservation.room_id = room.room_id)';

			if($type === 'new'){

				$where = array(
					array('user.user_id',  '=',  $userId),
					'AND',
					array('room_reservation.check_in_actual',  'IS',  NULL),
					'AND',
					array('room_reservation.check_out_actual',  'IS',  NUll));
				$data = $this ->_db->action($select, $table, $where);

			}
			else{

				$myNull = NULL;
				$where = array(
					array('user.user_id',  '=',  $userId),
					'AND',
					array('room_reservation.check_in_actual',  'IS NOT', NULL ),
					'AND',
					array('room_reservation.check_out_actual',  'IS NOT', NULL ));
				$data = $this ->_db->action($select, $table, $where);

			}
			
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