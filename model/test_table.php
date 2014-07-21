<?php

//added 12.11
function get_test_name($test_id){
global $db;
$query="SELECT testName FROM test_info
        WHERE (testID='$test_id')";
$testName=$db->query($query);	
$testName=$testName->fetch();
$testName=$testName['testName'];
return 	$testName;
}

//how many testtypes ex)test1,test2,test3...->3
function get_max_testID_count()
{
global $db;

$query="SELECT max(testID) FROM test_info";
$testtype_quiz=$db->query($query);
$testtype_quiz=$testtype_quiz->fetch();
$testtype_quiz=$testtype_quiz[0];
return $testtype_quiz;

}

//added..12.9...just counting normal users who are log-in!
function total_users_currently_writing()
{
global $db;
$query="SELECT count(*) as total_user_login FROM user WHERE login='1' and usertype='2'";
 $result=$db->query($query);
 $result=$result->fetch();
 return $result['total_user_login'];
}



//12.10 modified by ji  
function get_testids()
{
global $db;
$query="SELECT testName,testID FROM test_info;";
 $result=$db->query($query);
 return $result;
}

function get_all_questions($test_id)
{
global $db;
$query="SELECT *   FROM test where testID='$test_id';";
 $result=$db->query($query);
 return $result;
}

function get_question($test_id,$question_id)
{
global $db;
$query="SELECT *  FROM test where testID='$test_id'and questionID='$question_id';";
 $result=$db->query($query);
 $result=$result->fetch();
 return $result;
}

function delete_question($test_id,$question_id)
{
global $db;
$query="Delete  FROM test  where testID='$test_id' and questionID='$question_id';";
 $result=$db->exec($query);
 
}

function get_questions_count($test_id)
{
global $db;
$query="SELECT count(*) as num  FROM test where testID='$test_id' ;";
 $result=$db->query($query);
$result=$result->fetch();
 return $result['num'];
}

function modify_question($test_id,$question_id,$question,$option1,$option2,$option3,$option4,$correct)
{
global $db;
$query="Update  test set question='$question',option1='$option1',option2='$option2',option3='$option3',option4='$option4',correct='$correct' where testID='$test_id' and questionID='$question_id';";
 $result=$db->exec($query);
 
}

//modified start...12/9 by ji (one parameter added! : $questionID) cause $questionID can not be auto-incremeted! 
function add_question($test_id,$question,$option1,$option2,$option3,$option4,$correct,$questionID)
{
global $db;
$query="insert into  test(question,option1,option2,option3,option4,correct,testID,flag,questionID) values('$question','$option1','$option2','$option3','$option4','$correct','$test_id','1',$questionID);";
 $result=$db->exec($query);
 
}

//added

//How many questions in test1 or test2
function get_max_questionID($testtype)
{
global $db;
$query="SELECT max(DISTINCT questionID) FROM test
        WHERE (testID='$testtype')";
$max_questionID=$db->query($query);
$max_questionID=$max_questionID->fetch();
$max_questionID=$max_questionID[0];
return $max_questionID;
}
//testype:1, $count_quiz:21 if there is no questionID 6,11
function get_all_questionID($testtype,$max_questionID)
{
global $db;
for($i=1;$i<=$max_questionID;$i++){
$query="SELECT questionID FROM test
        WHERE (testID='$testtype') and questionID=$i";
$question_id=$db->query($query);

$question_id=$question_id->fetch();
$question_id=$question_id[0];
$arr_questionID[$i]=$question_id;

}
//remove the empty elements
for ($i=0; $i<=count($arr_questionID); $i++)
  {
    if (empty($arr_questionID[$i])) unset($arr_questionID[$i]);
  }


return $arr_questionID;
}


//get status test... unabled:0,enabled:1 
function get_flag_status_test($testtype)
{
global $db;
$query="SELECT DISTINCT flag as flag FROM test
        WHERE (testID='$testtype')";
$flag=$db->query($query);
$flag=$flag->fetch();
$flag=$flag['flag'];
return $flag;
}




//how many testtypes ex)test1,test2,test3...->3
function get_testtype_count()
{
global $db;

$query="SELECT max(DISTINCT testID) FROM test";
$testtype_quiz=$db->query($query);
$testtype_quiz=$testtype_quiz->fetch();
$testtype_quiz=$testtype_quiz[0];
return $testtype_quiz;


}
//randomly picked 10 questions... 
function get_random($max_questionID,$all_questionID)
{
//$numbers = range(1, $count_quiz);
shuffle($all_questionID);
$count_quiz=count($all_questionID);

$rnd_count=($count_quiz>=10)?10:$count_quiz;

$number_rand=array_rand($all_questionID,$rnd_count);


for ( $i=0;$i<$rnd_count;$i++)
{
 $randnum[$i]=$all_questionID[$number_rand[$i]] ;
}

return $randnum;
}






function update_result($score,$userID,$testtype)
{

global $db;
//for generating testNO..
$query="SELECT max(testNO) FROM result
        WHERE (userID='$userID') && testID='$testtype'";
$testNO=$db->query($query);
if($testNO !=''){ 
$testNO=$testNO->fetch();
$testNO=$testNO[0];
$testNO=$testNO+1;}
else{$testNO='1';}

//get today's date
$date1=date('Y-m-d');
//echo $date1;

//inserting result.
$query="INSERT INTO `result`( `userID`, `score`, `testID`, `testNO`, `date`) 
        VALUES ('$userID',$score,'$testtype','$testNO','$date1')";
$count_insert=$db->exec($query);

if ($count_insert>0) {
//echo "DB update successfully!"."<br>";
}
else {
//echo "There might be some DB problem"."<br>";
}
}

?>