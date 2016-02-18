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

?>

<html>
 <head>
 <link href="styles.css" rel="stylesheet" />
 <title>Login</title>
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

<br>
<table style="width:100%">
  <tr>
    <td>Product 1</td>
    <td>Book 1</td>		
    <td>Name 1</td>
  </tr>
  <tr>
    <td>Product 2</td>
    <td>Book 2</td>		
    <td>Name 2</td>
  </tr>
  <tr>
    <td>Product 3</td>
    <td>Book 3</td>		
    <td>Name 3</td>
  </tr>
</table>
</body>
</html>
