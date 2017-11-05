<?php
class Reservation {

	private $_db,
			$_data;

	public function __construct($room = null) {
		$this->_db = DB::getInstance();
	}

	public function update($fields = array(),$id=null){

		if(!$this->_db->update('request',$id,$fields)){
			throw new Exception('There was a problem updating the record.');
		}
	}

    public function create($fields=array()){

        if (!$this->_db->insert('room_reservation', $fields)){
            throw new Exception('There was a problem creating the the record.');
        }
        
	}
	
	//action = 1, approved; action = 0, rejected;
	public function approveRequest($requestId, $action){

		if($action === 1){

			$request = $this->_id->get('request', array('id', '=', $requestId));
			
			$checkIn = $request['check_in'];
			$checkOut = $request['check_out'];
			$adults = $request['adults'];
			$children = $request['children'];
			$rate =  $request['rate'];

			$fields = array(
				'request_id' => $requestId,
				'adults' => $adults,
				'children' => $children,
			);

			$request = $this->_db->insert('room_reservation', $fields);

			if (!$this->_db->insert('request', $fields)){
				throw new Exception('There was a problem creating the the record.');
			}

		}else if($action === 0){
			
			$this->_id->update('request', $requestId, array('approval_status',  0));

		}
		
	}

	public function delete($id){

		if(!$this->_db->delete('request',array('id', '=', $id))){
			throw new Exception('There was a problem deleting the record.');
		}
		
	}
	
	public function checkIn($fields = array(),$id=null){

		if(!$this->_db->update('room_reservation',$id,$fields)){
			throw new Exception('There was a problem updating.');
		}
	}

	public function findRequest($roomId = null){

		if($room){

			$field = 'id';
			$data = $this ->_db->action('SELECT user.email, user.firstname, user.lastname, user.address_line_one, user.address_line_two, user.city, user.country, user.contact, request.id, request.requestTimestamp, request.adults, request.children, request.check_in, request.check_out, DATEDIFF(request.check_out, request.check_in) AS nightstays', request.total_amount, 'request INNER JOIN user ON (request.user_id = user.user_id) INNER JOIN room ON (request.room_id = room.room_id)', array($field, "=", $roomId));
			
			if($data->count()){
				$this->_data = $data->first();
				return $this->_data;
			}
		}

		return false;

	}

	public function findReservation($roomId = null){

		if($roomId){

			$field = 'id';
			$data = $this ->_db->action('SELECT user.user_id, user.email_id, user.firstname, user.lastname, user.address_line_one, user.address_line_two, user.city, user.country, user.contact_no, request.id, request.requestTimestamp, request.adults, request.children, request.check_in, request.check_out, DATEDIFF(request.check_out, request.check_in) AS nightstays, request.rate,room_reservation.adults AS actual_adults, room_reservation.children AS actual_children, room_reservation.check_in AS actual_check_in, room_reservation.check_out AS actual_check_out, room_reservation.total_amount,room_reservation.deposit_amount, room_reservation.balance_amount, room.room_id, room.room_name' , 'request INNER JOIN user ON (request.user_id = user.user_id) INNER JOIN room ON (request.room_id = room.room_id) INNER JOIN room_reservation ON (request.id = room_reservation.request_id)', array($field, "=", $roomId));
			
			if($data->count()){
				$this->_data = $data->first();
				return $this->_data;
			}
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

			$select = 'SELECT request.id, user.firstname, user.lastname, room.room_name, request.adults, request.children, request.check_in, request.check_out, DATEDIFF(request.check_out, request.check_in) AS nightstays';

			$table = 'request INNER JOIN user ON (request.user_id = user.user_id) INNER JOIN room ON (request.room_id = room.room_id) LEFT JOIN room_reservation ON (request.id = room_reservation.request_id)';

			if($type == null){

				$where = array(
					array('room_reservation.check_in',  'IS',  NULL),
					array('room_reservation.check_out',  'IS',  NUll));
				$data = $this ->_db->action($select, $table, $where);

			}
			else if($type === 'occupied'){

				$myNull = NULL;
				$where = array(
					array('room_reservation.check_in',  'IS NOT', NULL ),
					array('room_reservation.check_out',  'IS', NULL ));
				$data = $this ->_db->action($select, $table, $where);

			}else if($type === 'left'){

				$where = array(
					array('room_reservation.check_in',  'IS NOT',  NULL),
					array('room_reservation.check_out',  'IS NOT',  NUll));
				$data = $this ->_db->action($select, $table, $where);


			}else if($type === 'canceled'){

				$where = array('request.approval_status',  '=',  '0');
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

			$select = 'SELECT request.id, user.firstname, user.lastname, room.room_name, request.adults, request.children, request.check_in, request.check_out, DATEDIFF(request.check_out, request.check_in) AS nightstays';

			$table = 'request INNER JOIN user ON (request.user_id = user.user_id) INNER JOIN room ON (request.room_id = room.room_id) LEFT JOIN room_reservation ON (request.id = room_reservation.request_id)';

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