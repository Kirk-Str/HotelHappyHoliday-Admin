<?php
class Offer {

	private $_db,
			$_data;

	public function __construct($offer = null) {
		$this->_db = DB::getInstance();
	}

	public function update($fields = array(),$id=null){

		if(!$this->_db->update('offer',$id,$fields)){
			throw new Exception('There was a problem updating the record.');
		}
	}

	public function create($fields=array()){

		if (!$this->_db->insert('offer', $fields)){
			throw new Exception('There was a problem creating the the record.');
		}
		
	}

	public function delete($id){

		if(!$this->_db->delete('offer',array('offer_id', '=', $id))){
			throw new Exception('There was a problem deleting the record.');
		}
		
	}

	public function find($offer){

		if(!is_null($offer)){
			$field = 'offer_id';
			$data = $this ->_db->get('offer',array($field, "=", $offer));

			if($data->count()){
				$this->_data = $data->first();
				return $this->_data;
			}
		}

		return false;

	}


	//List all offers from offer master
	public function selectAll(){
	
		$data = $this ->_db->get('offer');

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