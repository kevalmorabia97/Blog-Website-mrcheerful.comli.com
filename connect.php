<?php 
	session_start();
	if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']){header('location:index.php');}
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->errno)	die($db->error);
?>