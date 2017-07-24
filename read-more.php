<?php include'header.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>View Blogs</title>
	<style>
		h1,body{color:black;}
		.blog{margin-top:20px;}
	</style>
</head>
<body>
<?php
	$conn = new mysqli('localhost','root','','mydb');
	if ($conn->connect_error || !isset($_GET['bid'])) {header('location:view-blogs.php');}
	$bid=$_GET['bid'];

	$result = $conn->query("select * from blog where bid='$bid' and published=1");
	if($result->num_rows==0){header('location:view-blogs.php');}
	$row = $result->fetch_assoc();
	echo"<div class=blog style='height:auto; margin:10px'>
		<h1><p class='blog-title'><u>".$row['title']."</u></p></h1>
		<p class=des>".$row['description']."</p>
		<h2>By: ".$row['name']."</h2>
		<p>Time: ".$row['Timestamp']."</p></div>";
?>

<div id="disqus_thread" class="col-sm-12"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://mr-cheerfuls-blog.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>            
<script id="dsq-count-scr" src="//localhost-szxbaa25hg.disqus.com/count.js" async></script>
</body>
</html>
