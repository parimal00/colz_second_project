<?php

include "../../../includes/connect.php";
session_start();
if(!isset($_SESSION['librarian'])){
  header("Location: ../../../index.php");
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Plain Page | LMS </title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>LMS</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2><?php echo $_SESSION['librarian']; ?>
                        </h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="display_stu_info.php"><i class="fa fa-home"></i> All student info <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="add_books.php"><i class="fa fa-edit"></i> Add books <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="display_books.php"><i class="fa fa-desktop"></i> Delete Books <span
                                    class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="isssue_books.php"><i class="fa fa-table"></i> Issue Books <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="books_detail_with_student.php"><i class="fa fa-bar-chart-o"></i> Search<span
                                    class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="update_books.php"><i class="fa fa-bar-chart-o"></i>Update books <span
                                    class="fa fa-chevron-down"></span></a>

                            </li>

                                                        </li>
                                                        <li><a href="return_book.php"><i class="fa fa-bar-chart-o"></i>Return Books <span
                                                                class="fa fa-chevron-down"></span></a>

                                                        </li>

                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/img.jpg" alt="">John Doe
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="send_notification_student.php" class="dropdown-toggle info-number">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                Add content to the page ...
                            <form class="" action="" method="post">
                              <table class = "table table-bordered">
                              <tr><td>  <input placeholder="enter ssid of the book" class="form-control" name="enf">




                                </td>
                              <td> <input type="submit" name="submit1" value="search"class = "form-control"> </td>
                              </tr>

                              </table>


                            </form>

                            <?php
                            if(isset($_POST['submit1'])){


                              $sql = "select * from issue_books where ssid= '$_POST[enf]' and books_return_date = 'waiting'";
                              $result = mysqli_query($conn,$sql);


                              $a = date("y-m-d");

                              $sql5 = "select books_issue_date from issue_books where ssid = '$_POST[enf]'";
                              $result5 = mysqli_query($conn,$sql5);
                              $row2 = mysqli_fetch_assoc($result5);
                              $issued_date =$row2['books_issue_date'];

                              $date1 = strtotime($a);
                              $date2 = strtotime($issued_date);
                              $date_diff = ($date1-$date2)/86400;

                              if($date_diff>=1){
                                $sql6= "update issue_books set penalty = 'true'";
                                mysqli_query($conn,$sql6);
                                //header("Location: return_book.php?penalty=true");

                              }
                                  echo "<table class = 'table table-bordered'>";
                                  echo "<tr>";
                                  echo "<th>";
                                  echo "student_enrollment";
                                  echo "</th>";

                                  echo "<th>";
                                  echo "student name";
                                  echo "</th>";

                                  echo "<th>";
                                  echo "student sem";
                                  echo "</th>";



                                  echo "<th>";
                                  echo "student enail";
                                  echo "</th>";

                                  echo "<th>";
                                  echo "books name";
                                  echo "</th>";

                                  echo "<th>";
                                  echo "return books";
                                  echo "</th>";

                                  echo "<th>";
                                  echo "penalty";
                                  echo "</th>";

                                  echo "</tr>";



                              while($row=mysqli_fetch_assoc($result)){
                              //  echo "<table class = 'table table-bordered'>";
                                echo "<tr>";
                                echo "<th>";
                                echo $row['student_enrollment'];
                                echo "</th>";

                                echo "<th>";
                                echo $row['student_name'];
                                echo "</th>";

                                echo "<th>";
                                echo $row['student_sem'];
                                echo "</th>";

                                echo "<th>";
                                echo $row['student_email'];
                                echo "</th>";

                                echo "<th>";
                                echo $row['books_name'];
                                echo "</th>";

                                echo "<th>";
                                ?>
                                <a href="return.php?id=<?php echo $row['ssid']; echo '">';
                                echo "return books";

                              echo   "</a>";
                                echo "</th>";

                                echo "<th>";
                                ?>
                                  <a href="check_penalty.php?ssid=<?php echo $row['ssid']; echo '">';
                                  echo "Check penalty";

                                echo   "</a>";

                                echo "</th>";

                                echo "</tr>";

                              }
                              echo "</table>";
                              }

                             ?>
                             <?php
                              if(isset($_GET['success'])){
                                if($_GET['success']=='true'){
                                echo '<script>';
                                echo 'alert("books successfully returned")';
                                echo '</script>';
                              }
                              }


                              ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Library Management System
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- NProgress -->
<script src="js/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="js/custom.min.js"></script>
</body>
</html>
