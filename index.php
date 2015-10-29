<?php
include('login.php'); // Includes Login Script
 
if(isset($_SESSION['login_user']))
{ 
    // here the session is checked. If session is filled, the user is logged-on
    //so, we redirect the user to the profile page
    header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
    <body>
        <div id="main">
            <div id="login">
            <h2>User Login</h2>
                <form action="" method="post">
                    <label>UserName :</label>
                    <input id="email" name="email" placeholder="email" type="text">
                    <label>Password :</label>
                    <input id="pass" name="pass" placeholder="**********" type="password">
                    <input name="submit" type="submit" value=" Login ">
                    <span><?php echo $error; ?></span>
                    <br />
                    <p> 
                        You can login or register if you don't have a user:
                        </p>
                        <br />
                        <a href="register.html">Register</a>
                         
                </form>
            </div>
        </div>
    </body>
</html>
