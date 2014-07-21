<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Please Register here</title>
    <link rel="stylesheet" type="text/css" href="../main.css"/>
</head>

<body>
    
	<h3> Register here </h3>
    <h2>Profile Information</h2>
	<form action="../model/register_validation.php" method="post" id="registration_form">
		
		
		
       <fieldset>
    <legend>Member Information</legend>
    <br>
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" id=
        "first_name" required><br>
        
          <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id=
        "last_name" required><br>
        
           <label for="user_id">User ID:</label>
    <input type="text" name="user_id" id=
        "user_id" required><br>
        
         <label for="address">Address:</label>
    <input type="text" name="address" id=
        "address" required><br>
   
   
    <label for="phoneNo">Phone Number:</label>
    <input type="tel" name="phoneNo" id="phoneNo"
           placeholder="999-999-9999" 
           pattern="\d{3}[\-]\d{3}[\-]\d{4}" 
           title="Must be 999-999-999 format"><br>

    
    <label for="email">E-Mail:</label>
    <input type="email" name="email" id="email"
           autofocus required><br>
		   
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" 
           required pattern="[a-zA-Z0-9]{6,}"
           placeholder="At least 6 letters or numbers"><br>
   
<br>
    <label>&nbsp;</label>
     <input type="hidden" name="action" value="register_user">
    <input type="submit" id="submit" value="Register">
    <input type="reset" id="reset" value="Reset Fields"><br>
</fieldset>


        
           
        
<p><a href="../index.php">Go back to login page </a></p>
    </form>
	
	</body>
