<?php
	include "lib/Database.php";
	
	class Student{
		private $db;
		
		public function __construct(){
			$this->db = new Database();
		}
		
		public function getStudents(){
			$query = "select * from tbl_student order by stuRoll asc";
			$res = $this->db->select($query);
			return $res;
		}
		
		public function addStudent($data){
			$name = mysqli_real_escape_string($this->db->link,$data['name']);
			$roll = mysqli_real_escape_string($this->db->link,$data['roll']);
			
			$sq = "select stuRoll from tbl_student where stuRoll = '$roll'";
			
			if(empty($name) || empty($roll)){
				echo "<p class='alert alert-danger'>Name or Roll should not be empty.</p>";
				exit();
			}else if($this->db->select($sq)){
				echo "<p class='alert alert-danger'>Roll Already Exists.</p>";
				exit();
			}else{
				$stuQuery = "insert into tbl_student(stuName,stuRoll)values('$name','$roll')";
				$res = $this->db->insert($stuQuery);
				if($res){
					echo "<p class='alert alert-success'>Student Added Successfully.</p>";
					exit();
				}else{
					echo "<p class='alert alert-danger'>Couldn't Add. Something Wrong!</p>";
					exit();
				}
			}
		}
		
		public function insertAttendance($curDate,$attend = array()){
			$curDate = strtotime($curDate);
			$curDate = date("Y-m-d",$curDate);
			
			$sq = "select * from tbl_attendance where att_time = '$curDate'";
			$sqRes = $this->db->select($sq);
			if($sqRes){
				return "<p class='alert alert-danger'>Attendance Already Taken for This Date.</p>";
			}
			
			foreach($attend as $key => $value){
				if($value == 'present'){
					$query = "insert into tbl_attendance(stuRoll,attend,att_time)values('$key','$value',now())";
					$res = $this->db->insert($query);
				}else if($value == 'absent'){
					$query = "insert into tbl_attendance(stuRoll,attend,att_time)values('$key','$value',now())";
					$res = $this->db->insert($query);
				}
			}
			
			if($res){
				return "<p class='alert alert-success'>Attendance Taken Successfully.</p>";
			}else{
				return "<p class='alert alert-danger'>Attendance Couldn't Take.</p>";
			}
		}
		
		public function getAttendDate(){
			$query = "select distinct att_time from tbl_attendance";
			$res = $this->db->select($query);
			return $res;
		}
		
		public function getAtndByDate($vwId){
			$query = "select tbl_student.stuName, tbl_attendance.* from tbl_student inner join tbl_attendance on tbl_student.stuRoll = tbl_attendance.stuRoll where att_time = '$vwId'";
			$res = $this->db->select($query);
			return $res;
		}
		
		public function updateAttendance($vwDate,$attend = array()){
		
			foreach($attend as $key => $value){
				if($value == 'present'){
					$query = "update tbl_attendance set attend = '$value' where stuRoll = '$key' and att_time = '$vwDate'";
					$res = $this->db->update($query);
				}else if($value == 'absent'){
					$query = "update tbl_attendance set attend = '$value' where stuRoll = '$key' and att_time = '$vwDate'";
					$res = $this->db->update($query);
				}
			}
			
			if($res){
				return "<p class='alert alert-success'>Attendance Updated Successfully.</p>";
			}else{
				return "<p class='alert alert-danger'>Attendance Couldn't Update.</p>";
			}
		}
	}
?>