<?php
?>


<?php
//include("database.php");
//include("user_info.php");
//include("../view/register.php");
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$user_id=$_POST['user_id'];
$email=$_POST['email'];
$password=$_POST['password'];
$phoneNo=$_POST['phoneNo'];
$address=$_POST['address'];
$action=$_POST['action'];
echo "password FROM POST:".$password."<BR>";

switch($action)
{
//setting some variables for checking validation
case 'register_user':

include("database.php");
include("user_info.php");
$valid_user_id="valid";

$duplicate_user1=get_user1($user_id);
$db_userid=$duplicate_user1['userID'];
$duplicate_user2=get_user2($email);
$db_emailid=$duplicate_user2['email'];
echo "</br>";
//deleted validations.new version
//check if user id already exists
if($db_userid!=''||$db_emailid!='')
{
echo "User already exists.Please register";
$valid_user_id="invalid";
header("Location:../index.php?message=User already exists.Please register");
echo "</br>";
}


if( $valid_user_id=="valid" )
{
echo "password IN VALIDATION:".$password."<BR>";
$result=insert_user($first_name,$last_name,$user_id,$email,$_POST['password'],$phoneNo,$address);
if($result==1){
header("Location:../index.php?message=You have registered successfully ,Login here");

}}
else
{
?>

<h3><font color="red">Please register again</font> </h3>
<?php
}
break;
case 'save_user':
$result=save_user($first_name,$last_name,$user_id,$email,$password,$phoneNo,$address);
//if($result==1)
header("Location:normal_user.php?userID=$userID&count=$count&action=normal_user&message=$message");

break;
}
?>
</div>
</body>