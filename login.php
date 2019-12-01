<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<body style="background-color:orange">
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: index.html");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<div class="form">
<h1>Log In</h1>
<div align= "center">
<form action="" method="post" name="login" align="center" style="background-color:cornflowerblue; width:30%; border-radius:40%;border-color:black;"  ><br></br>
<input type="text" name="username" placeholder="Username" required /><br></br>
<input type="password" name="password" placeholder="Password" required /><br></br>

<input name="submit" type="submit" value="Login" /><br></br>
</form><iframe width="353" height="280" float="center" src="https://www.youtube.com/embed/klQovs_TnjY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
</div>
<p align="center">Not registered yet? <a href='register.php'>Register Here</a></p>

</div>
<?php } ?>
</body>
</html>
