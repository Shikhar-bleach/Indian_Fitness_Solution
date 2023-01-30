<?php
require 'dbconfig/config.php'; 
session_start(); 
if (isset($_SESSION["username"])) {
 $title=$_SESSION["username"];
if(isset($_POST["s"]))
{

$imagename=$_FILES["image"]["name"];
$tempfolder=$_FILES["image"]["tmp_name"];
$imagesize=$_FILES["image"]["size"];

$path="upload/".$title.'.jpg';
 move_uploaded_file($tempfolder,$path);

$sqlupdate="UPDATE `user` SET `image` = '$path' WHERE `user`.`username` = '$title'";
$result=mysqli_query($con,$sqlupdate)or die("unable to execute query");
	if (isset($result))
	{
		echo'<script>alert("Data Stored");window.location.href="http://localhost/project/homepage.php";</script>';
	}
      

}//end of insetion data
?>
		  
<html>
<head>
<title>Login</title>
<style>
body {
	        background : #4682B4;
			margin : 0;
			padding : 0;
			font-family : "Helvetica","Arial";
	   }
	   #wrapper{
	   width : 100%;
	   height:auto;
	   background:#A9A9A9;
	   border-left:5px solid #696969;
	   border-right:5px solid #696969;
	   overflow: auto;<!---so that all theoverflor content shows--->
	   margin:0 auto;
	   padding:10px;
	   
	   }
	   #header{
	   width:100%;
	   height:100px;
	   border-bottom:3px solid #708090;
	   padding-top:15px;
	   
	   }
	   #logo{
	   float:left;
	   margin:5px 0px 0px 8px;
	   }
	   #social{
	   float:right;
	   margin : 20px 30px 0px 0px;
	   }
	   #social ul li{
	   float : left;
	   list-style : none;
	   padding : 5px;
	   }
	   #social img {
	   height: 55px;
	   width: 55px;
	   }
	   #content{
	   
	   width:1024px;
	   height:520px;
	   padding-left:15px;
	   letter-spacing:1;
	   color :#57574C;
	   border-left:3px solid #708090;
	   }
	   .avatar{
		 width:150px;
	     text-align:center;
		   
		 }
		 .myform{
		 width:450px;
		 margin:0 auto;
		 
		 }
		 .inputvalues{
		 width:430px;
		 margin:0 auto;
		 padding:5px;
		 }
		 #loginbttn{
		 margin-top:10px;
		 background-color:#27ae60;
		 padding:5px;
		 color:white;
		 text-align:center;
		 font-size:18px;
		 font-weight:bold;
		 width:430px;
		 }
		  #registerbttn{
		 margin-top:10px;
		 margin-bottom:20px;
		 background-color:#3498db;
		 padding:5px;
		 color:white;
		 text-align:center;
		 font-size:18px;
		 font-weight:bold;
		 width:430px;
		 }
		 #s{
			 margin-top:10px;
		 margin-bottom:20px;
		 background-color:#3498db;
		 padding:5px;
		 color:white;
		 text-align:center;
		 font-size:18px;
		 font-weight:bold;
		 width:430px;
			 
		 }
			 

</style>
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
	    <center><h2>Update User Info. Form<br></h2>
        <img src="images/login.PNG" class="avatar"/>
		</center>
		<center><form name="add" id="add" method="post" action="#" enctype="multipart/form-data">
    
    Image
    <input type="file" name="image" id="image"><br>
  
    <input type="submit" name="s" id="s">
</form></center>
		  
			  
	 </div><!---end of content--->
</div><!---end of wrapper--->
</body>
</html>
<?php	
    }else{
echo'<script>alert("Unauthorised to use this page");window.location.href="http://localhost/project/login.php";</script>';
}
?>
