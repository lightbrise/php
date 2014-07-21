<?php


$testName=get_test_name($testtype);
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
	
$rnd_numbers=explode('|',$rnd_number_implode);

//score!!
if((isset($correct))&&(isset($selected_option))&($correct==$selected_option)){$score1++;}


//get question,option,correct from database trim($rnd_numbers[$i1])

if($i1<$display_count){

$quiz=get_question($testtype,trim($rnd_numbers[$i1]));
$question=$quiz['question'];
$option1=$quiz['option1'];
$option2=$quiz['option2'];
$option3=$quiz['option3'];
$option4=$quiz['option4'];
$correct=$quiz['correct'];

//display part
$j=$i1+1;


//validation for radio button  if unselected! ?>
<script type="text/javascript">
function validate()
{
  var retval = false;
  for (var i=0; i < document.myForm.r.length; i++)
  {
    if (document.myForm.r[i].checked)
    {
      retval = true;  
    }
  }  
   
   if(retval==false) alert('Plz choose option!');
   return retval;
}
</script>
<?php


?>

<form name="myForm" action="normal_user.php" onsubmit="return validate()" method="post">
	<h2 class="submission" > <?php echo " " .$testName."<br>";?> </h2>

<legend><b><h3><?php echo "<br> ".$j.". ".$question."<br>";?></b></h3> </legend>

<input type="radio" name="selected_option" id="r" value="<?php echo '1';?>" /> 
       <?php echo $option1;?> <br />
<input type="radio" name="selected_option" id="r" value="<?php echo '2';?>"/>  
       <?php echo $option2;?><br />
<input type="radio" name="selected_option" id="r" value="<?php echo '3';?>"/> 
       <?php echo $option3;?> <br />
<input type="radio" name="selected_option" id="r" value="<?php echo '4';?>"/>  
       <?php echo $option4;?> <br />	 

 <input type="hidden" name="correct" value="<?php echo $correct;?>"/>
 <input type="hidden" name="score1" value="<?php echo $score1;?>"/>

 <input type="hidden" name="userID" value="<?php echo $userID;?>"/>	   
<input type="hidden" name="testtype" value="<?php echo $testtype;?>"/>
<input type="hidden" name="password" value="<?php echo $passwd;?>"/>
<input type="hidden" name="display_count" value="<?php echo $display_count;?>"/>
<input type="hidden" name="action" value="test"/>	
<input type="hidden" name="i1" value="<?php echo $j;?>"/>
<input type="hidden" name="rnd_number_implode" value="<?php echo $rnd_number_implode;?>"/>
<input type="hidden" name="count" value="<?php echo $count;?>"/>
<label>&nbsp;</label>


 <br>


<button class="btnExample" type="submit" value="Submit"/>NEXT</button>
 <p class="col"> Current Score:<?php echo " " .$score1."<br>";?></p>
 <p > <a href="../controller/normal_user.php?userID=<?php echo $userID;?>&count=<?php echo $count;?>&action=start_test" >Select other Test!</a><p> 

 	</div>	
	</form>
	
	</body>	
</html>
<?php } 

else {


?>


<script type="text/javascript">
    var myScore = <?php echo json_encode($score1); ?>;
	var mytestName=<?php echo json_encode($testName); ?>;
</script>
<?php

?>
<br><br>
<p>Your Score Is: <b><?php echo " ".$score1;?></b></p><br>
<?php
if($score1>=8)
 { ?>
<p>You have successfully passed the test.You are certified in <b><?php echo " ".$testName.".";?></b></p><br><?php
}
else if($score1<8) { ?>
<p>Unfortunately you did not pass the test <b><?php echo " ".$testName.".";?></b> Please try again!!</p><br><?php
}


//update_result function
$db_result=update_result($score1,$userID,$testtype);
if( $score1>=8 ) 
        echo "<script type='text/javascript'>alert('Your Score is: '+myScore+'. '+'Congratulation!!You have successfully passed!')</script>";
      else
        echo "<script type='text/javascript'>alert('Your Score is: '+myScore+'. '+'Failed!')</script>";
		
//update login :0...writing ended!
update_login($userID,0);

?>

<form action="normal_user.php" method="post">
<input type="hidden" name="userID" value="<?php echo $userID;?>"/>	   
<input type="hidden" name="testtype" value="<?php echo $testtype;?>"/>
<input type="hidden" name="password" value="<?php echo $passwd;?>"/>
<input type="hidden" name="action" value="normal_user"/>	
<input type="hidden" name="count" value="<?php echo $count;?>"/>
<input type="hidden" name="action" value="start_test"/>

<label>&nbsp;</label>

 
<p class="submission"><button class="btnExample" type="submit" value="Submit"/>CONTINUE</button></p>
<?php 
}



?>

<img id="beeimg"  src="../images/buzz.jpg">
		<div id="glow"></div>

	




	

