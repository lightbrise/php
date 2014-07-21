<?php  
	if (isset($_POST['message']))
{ 
    $message = $_POST['message'];
	
	
}
	
 else if (isset($_GET['message']))
{ 
    $message = $_GET['message'];
	
	
}
	 
else 
{
    $message = "";
	
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Login page </title>
<link rel="stylesheet" type="text/css" href="./css/login.css"/>
<link rel="shortcut icon" href="./images/buzz.jpg">
</head>

<body>
<div id="content">
<form action="./controller/login.php" method="POST">
<h2>Welcome to  Quiz!!</h2>
<h3>To start the quiz login here..!!!</h3>
<label>USER ID : </label>
<input type ="text" name="userid" title="enter your User Id here"/>
</br></br>
<label>PASSWORD : </label>
<input type="password" name="password" title="enter your Password here"/>
</br></br>
<input type="submit" value="Login"/>
<label>&nbsp;&nbsp; </label>

<a href="./view/register.php" ><font color="white" size="4px">Register</font></a>


</form>


<p><font color="red" size="4px"><?php echo $message;?></font></p>



</br></br>

</div>




</body>
</html>