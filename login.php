<?php
	include 'header.php';
	$conn = new mysqli("localhost","root","","myDB");
	if($conn->errno)	die($db->error);
	if(!isset($_POST['email']) || !isset($_POST['password'])){header('location:index.php');}
	session_start();
	
	$email = test_input($_POST['email']);
	if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){echo "<h1>Invalid Email</h1><br>";exit();}
	
	$details = $conn->query("select * from `blog-user` where email='$email'");
	if($details->num_rows==0){die('Not Registered');}
	$details = $details->fetch_assoc();
	
	$password = test_input($_POST['password']);
	if(empty($password) || !preg_match("/^[a-zA-Z0-9_.@-]*$/",$password)){echo "<h1>Invalid Password</h1><br>";exit();}
	$password = hash("sha256",$password);
	$truePass=$details['password'];
	if($password!=$truePass){die('Wrong Password');}
	
	$uid=$details['uid'];
	if($uid==0){
		$_SESSION['adminIn']=true;
		header('location:admin-page.php');
	}else{
		$_SESSION['loggedIn']=true;
		$_SESSION['name']=$details['name'];
		$_SESSION['uid']=$uid;
		$_SESSION['email']=$email;
		header('location:create-blog.php');
	}
?>