<?php
	session_start();
	$_SESSION['loggedIn']=false;
	$_SESSION['adminIn']=false;
	header('location: index.php');
?>	