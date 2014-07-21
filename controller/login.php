
<?php 
include("../model/database.php");
include("../model/user_info.php");
include("../model/test_table.php");
if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
} else if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];	}
	
	
if (isset($_POST['password'])) {
    $passwd = $_POST['password'];
} else if (isset($_GET['password'])) {
    $passwd = $_GET['password'];	}

	


echo "</br>"."</br>";

$user_info=get_user1($userid);
$user_type=$user_info['usertype'];;
$user_ID=$user_info['userID'];



if(($user_ID)!='' )
	{
	//$email=$user_info['email'];
	//$firstname=$user_info['first_name'];
	$psword=$user_info['password'];
	if(($passwd !='') && ($passwd== $psword))
		{
		$count=update_login($userid,1);
		echo "login count ".$count;
		
	
			header("Location:normal_user.php?userID=$user_ID&count=$count&action=normal_user");
			
		}
			else
			{
		
			header("Location:../index.php?message=Password wrong.Try again");
		
			}
	}
	
	
else
{
echo "User id does not exist.Please register ";
header("Location:../index.php?message=User id does not exist.Please register!!!");

}
	


?>


</div>