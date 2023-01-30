<html>
<?php
  require 'dbconfig/config.php';
  session_start();
?>
<head>
<link rel="stylesheet" type="text/css" href="homepagestyle.css"/>
<title>Home Page</title>
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
	    <center><h1>Home Page</h1>
		<h2>welcome
		<?php
		echo $_SESSION['username'];//error in this line after logout as the variable is cleared
		?></h2>
		<img src="images/login.PNG" class="avatar"/>
		</center>
		<?php
		if (isset($_SESSION["username"]))
	    {
	       $username=$_SESSION["username"];
	       $query="select * from user where username='$username'";
	       $query_run=mysqli_query($con,$query)or die("unable to execute query");
		   
          
              while($row=mysqli_fetch_assoc($query_run))
              {
    	           if($row["usertype"]=='A')
    	           {
    		            echo'<script>window.location.href="http://localhost/project/admin/admin.php";</script>';

    	           }
				   else
				   {
					   $query="select * from pt where username='$username'";
	                   $query_run=mysqli_query($con,$query)or die("unable to execute query");
					   echo "<table id='table' border='1px' width='400px'>";
                       while($row=mysqli_fetch_assoc($query_run))
                       {
    	                echo "<tr><th>Name</th><td>".$row["username"]."</td></tr>";
						echo "<tr><th>Meal 1</th><td>".$row["meal1"]."</td></tr>";
						echo "<tr><th>Meal 2</th><td>".$row["meal2"]."</td></tr>";
						echo "<tr><th>Meal 3</th><td>".$row["meal3"]."</td></tr>";
						echo "<tr><th>Meal 4</th><td>".$row["meal4"]."</td></tr>";
						echo "<tr><th>Meal 5</th><td>".$row["meal5"]."</td></tr>";
						echo "<tr><th>Meal 6</th><td>".$row["meal6"]."</td></tr>";
						echo "<tr><th colspan='2'><a href='updateuserinfo.php?q=$username'>Click here to Update Your Information</a></th></tr>";
						echo "<tr><th colspan='2'><a href='addimage.php?q=$username'>Click here to Provide Current physique update</a></th></tr>";
                       
					   }echo "</table>";
				   }
    	       }
    	    
        }
	    else
	    {
           echo'<script>alert("Unauthorised to use this page");window.location.href="http://localhost/project/login.php";</script>';
        }
		?>
        
		<form class="myform" action="homepage.php" method="post">
		  <input type="submit" name="logout" id="logoutbttn" value="Log Out"/><br>
		  </form>
		  <?php
		    if(isset($_POST['logout']))
			{
		    session_destroy();//clear all session variables
			header('location:login.php');//to redirect to login page after destroying session
			}
		  ?>
			  
	 </div><!---end of content--->
</div><!---end of wrapper--->
</body>
</html>