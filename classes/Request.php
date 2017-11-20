<?php
class Request {

	private $_db,
			$_data;

	public function __construct($request = null) {
		$this->_db = DB::getInstance();
	}

	public function update($fields = array(),$id=null){

		if(!$this->_db->update('offer_request',$id,$fields)){
			throw new Exception('There was a problem updating the record.');
		}
	}

	public function create($fields=array()){

		if (!$this->_db->insert('offer_request', $fields)){
			throw new Exception('There was a problem creating the the record.');
		}

		return $this->_db->lastInsertId();
		
	}

	public function delete($id){

		if(!$this->_db->delete('offer_request',array('id', '=', $id))){
			throw new Exception('There was a problem deleting the record.');
		}
		
	}

	public function find($request = null){

		if($request){
			$field = 'id';
			$data = $this ->_db->get('offer_request',array($field, "=", $request));

			if($data->count()){
				$this->_data = $data->first();
				return $this->_data;
			}
		}

		return false;

	}

	//listing offer requests from offer-request records based on following parameters
	//type = Null: all offer requests,
	//type = 'new': new offer requests
	//type = 'accepted': accepted offer lists
	//type = 'canceled': canceled offers
	public function listRequests($type = null){ 
		
		$where = null;

		$select = 'SELECT offer_request.id, offer_request.offer_id, offer_request.user_id, offer_request.request_timestamp, offer_request.event_start_date, offer_request.event_end_date, offer_request.guests, offer_request.rate, offer_request.approval_status, offer_request.approval_timestamp, offer.offer_name, offer.rate, user.firstname, user.lastname, user.email_id';

		$table = 'offer_request INNER JOIN offer ON offer_request.offer_id = offer.offer_id INNER JOIN user ON user.user_id = offer_request.user_id';

		if($type == null){

			$data = $this ->_db->action($select, $table);

		}
		else if($type === 'new'){

			$myNull = NULL;
			$where = array(
				array('offer_request.approval_status',  'IS', NULL));
			$data = $this ->_db->action($select, $table, $where);

		}else if($type === 'accepted'){

			$where = array(
				array('offer_request.approval_status',  '=',  1));
			$data = $this ->_db->action($select, $table, $where);


		}else if($type === 'declined'){

			$where = array('offer_request.approval_status',  '=',  0);
			$data = $this ->_db->action($select, $table, $where);

		}else{

			return false;
			
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