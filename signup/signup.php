<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Omega</title>
        <link href="./signup.css" type="text/css" rel="stylesheet">
    <body>
        <div id="login-box">
            <div class="signupbox">
                <h1>Sign Up</h1>
                <form action="../inc/signup.php" method="Post">
                <input type="text" name="user_name" placeholder="User  Name"/>
                <input type="text" name="first" placeholder="First Name"/>
                <input type="text" name="last" placeholder="Last Name"/>
                <input type="text" name="email" placeholder="Email"/>
                <input type="password" name="pass" placeholder="Password"/>
                <input type="password" name="re_pass" placeholder="Confirm Password"/>
                  <input type="text" name="semester" placeholder="semester"/>
                    <input type="text" name="roll_no" placeholder="roll no"/>

                <input type="submit" name="signup-button" value="Sign-Up"/>

            </div>
            </form>
            <div class="box">
                <span class="signinwith">Sign in with<br>Social Network</span>
                <button class="social facebook">Login with Facebook</button>
                <button class="social twitter">Login with Twitter</button>
                <button class="social google">Login with Google+</button>
            </div>
            <div class="or">OR</div>
        </div>
       <?php
            if(!isset($_GET['signup'])){
                exit();
            }
            else
            {
                $signupChk = $_GET['signup'];
                if($signupChk=="empty")
                {
                    echo "<script>";
                    echo "alert('fill all the forms')";
                    echo "</script>";
                }
                else if($signupChk=="pass-wrong")
                {
                    echo "<script>";
                    echo "alert('Re-check your password')";
                    echo "</script>";
                }
                else if($signupChk=="emailerror"){
                    echo "<script>";
                    echo "alert('Email is not valid ')";
                    echo "</script>";
                }
                else if($signupChk=="same_username"){
                    echo "<script>";
                    echo "alert('Username is same! Choose another username ')";
                    echo "</script>";
                }

                else if($signupChk=="success"){
                    echo "<script>";
                    echo "alert('You have sucessfully signed Up !! ')";
                   // echo "alert('Please log in to continue !! ')";
                    echo "</script>";
                }
            }

       ?>

    </body>
</head>
</html>
