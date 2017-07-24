<?php
	$conn = new mysqli("localhost","root","","myDB");
	if($conn->errno)	die("connError");
	
	if(!isset($_POST['gname']) || !isset($_POST['gpassword']) || !isset($_POST['gemail'])){header('location: index.php');}
	$name = $_POST["gname"];
	$email = $_POST['gemail'];
	$password = hash("sha256",$_POST["gpassword"]);//id stored inplace of password
	
	$details = $conn->query("select * from `blog-user` where email='$email'");
	if($details->num_rows==0){die('notExists');}
	$details = $details->fetch_assoc();
	$truePass=$details['password'];
	if($password!=$truePass){die('wrongPassword');}
	
	session_start();
	$uid=$details['uid'];
	$_SESSION['loggedIn']=true;
	$_SESSION['name']=$name;
	$_SESSION['uid']=$uid;
	$_SESSION['email']=$email;
	echo('done');
	$conn->close();
?>