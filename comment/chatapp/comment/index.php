<?php require_once 'connect.php'; require_once 'functions.php'; 
include '../inc/databases.php';
?>
<!doctype html>
<html>
	<head>
		<title>Post Questions</title>
		<meta charset="UTF-8" lang="en-US">
		
 
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="global.js"></script>
	</head>
	<body>
	

 <div class="logout">
	 <form action="../inc/logout.php" method="POST">
<button name="logout">Logout</button>
</form>
</div>
<div id="user_details">




</div>
<div id="user_model_details"></div>
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
	
	</script>
</html>
