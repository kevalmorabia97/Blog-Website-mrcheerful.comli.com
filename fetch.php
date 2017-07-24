<?php  
	$conn = new mysqli('localhost','root','','mydb');
	if($conn->errno)	die("connError");
	
	if(!isset($_GET['name'])){header('location:index.php'); die();}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$name = test_input($_GET["name"]);
	if (empty($name) || !preg_match("/^[a-zA-Z ]*$/",$name)) {echo "Name Invalid<br>"; exit();}
	
	$result = $conn->query("select * from blog where name like '%$name%' or title like '%$name%' and published=1");
	$json_output = array();
	$json_output = $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($json_output);

	$conn->close();
?>