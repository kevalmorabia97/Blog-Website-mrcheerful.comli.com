<?php include 'connect.php'; include'header.php';?>
<!DOCTYPE html>
<html lang="en">
<body>
	<div class=row>
		<a class="btn btn-primary" href="logout.php" style="float:right; margin-right:50px; margin-top:10px;">Logout</a>
		<input type="button" class="col-xs-2 btn btn-primary" onclick=view() value="Search blogs" style="float:right; margin-right:50px; margin-top:10px;">
		<a class="btn btn-primary" href="my-blogs.php" style="float:right; margin-right:50px; margin-top:10px;">My Blogs</a>
		<a class="btn btn-primary" href="create-blog.php" style="float:right; margin-right:50px; margin-top:10px;">Create Blog</a>
	</div>
	<?php	
		$name = $_SESSION['name'];
		$title = test_input($_POST["title"]);
		if (empty($title) || !preg_match("/^[a-zA-Z0-9 ?,'.-]*$/",$title)) {
			echo "<p>Title Invalid</p><br>"; 
			exit();
		}	
		$des = $_POST['des'];
		
		$uid = $_SESSION['uid'];
		
		$sql= "insert into blog(uid,name,title,description) values('".$uid."','".$name."','".$title."','".$des."')";
		if ($conn->query($sql) === TRUE) {
			echo "<hr><h2>Blog successfully created</h2>";
		} else {
			echo "<p>Error: " . $conn->error."</p>";
		}
		$conn->close();
	?>
</body>
</html>