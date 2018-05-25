<?php
class DB{

	private static $_instance = null;
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_lastInsertId = 0,
			$_count = 0;

	private function __construct(){
		try{
			$this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public static function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function query($sql, $params = null){
		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)){
			$x = 1;
			if(count($params)){
				foreach($params as $param){
					$this->_query->bindValue($x, $param, PDO::PARAM_NULL);
					$x++;
				}
			}
			try{
				
				if($this->_query->execute()){
					$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
					$this->_count = $this->_query->rowCount();
					$this->_lastInsertId = $this->_pdo->lastInsertId();
				}else{
					$this->_count = 0;
					$this->_error = true;
				}
				
			}catch(PDOException $ex){
				var_dump($ex->getMessage());
			}
			
		}
		return $this;
	}

	public function action($action, $table, $where = null){
		
		$set = '';
		$param = array();
		$x = 1;
		$joinerAdded = false;

		if(isset($where)){

			if(is_array($where[0])){

				foreach($where as $args){

					if(!is_array($args)){

						$set .= ' ' . $args . ' ';

					}else{

						$set .= $args[0] . ' ' . $args[1] . ' ? ';
						
						array_push($param, $args[2]);
					}

				}

				$sql = "{$action} FROM {$table} WHERE $set";
				if(!$this->query($sql, $param)->error()){
					return $this;
				}

			}else{

				$operators = array('=', '>', '<', '>=', '<=', 'IS', 'IS NOT');
				$field = $where[0];
				$operator = $where[1];
				$value = $where[2];
				if(in_array($operator, $operators)){
					$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? ";
					if(!$this->query($sql, array($value))->error()){
						return $this;
					}
				}

			}

		}else{

			$sql = "{$action} FROM {$table}";
			if(!$this->query($sql)->error()){
				return $this;
			}

		}
		
		return false;
	}

	public function get($table, $where = null){

		if($where == null){
			return $this->action('SELECT *', $table);
		}else{
			return $this->action('SELECT *', $table, $where);
		}
		
	}

	public function delete($table, $where){
		return $this->action('DELETE', $table, $where);
	}

	public function insert($table, $fields = array()){
		$keys = array_keys($fields);
		$values = '';
		$x = 1;
		foreach($fields as $field){
			$values .= '?';
			if($x < count($fields)){
				$values .= ', ';
			}
			$x++;
		}
		$sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})" ;
		if(!$this->query($sql, $fields)->error()){
			$this->_lastInsertId = $this->_pdo->lastInsertId();
			return true;
		}
		return false;
	}

	public function update($table, $where, $fields){

		$x = 1;
		$set = '';
		$whereParam = '';
		$param = array();
		
		if(is_array($where[0])){

			foreach($fields as $name => $value){
				$set .= "{$name} = ?";
				if($x < count($fields)){
					$set .= ', ';
				}
				$x++;

				array_push($param, $value);

			}

			foreach($where as $args){

				if(!is_array($args)){

					$whereParam .= ' ' . $args . ' ';

				}else{

					$whereParam .= $args[0] . ' ' . $args[1] . ' ? ';
					
					array_push($param, $args[2]);

				}

			}

			$sql = "UPDATE {$table} SET {$set} WHERE {$whereParam}";

		}else{

			if(is_array($where)){

				$updateRecordField = key($where);
				$updateRecordValue = current($where);

			}else{

				$updateRecordField = 'id';
				$updateRecordValue = $id;

			}				

				foreach($fields as $name => $value){
					$set .= "{$name} = ?";
					if($x < count($fields)){
						$set .= ', ';
					}
					$x++;

					array_push($param, $value);

				}

				$sql = "UPDATE {$table} SET {$set} WHERE {$updateRecordField} = {$updateRecordValue}";

		}

		if(!$this->query($sql, $param)->error()){
			return true;
		}

		return false;

	}


	public function lastInsertId(){
		return $this->_lastInsertId;
	}
	public function results(){
		return $this->_results;
	}
	public function first(){
		return $this->results()[0];
	}
	public function error(){
		return $this->_error;
	}
	public function count(){
		return $this->_count;
	}
	public function transactBegin(){
		$this->_pdo->beginTransaction();
	}
	public function transactCommit(){
		$this->_pdo->commit();
	}
	public function transactRollback(){
		$this->_pdo->rollback();
	}
}
?>
