<?php
    $conn= mysqli_connect("localhost","root","", "colz_project");


    function fetch_user_last_activity($user_id,$conn){
        $sql= " SELECT * FROM login_details WHERE user_name = '$user_id'order by last_activity DESC LIMIT 1";
        $result = mysqli_query($conn,$sql);
        foreach($result as $row){
            return $row['last_activity'];
        }
    }
  ?>