<?php
    require 'dbconfig/config.php'; 
  
  if(isset($_POST['submitbttn']))
		   {
			   //echo '<script type="text/javascript">alert("Sign up button clicked")</script>';
			   $username=$_POST['username'];
			   $password=$_POST['password'];
			   $cpassword=$_POST['cpassword'];
			   $weight=$_POST['weight'];
			   $height=$_POST['height'];
			   $measurements=$_POST['measurements'];
			   $goal=$_POST['goal'];
			   if($password==$cpassword)
			   {
				   $query="select * from user where username='$username'";
				   $query_run=mysqli_query($con,$query);
				   if(mysqli_num_rows($query_run)>0)
				   {
					   //there is already a user with same username in db
					   echo '<script type="text/javascript">alert("User already exists... Try another username")</script>';
				   }
				  
				   else
				   {
					   
					   
					   $query="INSERT INTO `user` (`uid`, `username`, `password`, `usertype`, `weight`, `height`, `measurements`, `goal`, `image`) VALUES (NULL, '$username', '$password', '', '$weight', '$height', '$measurements', '$goal', '');";
					   
					   $query_run=mysqli_query($con,$query)or die("unable to execute query");
					   if($query_run)
					   {
						   echo '<script type="text/javascript">alert("User registered.. Go to login page")</script>';
					   }
					   else
					   {
						   echo '<script type="text/javascript">alert("Error")</script>';
					   }
				   }
			   }
			   else
			   {
				   echo '<script type="text/javascript">alert("password and confirm password doesnt match")</script>';
			   }
			   
		   }
  
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="loginstyle.css"/>
<title>Registration Form</title>

</head>
<body>
<div id="wrapper">
     <div id="header">
	    <a name="top"></a>
	    <div id="logo">
		<img src="images/Capture.PNG" width="200" height="90" alt="logo" title="Indian fitness solution"/>
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
	    <center><h2>Registration Form</h2>
        <img src="images/login.PNG" class="avatar"/>
		</center>
		<form class="myform" action="#" method="post">
		  <label><b>Username</b></label><br>
		  <input type="text" name="username" class="inputvalues" placeholder="Type your Username" required /><br>
		  <label><b>Weight</b></label><br>
		  <input type="text" name="weight" class="inputvalues" placeholder="Type your weight" required />
		  <label><b>Height</b></label><br>
		  <input type="text" name="height" class="inputvalues" placeholder="Type your height" required />
		  <label><b>Measurements</b></label><br>
		  <input type="text" name="measurements" class="inputvalues" placeholder="Type your measurements" required />
		  <label><b>Goal</b></label><br>
		  <input type="text" name="goal" class="inputvalues" placeholder="Type your goal" required />
		  <label><b>Password</b></label><br>
		  <input type="password" name="password" class="inputvalues" placeholder="Type your Password" required />
		  <label><b>Confirm Password</b></label><br>
		  <input type="password" name="cpassword" class="inputvalues" placeholder="Confirm Password" required />
		  <input type="submit" name="submitbttn" id="signupbttn" value="Sign Up"/><br>
		  <a href="login.php"><input type="button" name="backbttn" id="backbttn" value="Back"/><br></a>
		  </form>
		  
	 </div><!---end of content--->
</div><!---end of wrapper--->
</body>
</html>