
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="chat-boxs.css">
    <title>Document</title>
</head>
<body>
    

<?php
include '../inc/database.php';
include '../inc/databases.php';
session_start();
$sql = "SELECT * FROM signup where user_name != '".$_SESSION['userID']."'  ";
$result= mysqli_query($conn,$sql);

/*foreach($result as $row){
    echo $row['user_name'];
}
*/

$output=  '
        <table>
<tr>
        <td>User_Id</td>
        <td>Status</td>
        <td>Chat</td>
    </tr>
    ';
    foreach($result as $row){
        $status = '';
        $current_timespamp=strtotime(date('Y-m-d H:i:s').'-10 second');
        $current_timespamp = date('Y-m-d H:i:s',$current_timespamp);
        $user_last_activity = fetch_user_last_activity($row['user_name'],$conn);
        if($user_last_activity>$current_timespamp){
        $status = '<span class="label label-success">Online</span> ';
        }
        else if($user_last_activity<$current_timespamp){
            $status = '<span class="label label-danger">Offline</span> ';
        }
  $output .= '
  <tr>
  <td>'.$row['user_name'].''.count_unseen_message($row['id'], $_SESSION['id'], $connect).'</td>
  <td>'.$status.'</td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['user_name'].'">Start Chat</button></td>
 </tr>
 ';
//'.count_unseen_message($row['login_details_idss'], $_SESSION['id'], $connect).
   
  
}
$output .='</table>';
echo $output;
/*
$output= '
<div class="chat-box">
<div class="header">
<p> Chat-box</p>
';
$output .= '<table>';

foreach($result as $row){
    $status = '';
    $current_timespamp=strtotime(date('Y-m-d H:i:s').'-10 second');
    $current_timespamp = date('Y-m-d H:i:s',$current_timespamp);
    $user_last_activity = fetch_user_last_activity($row['user_name'],$conn);
    if($user_last_activity>$current_timespamp){
    $status = '<span class="label label-success">Online</span> ';
    }
    else if($user_last_activity<$current_timespamp){
        $status = '<span class="label label-danger">Offline</span> ';
    }
$output .= '
<div class="chat-button chat-box">
<div class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['user_name'].'">

<tr>
<td>'.$row['user_name'].''.count_unseen_message($row['id'], $_SESSION['id'], $connect).'</td>
<td>'.$status.'</td>
<td class="btn btn-info btn-xs start_chat >Chat </td>
</tr>


</div>
</div>
</div>


';

}

$output .='</table>';
echo $output;

*/
       


?>
</body>
</html>