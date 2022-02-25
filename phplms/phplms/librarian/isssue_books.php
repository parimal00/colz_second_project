<?php
include "../../../includes/connect.php";
session_start();
if(!isset($_SESSION['librarian'])){
  header("Location: ../../../index.php");
}
global $row,$bookname;
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
                                <img src="images/img.jpg" alt=""><?php echo $_SESSION['librarian']; ?>
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
                              <form action="" method="POST">
                              <table>
                                <tr>
                                  <td>
                                  <input type="text" name="roll_no" value=""class="form-control" placeholder="Enter roll number">
                                  </td>
                                  <td>
                                    <input type="submit" name="submit1" class="form-control btn btn-default" value="Search">
                                  </td>
                                </tr>
                              </table>

                              <?php
                              if(isset($_POST['submit1'])){
                                $roll_number = $_POST['roll_no'];
                                $_SESSION['roll_no']=$roll_number;
                              $result =  mysqli_query($conn,"select * from student_registration where roll_no ='$roll_number'");
                                $row = mysqli_fetch_assoc($result);
                              //  echo $row["firstname"];
                              $_SESSION['firstname'] = $row['firstname'];
                                //$lastname =$row['lastname'];
                                $_SESSION['email'] = $row['email'];
                                $_SESSION['semester'] = $row['semester'];
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['date'] = date("y-m-d");

                          if(empty($roll_number)){
                            echo '<script>';
                            echo 'alert("enter the roll number before proceeding")';
                            echo '</script>';
                          }
                          else {
                               ?>

                          <table class="table table-bordered">
                                 <tr>
                                   <td><input class="form-control"name="name" value="<?php echo $row['firstname']; echo   $row['lastname'] ?>"></td>
                                 </tr>
                                 <tr>
                                   <td><input class="form-control"name ="email" value="<?php echo $row['email'];?>"></td>
                                 </tr>
                                 <tr>
                                   <td><input class="form-control"name = "semester" value="<?php echo $row['semester'];?>"></td>
                                 </tr>
                                 <tr>
                                   <td><input class="form-control" name ="username" value="<?php echo $row['username'];?>"></td>
                                 </tr>
                                 <tr>
                                   <td><input class="form-control"name ="book" placeholder="Enter ssid of book to issue"></td>
                                 </tr>
                                 <tr>
                                   <td><input class="form-control"name="date" value ="<?php echo date("d-m-y");  ?>" ></td>
                                 </tr>
                                 <tr>
                                   <td><input class="form-control" type="submit" name ="submit2" value ="Next"></td>
                                 </tr>

                               </table>
                               <?php
                             }} ?>
</form>
<?php
/*
echo'
 <Table class="table table-bordered">
 <tr>

   <th>ssid</th>
 <th>Book name  </th>
 <th>Author name    </th>
 <th>books price  </th>
 <th>Books Publication name</th>

 </tr>';

       $sql = "select * from add_books where ssid = '2363'";
       $result5 = mysqli_query($conn,$sql);
       $row = mysqli_fetch_assoc($result5);
       echo '  <tr>';

         echo   '<th>'; echo  $row["ssid"] ;  echo '</th>';
       echo   '<th>'; echo  $row["books_name"] ;  echo '</th>';
       echo   '  <th>'; echo $row["books_author_name"] ;   echo ' </th>';
         echo   ' <th>'; echo $row["books_price"] ;  echo '  </th>';
         echo   ' <th>'; echo $row["books_publication_name"] ;  echo '</th>';


       echo'  </tr>';
     echo ' </table>';
     */
 ?>



                             <?php
                                  if(isset($_POST['submit2'])){

                                    $bookname = $_POST['book'];
                                    if(empty($bookname)){
                                      echo "<script>";
                                      echo "alert('enter the ssid before proceeding')";
                                      echo "</script>";

                                    }
                                    else{
                                    echo'
                                     <Table class="table table-bordered">
                                     <tr>

                                       <th>ssid</th>
                                     <th>Book name  </th>
                                     <th>Author name    </th>
                                     <th>books price  </th>
                                     <th>Books Publication name</th>

                                     </tr>';

                                           $sql = "select * from add_books where ssid = '$bookname'";
                                           $result5 = mysqli_query($conn,$sql);
                                           $row = mysqli_fetch_assoc($result5);
                                           $_SESSION['ssid']=$row['ssid'];
                                           $_SESSION['books_name'] =$row['books_name'];
                                           echo '  <tr>';

                                             echo   '<th>'; echo  $row["ssid"] ;  echo '</th>';
                                           echo   '<th>'; echo  $row["books_name"] ;  echo '</th>';
                                           echo   '  <th>'; echo $row["books_author_name"] ;   echo ' </th>';
                                             echo   ' <th>'; echo $row["books_price"] ;  echo '  </th>';
                                             echo   ' <th>'; echo $row["books_publication_name"] ;  echo '</th>';


                                           echo'  </tr>';
                                         echo ' </table>';




/*                                  $qty = 0;
                                    $res = "select * from add_books where books_name = '$_POST[book]'";
                                  $result =  mysqli_query($conn,$res);

                                  while($row = mysqli_fetch_assoc($result)){
                                    $qty = $row['available_qty'];

                                  }

                                  if($qty ==0)
                                  {
                                echo'    <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                        <strong style="color:white">This book is not available in our stock
                                    </div>';
                                  }
                                  else{
                                 $sql = "insert into issue_books(student_enrollment, student_name, student_sem, student_email, books_name, books_issue_date, books_return_date, student_username ) values ('$_SESSION[roll_no]','$_POST[name]','$_POST[semester]','$_POST[email]','$_POST[book]','$_POST[date]','sdf','sdf') ";
                                 mysqli_query($conn, $sql);
                                 $sql2 = "Update  add_books set available_qty = available_qty-1 where books_name = '$_POST[book]'";
                                 mysqli_query($conn, $sql2);
                                  echo '<script>';
                                  echo 'alert("books successfully issued")';
                                  echo '</script>';
                               }
*/

                              ?>

                              <form method="post">
                                <input type="submit" name="submit20" value="submit">';
                              </form>
                            <?php }} ?>

                              <?php
                                    if(isset($_POST['submit20'])){
                                  /*    echo $_SESSION['books_name'];

                                      echo $_SESSION['ssid'];
                                    echo  $_SESSION['firstname'] ;
                                        //$lastname =$row['lastname'];
                                      echo   $_SESSION['email'];
                                      echo  $_SESSION['semester'];
                                      echo   $_SESSION['username'];
                                      echo  $_SESSION['date'];*/

                                                                          $res = "select * from add_books where ssid = '$_SESSION[ssid]'";
                                                                        $result =  mysqli_query($conn,$res);





                                                                       $sql = "insert into issue_books(ssid, student_enrollment, student_name, student_sem, student_email, books_name, books_issue_date, books_return_date, student_username, penalty ) values ('$_SESSION[ssid]','$_SESSION[roll_no]','$_SESSION[firstname]','$_SESSION[semester]','$_SESSION[email]','$_SESSION[books_name]','$_SESSION[date]','waiting','$_SESSION[username]','false') ";
                                                                       mysqli_query($conn, $sql);
                                                                       $sql2 = "Update  add_books set available_qty = available_qty-1 where books_name = '$_SESSION[books_name]'";
                                                                       mysqli_query($conn, $sql2);
                                                                       $sql3 = "Update  update_books set available_qty = available_qty-1 where books_name = '$_SESSION[books_name]'";
                                                                       mysqli_query($conn, $sql3);
                                                                        echo '<script>';
                                                                        echo 'alert("books successfully issued")';
                                                                        echo '</script>';


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
