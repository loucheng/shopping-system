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


$logincon = $conn;

if (isset($_POST["username"]) && isset($_POST["loginpass"])) {
	$username = $_POST['username'];
	$loginpass = $_POST['loginpass'];
	
	$query = "SELECT * FROM users WHERE email = '$username' AND password = '$loginpass'";
	$checkdb = oci_parse($logincon,$query);
	oci_execute($checkdb);
	while(($row = oci_fetch_array($checkdb))){
	}
	if (oci_num_rows($checkdb) == 1) {
		$_SESSION['username'] = $username;
		$_SESSION['loginpass'] = $loginpass;
	    header ("Location: index.php?u=$username");
	}
	else {
		echo "Incorrect login";
	}
	
}
?>
 <html>
 <head>
 <link href="styles.css" rel="stylesheet" />
 <title>Login</title>

<script type="text/javascript">
function validate() {

un = document.login.username.value;

     var Vun = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
    if (Vun.test(un)) {
        if (un.indexOf('@students.mq.edu.au', un.length - '@students.mq.edu.au'.length) !== -1 ){            
        } 
   else if (un.indexOf('@mq.edu.au', un.length - '@mq.edu.au'.length) !== -1 ) {
   }
 else {            alert('Must enter a MQ email).');
return false;
}
}
 else {
alert('Not a valid e-mail address.');
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

 <h2>Login</h2>

 <form method="post" action="login.php" onsubmit="return validate()">
    <p>MQ Email: <input type="email" name="username" maxlength="50" required></p>
    <p>Password: <input type="password" name="loginpass" maxlength="50" required></p>
      <class="submit"><input type="submit" name="commit" value="Login">
    </form>  

 <p>Don't hve an account? <a href="registration.php">Click here to register</a>.</p>

  </section>

 </body>
 </html> 