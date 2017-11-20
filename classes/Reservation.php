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
			array('user.user_id',  '=',  $userId));
		}else{
			$where = array('reservation_id',  '=',  $reservationId);
		}

		$data = $this ->_db->action('SELECT user.user_id, user.email_id, user.firstname, user.lastname, user.address_line_one, user.address_line_two, user.city, user.country, user.contact_no, room_reservation.reservation_id, room_reservation.requestTimestamp, room_reservation.adults, room_reservation.children, room_reservation.check_in, room_reservation.check_out, DATEDIFF(room_reservation.check_out, room_reservation.check_in) AS nightstays, room_reservation.rate,room_reservation.adults_actual, room_reservation.children_actual, room_reservation.check_in_actual, room_reservation.check_out_actual, room_reservation.total_amount,room_reservation.deposit_amount, room_reservation.balance_amount, room.room_id, room.room_name' , 'room_reservation INNER JOIN user ON (room_reservation.user_id = user.user_id) INNER JOIN room ON (room_reservation.room_id = room.room_id)', $where);
		
		if($data->count()){
			$this->_data = $data->first();
			return $this->_data;
		}

		return false;

	}

	public function findAvailableRoom($roomId, $stardDate, $endDate){

		

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
					array('room_reservation.check_out_actual',  'IS',  NUll));
				$data = $this ->_db->action($select, $table, $where);

			}
			else if($type === 'occupied'){

				$myNull = NULL;
				$where = array(
					array('room_reservation.check_in_actual',  'IS NOT', NULL ),
					array('room_reservation.check_out_actual',  'IS', NULL ));
				$data = $this ->_db->action($select, $table, $where);

			}else if($type === 'left'){

				$where = array(
					array('room_reservation.check_in_actual',  'IS NOT',  NULL),
					array('room_reservation.check_out_actual',  'IS NOT',  NUll));
				$data = $this ->_db->action($select, $table, $where);


			}else if($type === 'canceled'){

				$where = array('room_reservation.cancel',  '=',  '1');
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

			$table = 'room_reservation INNER JOIN user ON (room_reservation.user_id = user.user_id) INNER JOIN room ON (request.room_id = room.room_id)';

			if($type === 'new'){

				$where = array(
					array('user.user_id',  '=',  $userId),
					array('room_reservation.check_in',  'IS',  NULL),
					array('room_reservation.check_out',  'IS',  NUll));
				$data = $this ->_db->action($select, $table, $where);

			}
			else{

				$myNull = NULL;
				$where = array(
					array('user.user_id',  '=',  $userId),
					array('room_reservation.check_in',  'IS NOT', NULL ),
					array('room_reservation.check_out',  'IS NOT', NULL ));
				$data = $this ->_db->action($select, $table, $where);

			}
			
			if($data->count()){
				$this->_data = $data->results();
				return $this->_data;
			}

		return false;

	}

	public function selectAll(){
	
			$data = $this ->_db->get('request');

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