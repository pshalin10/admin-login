<?php
session_start();

$username = "user";
$password = "password";
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
	header("Location: success.php");
}

if(isset($_POST['username']) && isset($_POST['password'])){
	if ($_POST['username']== $username && $_POST['password']== $password)
	{
		$_SESSION['loggedin'] = true;
		header("Location: success.php");
	}
	
}

?>

<html>
<body>
<form method="post" action="success.php">
  <div class="imgcontainer">
  <title>Kean Career Services</title>
  <center>
    <img src="keanlogo.png" alt="Avatar" class="avatar" width="100" height="100">
	<body background="background.jpg">
  </div>
  <center>
  <div class="container">
  <p>
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required></p>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
     <p>
    <button type="submit">Login</button></a></p>
    <input type="checkbox" checked="checked"> Remember me
    <p><span class="psw">Forgot <a href="#">password?</a></span></p>
  </div>
  </center>
  </body>
</form>
</html>