<?php

function get_allusers_avg()
{
 global $db;
 $query="select AVG(score) as avg from result";
 $result=$db->query($query);
 $result=$result->fetch();
 
 return $result['avg'];
}

function total_users_passed()
{
global $db;
$query="select count(*) as num from (select userID,AVG(score) from result group by userID having AVG(score) >=8) a";
 $result=$db->query($query);
 $result=$result->fetch();
 return $result['num'];
}

function total_users_notpassed()
{
global $db;
$query="select count(*) as num from (select userID,AVG(score) from result group by userID having AVG(score) <8) a";
 $result=$db->query($query);
 $result=$result->fetch();
 return $result['num'];
}

function get_allresults()
{
global $db;
$query="select * from result";
 $result=$db->query($query);
 return $result;
}


function get_result($userid)
{
global $db;
$query="select * from result where userID='$userid' order by score";

 $result=$db->query($query);
 return $result;
}

function get_testattempts($userid)
{
global $db;
$query="select count(*) as num from result where userID='$userid'";
 $result=$db->query($query);
 $result=$result->fetch();
 return $result['num'];
}
function get_scorebydate($userid,$date)
{
global $db;
$query="select score from result where userID='$userid' and date='$date';";
 $result=$db->query($query);
 return $result;
}

function get_maxscore($userid)
{
global $db;
$query="select MAX(score) as maximum from result where userID='$userid';";
$result=$db->query($query);
 $result=$result->fetch();
 return $result['maximum'];
}


function get_minscore($userid)
{
global $db;
$query="select MIN(score) as minimum from result where userID='$userid';";
$result=$db->query($query);
 $result=$result->fetch();
 return $result['minimum'];
}



/*
//avg score of each user 
$query="select userID,AVG(score) from result group by userID";

//avg score of all users 
$query="select AVG(score) from result"


//avg score of each user successfully passed test
$query="select userID,AVG(score) from result group by userID having AVG(score) >=8";

//count of the users successfully passed test
$query="select count(*) from (select userID,AVG(score) from result group by userID having AVG(score) >=8) a";

//count of the users failed test
$query="select count(*) from (select userID,AVG(score) from result group by userID having AVG(score) <8) a";


//count of test attempts of each user
$query = "select userID,count(*) from result group by userID"

//all test scores of a particular user
$query = "select score from result where userID='$user_id'";

//all test scores of a particular user
$query = "select MAX(score) from result where userID='$user_id'";

//all test scores of a particular user
$query = "select MIN(score) from result where userID='$user_id'";

//highest score of all users displayed
$query="select userID,MAX(score),MIN(score) from result group by userID order by userID

*/


?>