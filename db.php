<?php
$conn = mysqli_connect("localhost","root","ekam","chats");
if(mysqli_connect_errno())
{
	echo 'Soory could\'nt connect to the database '. mysqli_connect_errno();
}

function setTime($str){
	return date('h:i a',strtotime($str));
}
?>
