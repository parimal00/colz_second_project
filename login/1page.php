<!DOCTYPE html>
<html>
      <head>
        <title>Omega</title>
        <link href="./1page.css" type="text/css" rel="stylesheet">
        <body>
            <div class="login" id="lo">
                <img src="1page.png" class="loginbox" >
                <h1> Login Here </h1>
                <form class="protal" method="POST" action="../inc/login.php">
                    <p>Username</p>
                    <input type="text" name="username" placeholder="Enter Username">
                    <p>Password</p>
                    <input type="password" name="pass" placeholder="Enter Password"><br>
                    <input type="submit" name="submit" value="Login"><br>
                    <a href="#">Forget Your Password</a><br>
                    <a href="file:///C:/Users/Sandeep/Documents/Online%20Library/page1/signup.html">New To Omega (Create New Account)</a>
                </form>
                </div>
                <?php
 if(!isset($_GET['login'])){
    exit();
}
else
{
    $signupChk = $_GET['login'];
    if($signupChk=="empty"){
        echo "<script>";
        echo "alert('fill all the forms')";
        echo "</script>";
    }
    else if ($signupChk=="NoUser"){
        echo "<script>";
        echo "alert('Username or Password is Incorrect')";
        echo "</script>";
    }
    else if($signupChk=="NotApproved"){
      echo "<script>";
      echo "alert('Wait till you get approved')";
      echo "</script>";
    }
}
                ?>

        </body>
     </head>
</html>
