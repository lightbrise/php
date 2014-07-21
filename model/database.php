<?php

$dsn='mysql:host=localhost;dbname=quiz_buzz_1';
$username="root";
$password="";
try
{
$db=new PDO($dsn,$username,$password);

}
catch(PDOException $e)
{
$errormessage=$e->getMessage();
echo $errormessage;
exit();
}


?>