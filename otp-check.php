<?php
	session_start();
	if(!isset($_SESSION['namereg']) || !isset($_SESSION['emailreg']) || !isset($_SESSION['passwordreg']) || !isset($_SESSION['trueotp']) ||!isset($_POST['otp'])){
		die('hacker');
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	if(test_input($_POST['otp'])!=$_SESSION['trueotp']){
		die('wrong');
	}else{
		$conn = new mysqli('localhost', 'root', '', 'myDB');
		if($conn->errno)	die('connError');
		$name=$_SESSION['namereg'];
		$password=$_SESSION['passwordreg'];
		$email=$_SESSION['emailreg'];
		if($conn->query("insert into `blog-user`(name,password,email) values('$name','$password','$email')")===true){
			die('done');
		}else{die('exists');}
		$conn->close();
	}
?>