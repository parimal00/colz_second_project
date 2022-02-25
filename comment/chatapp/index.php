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
                              OMEGA
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="Developer/developer.php">Developer</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="ContactForm/contact.php">Contact</a></li>
                              </ul>
                        </div>
                  </nav>
                </header>
                <div class="contents">
                        <h1>Omega:Your Personal Library</h1>
                        <a href="login/1page.php">  <button id="first">Login</button></a>
                     <a href="signup/signup.php">  <button id="second"> SignUp </button></a> 
                  </div>
                  <?php
      $urlCheck= $_GET['signup'];
       if($urlCheck=="success"){
            echo "<script>";
            echo "alert('You have sucessfully signed Up !! Please log in to continue ')";
          
            echo "</script>";
            
        }
        ?>


            <div class="content">
                  <p>
                        <h1>History of Library</h1><br>   
                        In earliest times there was no distinction between a record room (or archive) and a library, and in this sense libraries can be said to have existed for almost as long as records have been kept. A temple in the Babylonian town of Nippur, dating from the first half of the 3rd millennium BC, was found to have a number of rooms filled with clay tablets, suggesting a well-stocked archive or library.<br> Similar collections of Assyrian clay tablets of the 2nd millennium BC were found at Tell el-Amarna in Egypt. Ashurbanipal (reigned 668–c. 627 BC), the last of the great kings of Assyria, maintained an archive of some 25,000 tablets, comprising transcripts and texts systematically collected from temples throughout his kingdom.<br>
                        Many collections of records were destroyed in the course of wars or were purposely purged when rulers were replaced or when governments fell. In ancient China, for example, the emperor Shih huang-ti, a member of the Ch’in dynasty and ruler of the first unified Chinese empire, ordered that historical records other than those of the Ch’in be destroyed so that history might be seen to begin with his dynasty. Repression of history was lifted, however, under the Han dynasty, which succeeded the Ch’in in 206 BC; works of antiquity were recovered, the writing of literature as well as record keeping were encouraged, and classification schemes were developed. Some favoured a seven-part classification, which included the Confucian classics, philosophy, rhymed work (both prose and poetry), military prose, scientific and occult writings, summaries, and medicine. A later system categorized writings into four types: the classics, history, philosophy, and miscellaneous works. The steady growth of libraries was facilitated by the entrenchment of the civil service system, founded in the 2nd century during the Han dynasty and lasting into the 20th century; this required applicants to memorize classics and to pass difficult examinations.
                        
                        
                       
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