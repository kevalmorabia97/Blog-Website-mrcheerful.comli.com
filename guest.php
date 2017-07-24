<?php 
	include'header.php';
	$conn = new mysqli('localhost','root','','mydb');
	if($conn->errno)	die("connError");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Guest</title>
	<script>
		$(document).ready(function(){
			$('.validationAjax').click();
		});
	</script>
</head>
<body style=color:black>
	<div class=row>
		<label class="col-xs-4" style=color:white>Logged in as: Guest</label>
		<a class="btn btn-primary" href="index.php" style="float:right; margin-right:50px; margin-top:10px;">Login</a>
	</div>
	<div style="margin:10px">
		<div class ="form-group row">
			<label class="col-xs-2">Name:</label>
			<div class="col-xs-6"><input type="text" name="name" class="form-control" placeholder="Name" id="name"></div>
		</div>
		<div class ="form-group row">
			<div class="col-sm-offset-2"><input type="button" class="col-sm-2 btn btn-primary validationAjax" value="Search Blogs" style="margin-left:15px;"></div>
			<input type="button" class="col-sm-2 btn btn-primary validationAjaxAll" value="View All Blogs" style="margin-left:15px;"></div>
		</div>
	</div>
	
	<hr>
	<div id="blogs"></div>
</body>
</html>
