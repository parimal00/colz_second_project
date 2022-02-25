<?php
include "../../../includes/connect.php";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <?php

$sql = "select * from student_registration";
$result = mysqli_query($conn, $sql);

echo'
<Table>
<tr>
<th>id</th>
<th>firstname    </th>
<th>lastname    </th>
<th>username   </th>
<th>password  </th>
<th>email</th>
<th>contact</th>
<th>semester</th>
<th>roll_no</th>
<th>status</th>
</tr>

</Table>';


while($row = mysqli_fetch_assoc($result)){
  echo'
  <Table>';
echo '  <tr>';
  echo '<th>';
  echo $row['id'];
  echo '</th>';
echo   '<th>'; echo  $row["firstname"] ;  echo '</th>';
echo   '  <th>'; echo $row["lastname"] ;   echo ' </th>';
  echo   ' <th>'; echo $row["username"] ;  echo '  </th>';
  echo   ' <th>'; echo $row["email"] ;  echo '</th>';
  echo   ' <th>'; echo $row["contact"];  echo '</th>';
  echo   ' <th>'; echo $row["semester"];  echo '</th>';
  echo   ' <th>'; echo $row["roll_no"];  echo '</th>';
  echo   ' <th>'; echo $row["status"];  echo '</th>';

echo'  </tr>';

echo ' </Table>';
}

     ?>
  </body>
</html>
