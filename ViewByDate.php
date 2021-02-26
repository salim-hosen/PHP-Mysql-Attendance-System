<?php include "inc/header.php";?>
<?php 
	include "classes/Student.php";
	$stu = new Student();
	
	if(isset($_GET['vwId'])){
		$vwId = $_GET['vwId'];
	}
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<span>Update Attendance</span>
			<a href="view.php" class="btn btn-info pull-right">Back</a>
		</h2>
	</div>
		<div class="text-center"  style="font-size: 20px;margin: 10px 0px;">
			<strong>Date: </strong><?php echo date("d-m-Y",strtotime($vwId));?>
		</div>
	<div class="panel-body">
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$attend = $_POST['atnd'];
				$res = $stu->updateAttendance($vwId,$attend);
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
					$getAttn = $stu->getAtndByDate($vwId);
					if($getAttn){
						$i = 1;
						while($attn = $getAttn->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $i++;?></td>
					<td><?php echo $attn['stuName'];?></td>
					<td><?php echo $attn['stuRoll'];?></td>
					<td>
						<input <?php
							if($attn['attend'] == "present")echo "checked";
						?> type="radio" name="atnd[<?php echo $attn['stuRoll'];?>]" value="present">P
						<input <?php
							if($attn['attend'] == "absent")echo "checked";
						?> type="radio" name="atnd[<?php echo $attn['stuRoll'];?>]" value="absent">A
					</td>
				</tr>
				<?php
						}
					}
				?>
				<tr>
					<td colspan='4'>
						<input type="submit" name="update" class="btn btn-primary" value="Update"/>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php include "inc/footer.php";?>