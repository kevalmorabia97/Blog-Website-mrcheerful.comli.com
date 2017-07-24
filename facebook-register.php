<?php
	$conn = new mysqli("localhost","root","","myDB");
	if($conn->errno)	die("connError");
	
	if(!isset($_POST['fname']) || !isset($_POST['fpassword']) || !isset($_POST['femail'])){header('location: index.php');}
	$name = $_POST["fname"];
	$email = $_POST['femail'];
	$password = hash("sha256",$_POST["fpassword"]);//id stored inplace of password
	
	if($conn->query("insert into `blog-user`(name,password,email) values('$name','$password','$email')")===true){
		session_start();
		$uid=$conn->query("select uid from `blog-user` where email='$email'")->fetch_assoc()['uid'];
		$_SESSION['loggedIn']=true;
		$_SESSION['name']=$name;
		$_SESSION['uid']=$uid;
		$_SESSION['email']=$email;
		echo('done');
	}else{die('exists');}
	$conn->close();
?>