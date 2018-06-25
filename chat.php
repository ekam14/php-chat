<?php
include('db.php');
$query = 'SELECT * FROM chats ORDER BY id DESC LIMIT 8; ';
$result = mysqli_query($conn,$query);
$chats = mysqli_fetch_all($result,	MYSQLI_ASSOC);
foreach($chats as $chat){
  echo '<div>';
  echo '<span style="color:green">'.$chat["name"].'</span><b> :</b>&nbsp;&nbsp;';
  echo '<span style="color:purple">'.$chat["msg"].'</span>';
  echo '<div class="text-danger" style="float:right">'.setTime($chat["created_at"]).'</div>';
  echo '</div><br>';
}
?>
