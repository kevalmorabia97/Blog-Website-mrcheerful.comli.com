<?php
	$conn = new mysqli("localhost","root","","myDB");
	if($conn->errno)	die("connError");
	
	if(!isset($_POST['gname']) || !isset($_POST['gpassword']) || !isset($_POST['gemail'])){header('location: index.php');}
	$name = $_POST["gname"];
	$email = $_POST['gemail'];
	$password = hash("sha256",$_POST["gpassword"]);//id stored inplace of password
	
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