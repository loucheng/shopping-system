<?php
include("dbconnect.php");

session_start();
if(isset($_SESSION['username'])) {
	$user = $_SESSION['username'];
}
else {
	$user = "";
}

if(!isset($_SESSION['username'])) {
	echo "";
}
else {
	header ("Location: loginconfirm.php?u=$user");
}
?>

 <html>
 <head>
 <link href="styles.css" rel="stylesheet" />
 <title>Registration</title>

<script type="text/javascript">
function validate() {

 em = document.register.email.value;
 pc = document.register.postcode.value;
 cc = document.register.creditcard.value;
 fn = document.register.firstname.value;
 ln = document.register.lastname.value;
 p1 = document.register.password.value;
 p2 = document.register.pass.value; 

    var Vem = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
    var Vpw = /(?=.*\d)(?=.*[a-z]).{6,}/;
    if (Vem.test(em)) {
        if (em.indexOf('@students.mq.edu.au', em.length - '@students.mq.edu.au'.length) !== -1 ){ 
          
        } 
   else if (em.indexOf('@mq.edu.au', em.length - '@mq.edu.au'.length) !== -1 ) {
   }
 else {            alert('Must enter a MQ email).');
return false;
}
}
 else {
alert('Not a valid e-mail address.');
return false;
    }
if (p1 == p2) {
}
 else {
alert('Passwords do not match.');
return false;
}
if (Vpw.test(p1)) {
}
 else {
alert('Password must contain six characters including at least 1 digit');
return false;
}
    if (p1.length == 6) {
}
 else {
alert('Password must be exactly six characters long');
return false;
}
    if (pc.length == 4) {
}
 else {
alert('not a valid postcode.');
return false;
}
if (cc.length == 10) {
}
 else {
alert('credit card value must be 10 digits.');
return false;
}
}

 </script>
 </head>
 <body>
 <div id="menu">
 <ul>
 <li><a href="index.php">Home</a></li>
 <li><a href="login.php">Login</a></li>
 <li><a href="registration.php">Register</a></li>
 <li><a href="productinfo.php">Product</a></li>
 <li><a href="logout.php">Logout</a></li>
 </ul>
 </div>

<p>COMP344 Assignment 1, 2014</p>
<p>Student Name: Cheng Lou</p>
<p>Student ID: 42462274</p>

 <h2>Registration</h2>

<form name="register" action="process.php" onsubmit="return validate()" method="post">
<fieldset >
First Name: <input type="text" name="firstname" maxlength="50" required>
Last Name: <input type="text" name="lastname" maxlength="50" required>
<p>
MQ Email: <input type="email" name="email" maxlength="50" required>
Password: <input type="password" name="password" maxlength="50" required>
Confirm Password: <input type="password" name="pass" maxlength="50" required>
</p>
Street No: <input type="number" name="streetno" maxlength="10" required>
Stree Name: <input type="text" name="streetname" maxlength="50" required>

State:<select required name="state">
    <option value="NSW">NSW</option>
    <option value="VIC">VIC</option>
    <option value="QLD">QLD</option>
    <option value="WA">WA</option>
    <option value="SA">SA</option>
    <option value="NT">NT</option>
    <option value="TAS">TAS</option>
 </select>

Post Code: <input type="number" name="postcode" maxlength="4" required>
<p>
Credit Card: <input type="number" name="creditcard" maxlength="10" required> 
</p>

<p><button type="reset" value="Reset">Reset</button>
<input type='submit' name='Submit' value='Submit' />
</p>

</fieldset>
</form>

 </body>
 </html> 