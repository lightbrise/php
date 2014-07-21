<?php
	if (isset($_POST['message'])) 
    $message = $_POST['message'];
	
 else if (isset($_GET['message']))
    $message = $_GET['message'];
else 
    $message = "";

if(!empty($_POST['action']))
{
$action=$_POST['action'];

$test_id=$_POST['test_id'];




if($action=='delete_question')
{
$question_id=$_POST['question_id'];
	$questions_count=get_questions_count($test_id);
	if($questions_count >1)
	{
	delete_question($test_id,$question_id);
	//echo "<script type='text/javascript'>alert('Question  has been deleted successfully !')</script>";
	include("../view/test_question_info.php");
	
	
	}
	else
	{
		// echo "<script type='text/javascript'>alert('Test cannot be empty')</script>";
		 
	//echo " Test cannot be empty";
	$message ="Test cannot be empty";
	
	include("../view/test_question_info.php");
	
	}
}
elseif($action=='modify_question')
{
	$question_id=$_POST['question_id'];
	$question_plus_ans=get_question($test_id,$question_id);
	include("../view/modify_question.php");
	
	
	
}
elseif($action=='update_question')
{
$question_id=$_POST['question_id'];
$question_plus_ans=get_question($test_id,$question_id);
	
	if(!empty($_POST['modify']))
	{
	
	
	$question=$_POST['question'];
	$option1=$_POST['option1'];
	$option2=$_POST['option2'];
	$option3=$_POST['option3'];
	$option4=$_POST['option4'];
	$correct=$_POST['correct'];
	if($question!=''&&$option1!=''&&$option2!=''&&$option3!=''&&$option4!=''&&$correct!='')
	{
	modify_question($test_id,$question_id,$question,$option1,$option2,$option3,$option4,$correct);
	$question_plus_ans=get_question($test_id,$question_id);
	//echo "<script type='text/javascript'>alert('Question  has been modified successfully !')</script>";
	include("../view/modify_question.php");
	}
	else
	{
	//echo "Fields cannot be empty";
	include("../view/modify_question.php");
	}
	}
	else
	{
	include("../view/modify_question.php");
	
	}
	
	
}
elseif($action=='save_question')
{
	//added***12.9
    $questionID=get_max_questionID($test_id);
	//echo "questionID".$questionID."<br>";
    $questionID=$questionID+1;
	//added end

	if(!empty($_POST['add']))
	{
	$test_id=$_POST['test_id'];
	$question=$_POST['question'];
	$option1=$_POST['option1'];
	$option2=$_POST['option2'];
	$option3=$_POST['option3'];
	$option4=$_POST['option4'];
	$correct=$_POST['correct'];
	if (isset($_POST['userID'])) {
    $userID = $_POST['userID'];
} else if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];	}
	
	if (isset($_POST['count'])) {
    $count = $_POST['count'];
} else if (isset($_GET['count'])) {
    $count = $_GET['count'];	}
	
	if($question!=''&&$option1!=''&&$option2!=''&&$option3!=''&&$option4!=''&&$correct!='')
	{
	//modified start...12/9 by ji (one parameter added! : $questionID)
	add_question($test_id,$question,$option1,$option2,$option3,$option4,$correct,$questionID);
	include("../view/add_question.php");
	}
	
	else
	{
	//echo "Fields cannot be empty";
	include("../view/add_question.php");
	}
	}
	else
	{
	include("../view/add_question.php");
	
	}


}


//add started!
	elseif($action=='delete_test')
	{
	if(!empty($_POST['delete_test']))
	{
	$test_id=$_POST['test_id'];
	//echo 'testid:'.$test_id."<br>";
	//echo "i will delete test"."<br>";
	
	//function needs to be written!
	global $db;
	//inserting result.
    $query="delete from test where testID='$test_id'";
    $count_delete=$db->exec($query);

	$query="delete from test_info where testID='$test_id'";
    $count_delete=$db->exec($query);
	
    if ($count_delete>0) {
    	//echo "<script type='text/javascript'>alert('Test has been  deleted successfully !')</script>";
    	//echo "DB update successfully!"."<br>";
    	}
    else {
    		
    	//echo "There might be some DB problem"."<br>";
    }
	
	include("../view/test_modify_info.php");
	}
	
	else
	{
	include("../view/test_modify_info.php");
	
	}
	}
	
	
	elseif($action=='able_test')
	{
	if(!empty($_POST['able_test']))
	{
	$test_id=$_POST['test_id'];
	$able_unable=$_POST['able_test1'];
	//echo 'testid:'.$test_id."<br>";
	//echo 'able_test:'.$able_unable."<br>";
	//echo "i will able/unable test"."<br>";
	
	//function needs to be written!
	global $db;
	//inserting result.
    $query="update test set flag='$able_unable' where testID='$test_id'";
    $count_insert=$db->exec($query);

    if ($count_insert>0) {
    	//echo "<script type='text/javascript'>alert('Test has been successfully added!')</script>";
   // echo "DB update successfully!"."<br>";
	}
    else {//echo "There might be some DB problem"."<br>";
    }
	
	include("../view/test_modify_info.php");
	}
	
	else
	{
	include("../view/test_modify_info.php");
	
	}

	}
	
	elseif($action=='add_test')
	{
	if(!empty($_POST['add_test']))
	{
	$test_id=$_POST['test_id'];
	$testName=$_POST['testName'];
	
	//echo 'testid:'.$test_id."<br>";
	//echo 'testName:'.$testName."<br>";

	global $db;
	
	$query="INSERT INTO test_info( `testID`, `testName`) VALUES ('$test_id','$testName')";
	$result=$db->exec($query);
	if($result>0) {
			 //echo "<script type='text/javascript'>alert('Test has been successfully added!')</script>";
		//echo "db sucessfully updated!"."<br>";
	}
	else {//echo "There might be some DB problem!!"."<br>";
	}
	
	
	
	//function needs to be written!

	
	include("../view/test_add_info.php");
	}
	
	else
	{
	include("../view/test_add_info.php");
	
	}

	}
	
	
	//add ended!
}

?>