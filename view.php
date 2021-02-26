<?php include "inc/header.php";?>
<?php 
	include "classes/Student.php";
	$stu = new Student();
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<span>Check Attendance</span>
			<a href="index.php" class="btn btn-info pull-right">Back</a>
		</h2>
	</div>
	<style>
		.vd th,.vd td{
			text-align: center;
		}
	</style>
	<div class="panel-body">
			<table class="vd table table-stripped">
				<tr>
					<th>Serial</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
				<?php
					$getDate = $stu->getAttendDate();
					if($getDate){
						$i = 1;
						while($attDate = $getDate->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $i++;?></td>
					<td><?php 
						$date = strtotime($attDate['att_time']);
						echo date("d-m-Y",$date);
					?></td>
					<td><a class="btn btn-success" href="ViewByDate.php?vwId=<?php echo $attDate['att_time'];?>">View</a></td>
				</tr>
				<?php
						}
					}
				?>
			</table>
	</div>
</div>
<?php include "inc/footer.php";?>