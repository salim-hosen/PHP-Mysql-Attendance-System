<?php include "inc/header.php";?>
<?php 
	include "classes/Student.php";
	$stu = new Student();
	
	date_default_timezone_set("Asia/Dhaka");
	$curDate = date('d-m-Y');
?>
<div id="alrt" style="display: none;" class="alert alert-danger"><strong>Error!</strong> Student Roll Missing</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<a href="add.php" class="btn btn-success">Add Student</a>
			<a href="view.php" class="btn btn-info pull-right">View All</a>
		</h2>
	</div>
	<div class="panel-body">
		<div class="text-center"  style="font-size: 20px;margin: 10px 0px;">
			<strong>Date: </strong><?php echo $curDate;?>
		</div>
		<?php
			
			error_reporting(0);
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$attend = $_POST['atnd'];
				$res = $stu->insertAttendance($curDate,$attend);
				echo $res;
			}
		?>
		<form id="myForm" action="" method="post">
			<table class="table table-stripped">
				<tr>
					<th width="25%">Serial</th>
					<th width="25%">Student Name</th>
					<th width="25%">Student Roll</th>
					<th width="25%">Attendance</th>
				</tr>
				<?php
					$getStudents = $stu->getStudents();
					if($getStudents){
						$i = 1;
						while($students = $getStudents->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $i++;?></td>
					<td><?php echo $students['stuName'];?></td>
					<td><?php echo $students['stuRoll'];?></td>
					<td>
						<input type="radio" name="atnd[<?php echo $students['stuRoll'];?>]" value="present"> P
						<input type="radio" name="atnd[<?php echo $students['stuRoll'];?>]" value="absent"> A
					</td>
				</tr>
				<?php
						}
					}
				?>
				<tr>
					<td colspan='4'>
						<input type="submit" class="btn btn-primary" value="Submit"/>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php include "inc/footer.php";?>