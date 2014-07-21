<?php
include("../model/database.php");
include("../model/result.php");
include("../model/database.php");
include("../model/user_info.php");
include("../model/test_table.php");


$testids=get_testids();



if (isset($_POST['userID'])) {
    $userID = $_POST['userID'];
	
} else if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];
    
	}
	if (isset($_POST['message'])) 
    $message = $_POST['message'];
	
 else if (isset($_GET['message']))
    $message = $_GET['message'];
else 
    $message = "";
	
	if (isset($_POST['count'])) {
    $count = $_POST['count'];
	
} else if (isset($_GET['count'])) {
    $count = $_GET['count'];
	}

	include("../view/user_header.php");
	
	$user_info=get_user1($userID);
	$testtype_count=get_testtype_count();
	
	if (isset($_POST['action']))
{ 
    $action = $_POST['action'];
	
}
	
 else if (isset($_GET['action']))
{ 
    $action = $_GET['action'];
	
}
	 
else 
{
    $action = 'normal_user';
}



switch($action)
	{
    case 'normal_user':
	    update_login($userID,1);
        include("../view/user_welcome.php");
        break;
	case 'edit_profile':
	include("../view/update_user_profile.php");
	break;
	case 'user_profile_info':
	include("../view/user_profile_info.php");
	break;
	case 'save_user':
	include("../model/register_validation.php");
	break;
	case 'start_test':
	include("../view/start_test.php");
	break;
	case 'start':
	$testtype=$_GET['testtype'];
	include("../view/test_index.php");
	break;
	
	//12.11 JI
	case 'test':
	$testtype=$_POST['testtype'];
	$display_count=$_POST['display_count'];
	$selected_option=$_POST['selected_option'];
	$correct=$_POST['correct'];
	
if (isset($_POST['score1'])) {
    $score1 = $_POST['score1'];
} else if (isset($_GET['score1'])) {
    $score1 = $_GET['score1'];}

if (isset($_POST['selected_option'])) {
    $selected_option = $_POST['selected_option'];
} else if (isset($_GET['selected_option'])) {
    $selected_option = $_GET['selected_option'];}

if (isset($_POST['correct'])) {
    $correct = $_POST['correct'];
} else if (isset($_GET['correct'])) {
    $correct = $_GET['correct'];}	


if (isset($_POST['testtype'])) {
    $testtype = $_POST['testtype'];
} else if (isset($_GET['testtype'])) {
    $testtype = $_GET['testtype'];}
	

if (isset($_POST['userID'])) {
    $userID = $_POST['userID'];
} else if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];	}
	

if (isset($_POST['password'])) {
    $passwd = $_POST['password'];
} else if (isset($_GET['password'])) {
    $passwd = $_GET['password'];	}

if (isset($_POST['display_count'])) {
    $display_count = $_POST['display_count'];
} else if (isset($_GET['display_count'])) {
    $display_count = $_GET['display_count'];	}	
	
if (isset($_POST['i1'])) {
    $i1 = $_POST['i1'];
} else if (isset($_GET['i1'])) {
    $i1 = $_GET['i1'];	}	
	
	
if (isset($_POST['rnd_number_implode'])) {
    $rnd_number_implode = $_POST['rnd_number_implode'];
} else if (isset($_GET['rnd_number_implode'])) {
    $rnd_number_implode = $_GET['rnd_number_implode'];	}
	
	include("../view/test_test.php");
	break;
	
	
	
	case 'logout':
	header("Location:logout.php?userID=$userID&count=$count&testtype=$testtype");
		break;
		
	
	
	
	}
?>
