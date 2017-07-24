<?php
	include 'header.php';
	session_start();
	if(!isset($_SESSION['adminIn']) || $_SESSION['adminIn']==false){header('location:view-blogs.php');} 
	
	$conn = new mysqli('localhost','root','','mydb');
	if ($conn->connect_error || !isset($_GET['bid'])) {header('location:view-blogs.php');}
	
	$bid=test_input($_GET['bid']);
	$conn->query("update blog set published=1 where bid='$bid'");
	$conn->close();
	header('location:admin-page.php');
?>