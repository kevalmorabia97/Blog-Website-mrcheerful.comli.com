$(document).ready(function(){
	
	$('#namereg').bind('keyup blur',function(){ 
		var node = $(this);
		node.val(node.val().replace(/[^a-zA-Z ]/g,'') ); 
	});
	
	$('#emailreg,#email,#passwordreg,#password').bind('keyup blur',function(){ 
		var node = $(this);
		node.val(node.val().replace(/[^a-zA-Z0-9_.@-]/g,'') ); }
	);

	$(".validationreg").click(function(){
		var name = $('#namereg').val().trim();
		var email = $('#emailreg').val().trim();
		var password = $('#passwordreg').val().trim();
		if(name=='' || password=='' || email==''){
			alert("Empty Fields");
			return false;
		}else{return true;}
	});
	
	$(".validation").click(function(){
		var email = $('#email').val().trim();
		var password = $('#password').val().trim();
		if(email=='' || password==''){
			alert("Empty Fields");
			return false;
		}else{return true;}
	});

	$('#title').bind('keyup blur',function(){ 
		var node = $(this);
		node.val(node.val().replace(/[^a-zA-Z0-9 ?,'.-]/g,'') ); }
	);
	
	$(".validationblog").click(function(){
		var title = $('#title').val().trim();
		var des = CKEDITOR.instances.des.getData();
		if(title=='' || des==''){
			alert("Empty Fields");
			return false;
		}else{return true;}
	});
	
	$(".validationAjax").click(function(){
		var name = $('#name').val().trim();
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var blogs = JSON.parse(this.responseText);
				var txt="";
				if(blogs.length==0){
					txt+="<h1><i>No blogs</i></h1>";
				}else{
					if(name!=''){txt+="<h1><i>Search results for "+$('#name').val()+"</i></h1>";}
					for(var i = 0; i < blogs.length; i++){
						txt+="<div class=col-sm-4><div class=blog>";
						txt+="<p class='blog-title'><u>"+blogs[i].title+"</p></u>";
						txt+="<h4><u>"+blogs[i].name+"</h4></u>";
						/*txt+="<p class=des>"+blogs[i].description+"</p>";*/
						txt+="<p>Time: "+blogs[i].Timestamp+"</p>";
						txt+="<a href='read-more.php?bid="+blogs[i].bid+"' target='_blank'><h4>Read Blog</h4></a>";
						txt+="</div></div>";
					}
				}
				$('#blogs').html(txt);
			}
		};
		if(name==''){xhttp.open("GET", "fetch-all.php", true);}
		else{xhttp.open("GET", "fetch.php?name="+$('#name').val(), true);}
		xhttp.send();
	});
	
	$(".validationAjaxAll").click(function(){
		$('#name').val('');
		$('.validationAjax').click();
	});
	
	$("#name").keyup(function(event){
		if(event.keyCode == 13){
			$(".validationAjax").click();
		}
	});
	
	$("#otpreg").keyup(function(event){
		if(event.keyCode == 13){
			$(".validationotp").click();
		}
	});
	
	$(".validationotp").click(function(){
		var otp = $('#otpreg').val().trim();
		if(otp==''){
			alert("Empty OTP");
		}else{
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var txt = this.responseText;
					if(txt=='hacker'){
						alert('Hi hacker');
					}else if(txt=='wrong'){
						alert('Wrong OTP');
					}else if(txt=='connError'){
						alert('Connection Problem. Try again after sometime');
					}else if(txt=='exists'){
						alert('Email already registered');
					}else{
						alert('Registered Successfully');
					}
					window.location='index.php';
				}
			};
			xhttp.open("POST", "otp-check.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("otp="+$('#otpreg').val());
		}
	});
	
	$('#otpreg').bind('keyup blur',function(){ 
		var node = $(this);
		node.val(node.val().replace(/[^a-zA-Z0-9]/g,'') ); 
	});
});

function view(){window.location='view-blogs.php';}

function gRegister(googleUser) {
	var id_token = googleUser.getAuthResponse().id_token;
	var profile = googleUser.getBasicProfile();
	var id = profile.getId();
	var name = profile.getName();
	var imageUrl = profile.getImageUrl();
	var email = profile.getEmail();
	gapi.auth2.getAuthInstance().disconnect();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var txt=this.responseText;
			if(txt=='connError'){
				alert('Connection Problem. Try again after sometime');
			}else if(txt=='exists'){
				alert('Email already registered');
			}else{
				alert('Registered Successfully');
				window.location="create-blog.php";
			}
		}
	};
	xmlhttp.open("POST", "google-register.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("gpassword="+id+"&gname="+name+"&gemail="+email);
}

function gLogin(googleUser) {
	var id_token = googleUser.getAuthResponse().id_token;
	var profile = googleUser.getBasicProfile();
	var id = profile.getId();
	var name = profile.getName();
	var imageUrl = profile.getImageUrl();
	var email = profile.getEmail();
	gapi.auth2.getAuthInstance().disconnect();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var txt=this.responseText;
			if(txt=='connError'){
				alert('Connection Problem. Try again after sometime');
			}else if(txt=='notExists'){
				alert('Email not registered');
			}else if(txt=='wrongPassword'){
				alert('Wrong Password');
			}else{
				window.location="create-blog.php";
			}
		}
	};
	xmlhttp.open("POST", "google-login.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("gpassword="+id+"&gname="+name+"&gemail="+email);
}

function fetchUserDetail(type){
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected'){
			FB.api('/me', 'GET', {fields: 'name,id,email'}, function(response) {
				var name = response.name;
				var email = response.email;
				var id = response.id;
				if(name==='undefined' || email==='undefined' || id==='undefined'){
					alert('Failed to connect to Facebook\nPlease try again');
					return;
				}
				if(type==='login'){
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var txt=this.responseText;
							if(txt=='connError'){
								alert('Connection Problem. Try again after sometime');
							}else if(txt=='notExists'){
								alert('Email not registered');
							}else if(txt=='wrongPassword'){
								alert('Wrong Password');
							}else{
								window.location="create-blog.php";
							}
						}
					};
					xmlhttp.open("POST", "facebook-login.php", true);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send("fpassword="+id+"&fname="+name+"&femail="+email);	
				}else if(type==='reg'){
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var txt=this.responseText;
							if(txt=='connError'){
								alert('Connection Problem. Try again after sometime');
							}else if(txt=='exists'){
								alert('Email already registered');
							}else{
								window.location="create-blog.php";
							}
						}
					};
					xmlhttp.open("POST", "facebook-register.php", true);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send("fpassword="+id+"&fname="+name+"&femail="+email);					
				}
			});
			FB.logout();
		}
	});
}

function facebookLogin(){
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {fetchUserDetail('login');} 
		else{FB.login(function(response) {fetchUserDetail('login');},{scope:'email'});}
	});
}

function facebookReg(){
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {fetchUserDetail('reg');} 
		else{FB.login(function(response) {fetchUserDetail('reg');},{scope:'email'});}
	});
}