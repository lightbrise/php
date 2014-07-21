<?php
?>
<!DOCTYPE html>
<html lang="en">

</body>
<br>
	<h2 class="center">Welcome <?php echo " ".$user_info['userID']." ";?>to Quiz Buzz!!!!</h2><br>
	


<h3 class="center">Do you want to start the test ?? </h3><br>

<form action="../controller/normal_user.php" method="post">

    <input type="hidden" name="action" value="start_test">
	<input type="hidden" name="userID" value="<?php echo $userID;?>"/>	
    <input type="hidden" name="count" value="<?php echo $count;?>"/>
    
    <p class="submission"><button class="btnExample" type="submit" value="Submit"/>Start</button></p>
	<p class="submission"><font color="red"><?php echo $message ;?></font></p>
</form> 	




</body>
</html>