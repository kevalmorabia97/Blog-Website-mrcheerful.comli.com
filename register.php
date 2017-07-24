<?php include'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head><title>Register</title></head>
<body>
	<div class=row>
		<a class="btn btn-primary" href="index.php" style="float:right; margin-right:50px; margin-top:10px;">Homepage</a>
	</div>
<?php
	$conn = new mysqli("localhost","root","","myDB");
	if($conn->errno)	die($db->error);
	
	if(!isset($_POST['namereg']) || !isset($_POST['passwordreg']) || !isset($_POST['emailreg'])){header('location: index.php');}
	$name = test_input($_POST["namereg"]);
	if (empty($name) || !preg_match("/^[a-zA-Z ]*$/",$name)) {
		echo "<h1>Name Invalid</h1>"; exit();
	}else{echo "<h1>Name: $name</h1><br>";}
	
	$email = test_input($_POST['emailreg']);
	if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "<h1>Invalid Email</h1><br>";exit();
	}else{echo "<h1>Email: $email</h1><br>";}
	
	$password = test_input($_POST["passwordreg"]);
	if(empty($password) || !preg_match("/^[a-zA-Z0-9_.@-]*$/",$password)){echo "<h1>Invalid Password</h1><br>";exit();}
	$password = hash("sha256",$password);
	
	$result = $conn->query("select * from `blog-user` where email='$email'");
	if($result->num_rows!=0){echo "<h1>Email Already Registered</h1>"; exit();}
	
	//SENDING MAIL FROM PHP!!!
	function generateRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	$otp = generateRandomString(10);
	
	require 'PHPMailer-master/PHPMailerAutoload.php';
	$mail = new PHPMailer();
	$mail ->IsSmtp();
	$mail ->SMTPDebug = 0;
	$mail ->SMTPAuth = true;
	$mail ->SMTPSecure = 'tls';
	$mail ->Host = "smtp.gmail.com";
	$mail ->Port = 587; //465 or 587
	$mail ->IsHTML(true);
	$mail ->Username = "YOUR-EMAIL-ID";
	$mail ->Password = "YOUR-EMAIL-PASSWORD";
	$mail ->SetFrom("YOUR-EMAIL-ID");
	$mail ->Subject = "Blog email confirmation OTP";
	$mail ->Body = "Your One Time Password (OTP) to register to mrcheerful.comli.com is ".$otp;
	$mail ->AddAddress($email);

	if(!$mail->Send()){
	   echo "<h1>Please enter a working email</h1>";
	   die();
	}
	
	session_start();
	$_SESSION['namereg']=$name;
	$_SESSION['passwordreg']=$password;
	$_SESSION['emailreg']=$email;
	$_SESSION['trueotp']=$otp;
?>
	<br>
	<div style="margin:10px; text-align:center">
		<legend>Enter the OTP sent to your email account to confirm your email</legend>
		<div class ="form-group row">
			<div class="col-xs-2 col-xs-offset-5" style="padding:0"><input type="text"  name="otpreg" class="form-control" placeholder="OTP" id="otpreg"></div>
		</div>
		<div class ="form-group row">
			<div><input type="button" class="col-xs-offset-5 col-xs-2 btn btn-primary validationotp" value="Validate"></div>
		</div>	
	</div>
</body>
</html>	