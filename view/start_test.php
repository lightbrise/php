<?php
?>
<!DOCTYPE html>
<html lang="en">
<body>
<h2 class="center"><font color="violet"><i>Start the test here..!!! </i></font> </h2><br>
<h3 class="center">Click on the test to continue!! </h3>
<form action="../controller/normal_user.php" method="post">
	


<? // showing options : User can choose which test will be started.   ?>

<?php for($i=1;$i<=$testtype_count;$i++) 
			{ 
			$flag=get_flag_status_test($i); 
			
			// flag 0: unabled test, flag 1: enabled test 
			if(($flag<>1)||((get_questions_count($i))<=1)) 
			{
			continue;} 
			{?><br><ul ><li ><a href="../controller/normal_user.php?testtype=<?php echo $i ;?>&userID=<?php echo $user_info['userID'];?>&count=<?php echo $count;?>&action=start">
			<?php $test_name=get_test_name($i); echo $test_name;?></li></a></ul>

			<?php }} ?>
			
</body>
</html>