<?php

if (isset($_POST['testtype'])) {
    $testtype = $_POST['testtype'];
} else if (isset($_GET['testtype'])) {
    $testtype = $_GET['testtype'];}
	

if (isset($_POST['userID'])) {
    $userID = $_POST['userID'];
} else if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];	}
	

//IF successfully log in-> login:1
// IF logout button clicked -> login : 0
//for counting currently writing user..
update_login($userID,1);	
		
//max_questionID : how many test type are there? <ex>php, android, ios -> 3
$max_questionID=get_max_questionID($testtype);	
$all_questionID=get_all_questionID($testtype,$max_questionID);
$rnd_numbers =get_random($max_questionID,$all_questionID); 
$rnd_number_implode=$rnd_numbers;
$display_count=(count($all_questionID)>=10)?10:count($all_questionID);

$rnd_number_implode=implode('|',$rnd_number_implode);

//how many times quiz displayed!
$i1=0;
$score1=0;

include("../view/test_test.php");
