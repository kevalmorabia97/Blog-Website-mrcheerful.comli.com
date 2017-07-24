<?php 
	include'header.php';
	session_start();
	if(!isset($_SESSION['adminIn']) || !$_SESSION['adminIn']){
		header('location:index.php');
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin</title>
</head>
<body style=color:black;>
	<div class=row>
		<label class="col-xs-2"><h3 style=padding-top:10px;>Admin</h3></label>
		<a class="btn btn-primary" href="logout.php" style="float:right; margin-right:50px; margin-top:10px;">Logout</a>
	</div>
	<h1>Blogs to be approved</h1>
	<hr>
	<?php
	$conn = new mysqli("localhost","root","","myDB");
	if($conn->errno)	die($db->error);
	
	$result = $conn->query("select * from blog where published=0");
	while($row = $result->fetch_assoc()){
		echo "<div class=blog style='height:auto; margin:10px'>";
		echo "<p class='blog-title'><u>".$row['title']."</p></u>";
		echo "<p class=des>".$row['description']."</p>";
		echo "<p>By: ".$row['name']."</p>";
		echo "<p>Time: ".$row['Timestamp']."</p>";
		echo "<a class='btn btn-primary' href='publish.php?bid=".$row['bid']."'>PUBLISH</a></div>";
	}
	?>
</body>
</html>
