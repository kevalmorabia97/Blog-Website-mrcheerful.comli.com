<?php include 'connect.php'; include'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create your blog</title>
	<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
	<div class=row>
		<label class="col-xs-4" style=color:white>Logged in as: <?php echo $_SESSION['name'];?></label>
		<a class="btn btn-primary" href="logout.php" style="float:right; margin-right:50px; margin-top:10px;">Logout</a>
		<input type="button" class="col-xs-2 btn btn-primary" onclick=view() value="Search blogs" style="float:right; margin-right:50px; margin-top:10px;">
		<a class="btn btn-primary" href="my-blogs.php" style="float:right; margin-right:50px; margin-top:10px;">My Blogs</a>
	</div>
	
	<form style="margin:10px" action="blog-check.php" method='POST' enctype='multipart/form-data'>
		<legend>Create A New Blog</legend>
		<div class ="form-group row">
			<label class="col-xs-2">Title:</label>
			<div class="col-xs-8"><input type="text"  name="title" class="form-control" placeholder="Title" id="title"></div>
		</div>
		<div class ="form-group row">
			<label class="col-xs-2">Description:</label>
			<div class="col-xs-8"><textarea name="des" class="form-control" id="des" placeholder="Description"></textarea></div>
			<script>
				CKEDITOR.replace( 'des' );
			</script>
		</div>
		<div class ="form-group row">
			<div class="col-xs-offset-2"><input type="submit" class="col-xs-2 btn btn-primary validationblog" value="Create Blog" style="margin-left:15px;"></div>
		</div>
	</form>
</body>
</html>