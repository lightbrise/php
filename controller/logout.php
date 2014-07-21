
<?php
include("../model/database.php");
include("../model/user_info.php");



echo "</br>"."</br>";

if (isset($_POST['userID'])) {
    $userID = $_POST['userID'];
} else if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];	}
	
	
	
		if (isset($_POST['count'])) {
    $count = $_POST['count'];
	echo "count  ".$count;
} else if (isset($_GET['count'])) {
    $count = $_GET['count'];
	echo "count  ".$count;
	}
	
	
echo "</br>"."</br>";
	echo "logout ".$userID." ";
	

echo "</br>"."</br>";	
	$count=update_login($userID,'0');
	
	
echo "</br>"."</br>";
	echo "logout count ". $count;
	
	
	header("Location:../index.php");
	
	?>
	
