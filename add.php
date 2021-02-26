<?php include "inc/header.php";?>
<div style="margin: 10px auto;" id="showMsg">
	
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<span>Add Student</span>
			<a href="index.php" class="btn btn-info pull-right">Back</a>
		</h2>
	</div>
	<div class="panel-body">
		<form action="" method="post">
			<div class="form-group">
				<label for="name">Name: </label>
				<input type="text" id="name" name="name" class="form-control"/>
			</div>
			
			<div class="form-group">
				<label for="roll">Roll: </label>
				<input type="text" id="roll" name="roll" class="form-control"/>
			</div>
			<div class="form-group">
				<input type="submit" id="add" value="Add" class="btn btn-primary"/>
			</div>
		</form>
	</div>
</div>
<?php include "inc/footer.php";?>