<?php

include("dbconnect.php");

session_start();
if(isset($_SESSION['username'])) {
	$user = $_SESSION['username'];
}
else {
	$user = "";
}

if(isset($_SESSION['username'])) {

}
else {
header ("Location: loginrequired.php?u=$user");
}


 session_destroy();

?>

<html>
<p>COMP344 Assignment 1, 2014</p>
<p>Student Name: Cheng Lou</p>
<p>Student ID: 42462274</p>
 <strong><p>You have successfully logged off</p></strong>
 <p><a href="index.php">Back to home</a></p>
</html>