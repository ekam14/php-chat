<?php
include('db.php');

	$errname = '';
	$errmsg = '';
if(isset($_POST['submit'])){
	$errname = '';
	$errmsg = '';
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$msg = mysqli_real_escape_string($conn,$_POST['message']);
	if(!empty($name) && !empty($msg)){
		$query = " INSERT INTO chats(name,msg) VALUES('$name','$msg') ";
		$result = mysqli_query($conn,$query);
	}else{
		$errname = 'Name is required!';
		$errmsg = 'Message is required!';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat-System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body onload="ajax()">
<div class="container" style="margin-top:17px">
	<div class="card">
		<div class="card-body">
			<div id="chat"></div><br>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
					<input type="text" name="name" placeholder="Enter Your name" class="form-control">
						<div style="color:red"> <?php echo empty($_POST['name'])? '*'.$errname : ''; ?> </div>
				</div>
				<div class="form-group">
					<textarea name="message" placeholder="Enter your message" class="form-control"></textarea>
					<div style="color:red"> <?php echo empty($_POST['message'])? '*'.$errmsg : ''; ?> </div>
				</div>
				<input type="submit" name="submit" class="btn btn-block btn-primary">
			</form>
		</div>
	</div>
</div>
</body>
<script>
function ajax(){
	var xhr = new XMLHttpRequest();
	xhr.open('GET','chat.php',true);
	xhr.onload = function(){
		document.getElementById('chat').innerHTML = xhr.responseText;
	}
	xhr.send();
}
setInterval(function(){
	ajax();
},1000);
</script>
</html>
