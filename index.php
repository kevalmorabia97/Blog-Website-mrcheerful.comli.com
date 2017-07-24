<?php
session_start();
include'header.php';
$_SESSION=array();
/* $_SESSION['loggedIn']=false;
$_SESSION['adminIn']=false; */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="227651935085-tk76d3i13tl4mnp1d1unptrdfta65eed.apps.googleusercontent.com">
	<style>.col-sm-2{width:auto;}</style>
</head>
<body>
	<script>
	window.fbAsyncInit = function() {
	FB.init({
		appId      : '1688369624525641',
		cookie     : true,
		xfbml      : true,
		version    : 'v2.8'
	});
	FB.AppEvents.logPageView();		
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<div class=row>
		<a class="btn btn-primary" href="guest.php" style="float:right; margin-right:50px; margin-top:10px;">Login as Guest</a>
	</div>
	<form style="margin:10px" action="login.php" method='POST'>
		<legend>Enter your Login details</legend>
		<div class ="form-group row">
			<label class="col-xs-2">Email:</label>
			<div class="col-xs-6"><input type="email"  name="email" class="form-control" placeholder="Email" id="email"></div>
		</div>
		<div class ="form-group row">
			<label class="col-xs-2">Password:</label>
			<div class="col-xs-6"><input type="password"  name="password" class="form-control" placeholder="Password" id="password"></div>
		</div>
		<div class ="form-group row">
			<div class="col-sm-offset-2"><input type="submit" class="col-sm-2 btn btn-primary validation" value="Login" style="margin-left:15px;"></div>
			<button type="button" class="col-sm-2 btn btn-primary" onclick=facebookLogin() style="margin-left:15px;">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 216 216" class="_5h0m" style="color:#ffffff; height:16px; vertical-align:middle;"><path fill="#ffffff" d="
					M204.1 0H11.9C5.3 0 0 5.3 0 11.9v192.2c0 6.6 5.3 11.9 11.9
					11.9h103.5v-83.6H87.2V99.8h28.1v-24c0-27.9 17-43.1 41.9-43.1
					11.9 0 22.2.9 25.2 1.3v29.2h-17.3c-13.5 0-16.2 6.4-16.2
					15.9v20.8h32.3l-4.2 32.6h-28V216h55c6.6 0 11.9-5.3
					11.9-11.9V11.9C216 5.3 210.7 0 204.1 0z"></path></svg>
				Login
				</button>
			<div class="g-signin2 col-sm-2" data-onsuccess="gLogin"></div>
			<!--<div class="fb-login-button col-sm-2" data-max-rows="1" data-size="medium" data-button-type="continue_with" data-show-faces="false" data-use-continue-as="true" auto-logout-link="true"></div>-->
		</div>
	</form>	
	<br><br><br>
	<form style="margin:10px" action="register.php" method='POST'>
		<legend>Enter below details to REGISTER</legend>
		<div class ="form-group row">
			<label class="col-xs-2">Name:</label>
			<div class="col-xs-6"><input type="text" name="namereg" class="form-control" placeholder="Name" id="namereg"></div>
		</div>
		<div class ="form-group row">
			<label class="col-xs-2">Email:</label>
			<div class="col-xs-6"><input type="email"  name="emailreg" class="form-control" placeholder="Email" id="emailreg"></div>
		</div>
		<div class ="form-group row">
			<label class="col-xs-2">Password:</label>
			<div class="col-xs-6"><input type="password"  name="passwordreg" class="form-control" placeholder="Password" id="passwordreg"></div>
		</div>
		<div class ="form-group row">
			<div class="col-sm-offset-2"><input type="submit" class="col-sm-2 btn btn-primary validationreg" value="Register" style="margin-left:15px;"></div>
			<button type="button" class="col-sm-2 btn btn-primary" onclick=facebookReg() style="margin-left:15px;">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 216 216" class="_5h0m" style="color:#ffffff; height:16px; vertical-align:middle;"><path fill="#ffffff" d="
					M204.1 0H11.9C5.3 0 0 5.3 0 11.9v192.2c0 6.6 5.3 11.9 11.9
					11.9h103.5v-83.6H87.2V99.8h28.1v-24c0-27.9 17-43.1 41.9-43.1
					11.9 0 22.2.9 25.2 1.3v29.2h-17.3c-13.5 0-16.2 6.4-16.2
					15.9v20.8h32.3l-4.2 32.6h-28V216h55c6.6 0 11.9-5.3
					11.9-11.9V11.9C216 5.3 210.7 0 204.1 0z"></path></svg>
				Sign Up
			</button>
			<div class="g-signin2 col-sm-2" data-onsuccess="gRegister"></div>
		</div>
	</form>
	<div class="fb-like col-sm-12" data-href="https://www.facebook.com/mrcheerfulsblog/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
</body>
</html>