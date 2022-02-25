<?php require_once 'connect.php'; require_once 'functions.php'; ?>
<!doctype html>
<html>
	<head>
		<title>Post Questions</title>
		<meta charset="UTF-8" lang="en-US">
		<link rel="stylesheet" href="style.css">

		<link rel="stylesheet" href="faculty1.css">
 
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script src="global.js"></script>
	</head>
	<body>
	
<div class="nav-bar">

<div class="logos">
	<h3>
		Omega
	</h3>
</div>


<div class="menu">
			<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="../Developer/developer.html">Developer</a></li>
						
						<li><a href="../ContactForm/contact.php">Contact</a></li>
			</ul>
</div>
</div>
<div class="wrapper">
	<div class="container">
<div class="split left">
                                  <h1>Computer</h1>
                  <a href="../semester/semester.html" class="button">CHOOSE</a>
                </div>
                
                <div class="split right">
                  <h1>Civil</h1>
                  <a href="../semester/semester.html" class="button">CHOOSE</a>
                </div>
        </div>
        <div class="container1">
<div class="split left1">
                                  <h1>Electrical and Electronics</h1>
                  <a href="../semester/semester.html" class="button1">CHOOSE</a>
                </div>
                
                <div class="split right1">
                  <h1>Architecture</h1>
                  <a href="../semester/semester.html" class="button1">CHOOSE</a>
                </div>
        </div>
              
              
              <div class="container 11">
                <div class="split left11">
                  <h1>Civil and Rular</h1>
                  <a href="../semester/semester.html" class="button11">CHOOSE</a>
                </div>
              </div>
        </div> 
		</div>
     
<div class="click " class="logout" onClick="toggle_click()">
<button class="books">Books</button>
</div>

 <div class="logout">
	 <form action="../inc/logout.php" method="POST">
<button name="logout">Logout</button>

</form>
<form action="chatapp/comment/index.php">
<button>Chat</button>
</form>

</div>
</a>
		<div class="page-container">
			<?php 
				get_total();
				require_once 'check_com.php';
			?>
			<form action="" method="post" class="main">
				<label>Post Your Questions</label>
				<textarea class="form-text" name="comment" id="comment"></textarea>
				<br />
				<input type="submit" class="form-submit" name="new_comment" value="post">
			</form>
			<?php get_comments(); ?>
		</div>

	
<div id="user_details">

</div>
<div id="user_model_details"></div>





</body>



	<script src="faculty.js"></script>
	<script src="main.js"></script>
	<script>
	$(document).ready(function(){
		
			setInterval(function(){
				fetch_user();
				update_last_activity();
				update_chat_history_data();
			}, 5000);

		
		function fetch_user(){
			$.ajax({
				url:"fetch_user.php",
				method: "POST",
				success:function(data){
					$('#user_details').html(data);
				}
			});
		}
			function update_last_activity(){
				$.ajax({
					url: "update_last_activitys.php",
					success: function(){
					
					}
				});
			}
			function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');

 });

 $(document).on('click', '.send_chat', function(){


  var to_user_id = $(this).attr('id');
 
  var chat_message = $('#chat_message_'+to_user_id).val();

  $.ajax({
   url:"../insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {

	
    $('#chat_message_'+to_user_id).val('');
	$('#chat_history_'+to_user_id).html(data);
	 
   }
  })

 });
 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 }
 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }
 //updateNotification();
 /*
 function updateNotification(){
		$query = "UPDATE chat_message SET status = '0'  WHERE from_user_id = '".$to_user_id."'  AND to_user_id = '".$from_user_id."' AND status = '1' ";
 $statement = $connect->prepare($query);
 $statement->execute();
	 }
	 */
	});

</html>

