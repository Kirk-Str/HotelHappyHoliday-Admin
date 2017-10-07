<?php
class Request {

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

    public function request($fields=array()){

        if (!$this->_db->insert('request', $fields)){
            throw new Exception('There was a problem creating the the record.');
        }
        
    }

	public function create($fields=array()){

		if (!$this->_db->insert('request', $fields)){
			throw new Exception('There was a problem creating the the record.');
		}
		
	}

	public function delete($id){

		if(!$this->_db->delete('request',array('id', '=', $id))){
			throw new Exception('There was a problem deleting the record.');
		}
		
	}

	public function find($room = null){

		if($room){
			$field = 'id';
			$data = $this ->_db->get('request',array($field, "=", $room));

			if($data->count()){
				$this->_data = $data->first();
				return $this->_data;
			}
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

}