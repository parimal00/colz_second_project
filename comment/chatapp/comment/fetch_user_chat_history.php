<?php

include '../inc/database.php';

include '../inc/databases.php';


session_start();

echo fetch_user_chat_history($_SESSION['id'], $_POST['to_user_id'], $connect);

?>