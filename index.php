<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Omega</title>
      <link rel="stylesheet" href="menus.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>

      <div class="wrapper">
            <header>
                    <video autoplay loop class="video-background" muted plays-inline>
                            <source src="sandeep.mp4" type="video/mp4">

                        </video>

                  <nav>

                        <div class="menu-icon">
                              <i class="fa fa-bars fa-2x"></i>
                        </div>

                        <div class="logo">
                              O M E G A
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="Developer/developer.html">Developer</a></li>
                                    <li><a href="ContactForm/contact.php">Contact</a></li>
                                    <li><a href="phplms/phplms/accountant/login.php">Accountant</a></li>
                                    <li><a href="phplms/phplms/librarian/login.php">Librarian</a></li>
                                    <li><a href="phplms/phplms/admin/login.php">Admin</a></li>
                              </ul>
                        </div>
                  </nav>
                </header>
                <div class="contents">
                        <h1>O M E G A</h1>
                        <a href="login/1page.php">  <button id="first">Login</button></a>
                     <a href="signup/signup.php">  <button id="second"> SignUp </button></a>
                  </div>
                  <?php
      $urlCheck= $_GET['signup'];
       if($urlCheck=="success"){
            echo "<script>";
            echo "alert('You have sucessfully signed Up !! Please log in to continue ')";

            echo "</script>";
            header("Location: index.php");
        }
        ?>


            <div class="content">
                  <p>



                  </p>
            </div>
      </div>

      <script type="text/javascript">

      // Menu-toggle button

      $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })



</body>
</html>
