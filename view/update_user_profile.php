<?php


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Your Profile</title>
		<link rel="stylesheet" type="text/css" href="../main.css" />
	</head>
	<body>
		
	
		<form action="../controller/normal_user.php" method="POST">
			
			    <fieldset>
    <legend>Member Information</legend>
	<br><br>
    
    <label for="first_name" >First Name:</label>
    <input type="text" name="first_name" id=
        "first_name" required value="<?php echo $user_info['first_name'];?>"><br>
        
          <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id=
        "last_name" required value="<?php echo $user_info['last_name'];?>"><br>
        
           <label for="user_id">User ID:</label>
    <input readonly="true" type="text" name="user_id" id=
        "user_id" required value="<?php echo $user_info['userID'];?>"><br>
		
		
        
         <label for="address">Address:</label>
    <input type="text" name="address" id=
        "address" required value="<?php echo $user_info['address'];?>"><br>
   
   
    <label for="phoneNo">Phone Number:</label>
    <input type="tel" name="phoneNo" id="phoneNo"
           placeholder="999-999-9999" 
           pattern="\d{3}[\-]\d{3}[\-]\d{4}" 
           title="Must be 999-999-999 format"
           value="<?php echo $user_info['phone_number'];?>"><br>

    
    <label for="email">E-Mail:</label>
    <input  readonly="true" type="email" name="email" id="email"
           autofocus required
           value="<?php echo $user_info['email'];?>"><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" 
           required pattern="[a-zA-Z0-9]{6,}"
           placeholder="At least 6 letters or numbers"
           value="<?php echo $user_info['password'];?>"><br>
   
</fieldset>
<br>
    
    
<!--<fieldset id="buttons">-->
   
    <label>&nbsp;</label>
    <input type="hidden" name="action" value="save_user">
	<input type="hidden" name="userID" value="<?php echo $userID;?>"/>	
    <input type="hidden" name="count" value="<?php echo $count;?>"/>
	<input type="hidden" name="message" value="User information saved successfully"/>
	
	<br>
    <input type="submit" id="submit" value="Save">
	
    <input type="reset" id="reset" value="Reset Fields"><br>
<!--</fieldset>-->


            
 <p> <a href="../controller/normal_user.php?userID=<?php echo $userID;?>&count=<?php echo $count;?>&action=normal_user" class="left">Back to home page</a><p>      

		
	</form>
	</body>	
</html>