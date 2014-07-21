<?php
$test_attempts=get_testattempts($userID);
$result=get_result($userID);
$user_scores=get_result($userID);
?>
<!DOCTYPE html>
<html>
<head>
<title>User Information </title>
<link rel="stylesheet" type="text/css" href="../main.css"/>
</head>
<body>

<h2 class="center"><u>User Information</u></h2>
<p class="center">User id : <?php echo $user_info['userID'];?></p>
<p class="center">First name : <?php echo $user_info['first_name'];?></p>
<p class="center">Last name : <?php echo $user_info['last_name'];?></p>
<p class="center">Email id : <?php echo $user_info['email'];?></p>
<p class="center">Address : <?php echo $user_info['address'];?></p>
<p class="center">Phone Number : <?php echo $user_info['phone_number'];?></p>

<h2 class="center"><u> Test Details  </u></h2>
<p class="center">Test Attempts : <?php  echo $test_attempts;?></p> 
<?php foreach($user_scores as $score)
		{?>
		<p class="center">Test date :<?php  echo $score['date']. " ,";?>
		Test score : <?php  echo $score['score'];?></p> 
		<?php
		}?>

</body>
</html>