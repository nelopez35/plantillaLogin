<?php 


class Db {
	
	protected static $connection;
	
	
	public function connect() {
		
		
		if(!isset(self::$connection)) {
			
			self::$connection = new mysqli('localhost',"root","","blog");
		}
	
		
		if(self::$connection === false) {
			
			return false;
		}
		return self::$connection;
	}
	
	
	public function query($query) {
		
		$connection = $this -> connect();
		
		
		$result = $connection -> query($query);
		
		return $result;
	}
	
	
	public function select($query) {
		$rows = array();
		$result = $this -> query($query);
		if($result === false) {
			return false;
		}
		while ($row = $result -> fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	
	
	public function error() {
		$connection = $this -> connect();
		return $connection -> error;
	}
	
	
	public function quote($value) {
		$connection = $this -> connect();
		return "'" . $connection -> real_escape_string($value) . "'";
	}
}