<?php
	include "config/config.php";
	
	class Database{
		private $dbname = DB_NAME;
		private $dbhost = DB_HOST;
		private $dbuser = DB_USER;
		private $dbpass = DB_PASS;
		
		public $link;
		
		public function __construct(){
			$this->link = $this->getCon();
		}
		
		public function getCon(){
			$res = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
			if($res != false){
				return $res;
			}else{
				echo "Error in Connection.".$this->link->connect_error;
				return false;
			}
		} 
		
		public function insert($query){
			$res = $this->link->query($query) or die($this->link->error.__LINE__);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		
		public function update($query){
			$res = $this->link->query($query) or die($this->link->error.__LINE__);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		
		public function del($query){
			$res = $this->link->query($query) or die($this->link->error.__LINE__);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
		
		public function select($query){
			$res = $this->link->query($query) or die($this->link->error.__LINE__);
			if(mysqli_num_rows($res) > 0){
				return $res;
			}else{
				return false;
			}
		}
	}
?>