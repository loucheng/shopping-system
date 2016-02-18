<?php 

include("dbconnect.php"); 

$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$password=$_POST["password"];
$streetno=$_POST["streetno"];
$streetname=$_POST["streetname"];
$state=$_POST["state"];
$postcode=$_POST["postcode"];
$creditcard=$_POST["creditcard"];

$Vem = oci_parse($conn,"SELECT email FROM users WHERE email = '$email'");
oci_execute($Vem);
while (($row = oci_fetch_array($Vem))){
}
$Vem = oci_num_rows($Vem);

$Veu = oci_parse($conn,"SELECT email FROM valid_users WHERE email = '$email'");
oci_execute($Veu);
while (($row = oci_fetch_array($Veu))){
}
$Veu = oci_num_rows($Veu);

if ($firstname && $lastname && $email && $password && $streetno && $streetname && $state && $postcode && $creditcard) {
if($Veu == 1) {
if($Vem == 0) {
if (strlen($postcode) == 4) {
if (strlen($creditcard) == 10) {
  
  $bbsSQL = "INSERT INTO users (FIRSTNAME, LASTNAME, EMAIL, PASSWORD, STREETNO, STREETNAME, STATE, POSTCODE, CREDITCARD) VALUES ('$firstname', '$lastname', '$email', '$password', '$streetno', '$streetname', '$state', '$postcode', '$creditcard')"; 
  
  $personinfo=oci_parse($conn,$bbsSQL); 
  oci_execute($personinfo); 


  oci_free_statement($personinfo);
  oci_close($conn);  
  
$from = "cheng.lou@students.mq.edu.au";
$to = $email;
$subject = "Account confirmation";
$message = "Your name is ".$firstname." ".$lastname. " Your username is " .$email.						
							
" You can now login at http://spider.science.mq.edu.au/mqauth/42462274/login.php". 
" COMP 344 Assignment 1, 2014, Cheng Lou, 42462274";
$headers = "From: " . $from;
mail($to, $subject, $message, $headers);
header("Location: emailconfirmation.php");		

}
else {
echo "Creditcard number requires 10 digits";
}
}
else {
echo "Postcode requires 4 digits";
}	
}
else { 
echo "Email already registered";
}
}
else {
echo "Not an authorised user";
}
}
else {
echo "Missing form data";
}						

?>
<html>
<p>COMP344 Assignment 1, 2014</p>
<p>Student Name: Cheng Lou</p>
<p>Student ID: 42462274</p>
<p><a href="registration.php">Please try again</a></p>
</html>