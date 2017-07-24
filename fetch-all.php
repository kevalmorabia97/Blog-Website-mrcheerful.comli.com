<?php  
	$conn = new mysqli('localhost','root','','mydb');
	if($conn->errno)	die("connError");
	
	$result = $conn->query("select * from blog where published=1");
	$json_output = array();
	$json_output = $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($json_output);

	$conn->close();
?>