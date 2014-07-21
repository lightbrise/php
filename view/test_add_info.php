<?php

?>
<!DOCTYPE html>
<html>


<head>
    <title>Add question</title>
    <link rel="stylesheet" type="text/css" href="../main.css"/>
</head>
   
<body>
 <div id="sidebar">
 <?php include("admin_sidebar.php");?>
</div>
<div id="content">
	<div id="edit_ques">
	<h2> Add New Test!</h3>
	<br>
    
	<form action="admin.php" method="post">

<?php

$testids=get_max_testID_count();
$testids=$testids+1;

?>

<label> Test ID:&nbsp;</label> <?php echo $testids;?> 

	<br><br>
	
<label>Test Name:</label>
            <input type="text" name="testName" required ><br />
        
            <label>&nbsp;</label>
            
       

<input type="hidden" name="test_id" value="<?php echo $testids;?>  "/>	
<input type="hidden" name="action" value="add_test"/>
<input type="hidden" name="add_test" value="add_test"/>
<input type="hidden" name="message" value="Test added successfully"/>

 <input type="hidden" name="userID" value="<?php echo $userID;?>"/>
      <input type="hidden" name="count" value="<?php echo $count;?>"/>	
       <label>&nbsp;</label> <label>&nbsp;</label>
      <br>
<input type="submit" value="submit"/><br />
<p><font color="red"><?php echo $message ;?></font></p>	
    </form>
    </div>
   </div>
	</body>
	
</html>