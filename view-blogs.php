<?php include 'connect.php'; include'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>View Blogs</title>
	<script>
		$(document).ready(function(){
			$('.validationAjax').click();
		});
	</script>
</head>
<body style=color:black>
	<div class=row>
		<label class="col-xs-4" style=color:white>Logged in as: <?php echo $_SESSION['name'];?></label>
		<a class="btn btn-primary" href="logout.php" style="float:right; margin-right:50px; margin-top:10px;">Logout</a>
		<a class="btn btn-primary" href="create-blog.php" style="float:right; margin-right:50px; margin-top:10px;">Create Blog</a>
		<a class="btn btn-primary" href="my-blogs.php" style="float:right; margin-right:50px; margin-top:10px;">My Blogs</a>
	</div>
	<div style="margin:10px">
		<div class ="form-group row">
			<label class="col-xs-2">Name:</label>
			<div class="col-xs-6"><input type="text" name="name" class="form-control" placeholder="Name" id="name"></div>
		</div>
		<div class ="form-group row">
			<div class="col-xs-offset-2"><input type="button" class="col-xs-2 btn btn-primary validationAjax" value="View Blogs" style="margin-left:15px;"></div>
			<div class="col-xs-offset-2"><input type="button" class="col-xs-2 btn btn-primary validationAjaxAll" value="View All Blogs" style="margin-left:15px;"></div>
		</div>
	</div>
	<hr>
	<div id="blogs"></div>
</body>
</html>
