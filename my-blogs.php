<?php include 'connect.php'; include'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head><title>My Blogs</title></head>
<body style=color:black>
	<div class=row>
		<label class="col-xs-4" style=color:white>Logged in as: <?php echo $_SESSION['name'];?></label>
		<a class="btn btn-primary" href="logout.php" style="float:right; margin-right:50px; margin-top:10px;">Logout</a>
		<input type="button" class="col-xs-2 btn btn-primary" onclick=view() value="Search blogs" style="float:right; margin-right:50px; margin-top:10px;">
		<a class="btn btn-primary" href="create-blog.php" style="float:right; margin-right:50px; margin-top:10px;">Create Blog</a>
	</div>
	<h1>My Blogs</h1>
	<?php
		$uid = $_SESSION['uid'];
		$result = $conn->query("select * from blog where uid='$uid' and published=1");
		while($row = $result->fetch_assoc()){
			echo "<div class=col-sm-4><div class='blog' style='margin-bottom:10px;'>
				  <p class='blog-title'><u>".$row['title']."</u></p>";
			/*echo "<p class=des>".$row['description']."</p>";*/
			echo "<p>Time: ".$row['Timestamp']."</p>";
			echo  "<a href='read-more.php?bid=".$row['bid']."' target='_blank'><h4>Read Blog</h4></a>";
			echo  "</div></div>";
		}
	?>
</body>
</html>