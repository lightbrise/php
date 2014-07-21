<?php

function get_user1($userid)
{
global $db;
$query = "select * from user where userID='$userid';";
$result=$db->query($query);
$res=$result->fetch();
return $res;
}

function get_user2($email)
{
global $db;
$query = "select * from user where email='$email';";
$result=$db->query($query);
$res=$result->fetch();
return $res;
}

function get_usertype($userid)
{
global $db;
$query = "select usertype from user where userID='$userid';";
$result=$db->query($query);
$res=$result->fetch();
$usertype=$res['usertype'];
return $usertype;
}

function get_allusers()
{
global $db;
$query = "select * from user where usertype=2 ;";
$result=$db->query($query);
return $result;
}
function save_user($first_name,$last_name,$user_id,$email,$password,$phoneNo,$address)
{
global $db;
$query="update user set first_name='$first_name',last_name='$last_name',email='$email',password='$password',address='$address',phone_number='$phoneNo' where userID='$user_id'";
//echo $query;
$result=$db->exec($query);
return $result;
}


function insert_user($first_name,$last_name,$user_id,$email,$password,$phoneNo,$address)
{
global $db;
$query="insert into user values('$user_id','$email','$password','$first_name','$last_name','$address','$phoneNo','2',0)";
$result=$db->exec($query);
return $result;
?>


<?php
}

//added...
function update_login($user_id,$login)
{
global $db;
$query="UPDATE user SET login='$login' WHERE userID='$user_id'";

$result=$db->exec($query);


return $result;

}


