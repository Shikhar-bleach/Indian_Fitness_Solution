<html>
<?php
  require 'dbconfig/config.php'; 
  session_start(); 
?>

<head>
<link rel="stylesheet" type="text/css" href="loginstyle.css"/>
<title>Login</title>
</head>
<body>
<div id="wrapper">
     <div id="header">
	    <a name="top"></a>
	    <div id="logo">
		<a href="index.html"><img src="images/Capture.PNG" width="200" height="90" alt="logo" title="Indian fitness solution"/></a>
		</div><!---end of logo--->
		  <div id="social">
		     <ul>
			     <li><a href="" target="_blank"><img src="images/fluid_icon_facebook_v01_256_400x400.png"alt="logo" title="Facebook"></a>
				 <li><a href="" target="_blank"><img src="images/instagram-1675670_960_720.png"alt="logo" title="Instagram"></a>
				 <li><a href="" target="_blank"><img src="images/Twitter_Logo_Hd_Png_03.png"alt="logo" title="Twitter"></a>
				 <li><a href="" target="_blank"><img src="images/th.jpg"alt="logo" title="Google+"></a>
			 </ul>
		  </div><!---end of social--->
	 </div><!---end of header--->
    
	 <div id="content">
	    <center><h2>Login Form</h2>
        <img src="images/login.PNG" class="avatar"/>
		</center>
		<form class="myform" action="login.php" method="post">
		  <label><b>Username</b></label><br>
		  <input type="text" name="username" class="inputvalues" placeholder="Type your Username" required /><br>
		  <label><b>Password</b></label><br>
		  <input type="password" name="password" class="inputvalues" placeholder="Type your Password" required />
		  <input type="submit" name="login" id="loginbttn" value="Login"/><br>
		  <a href="register.php"><input type="button" id="registerbttn" value="Register"/><br></a>
		  </form>
		  <?php
		     if(isset($_POST['login']))
			 {
				 $username=$_POST['username'];
				 $password=$_POST['password'];
				 $query="select * from user where username='$username' and password='$password'";
				 $query_run=mysqli_query($con,$query);
				 
				 if(mysqli_num_rows($query_run)>0)
				 {
					 //valid
					 $_SESSION['username']=$username;//last thoughout the browser session accesible in all pages
					 header('location:homepage.php');
				 }
				 else
				 {
					 //invalid
					 echo '<script type="text/javascript">alert("invalid credentials")</script>';
				 }
			 }
		  ?>
			  
	 </div><!---end of content--->
</div><!---end of wrapper--->
</body>
</html>