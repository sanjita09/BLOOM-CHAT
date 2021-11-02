<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
.container
{
	max-width:500!important;
	margin:auto;
	margin-top:1%;
	padding-top:50px;
	font-family:sans-serif;
	letter-spacing:0.5px;
	
}

img
{
		max-width:100%;
		border-radius:50%;
}

.msg-header
{
	border:1px solid darkgreen;
	width:100%;
	height:10%;
	border-bottom:none;
	display:inline-block;
	background-color:palevioletred;
	padding-left:5%;
}



.heading
{
	width:130px;
	float:left;
	margin-top:10px;
}

}
.heading h4
{
	font-size:20px;
	margin-left:20px;
	color:darkgreen;
}

.header-icons
{
	width:120px;
	float:right;
	margin-top:12px;
	margin-right:10px;
}

.header-icons .fa
{
	color:#fff;
	cursor:pointer;
	margin:10px;
}

.chat-page
{
	padding:0 0 50px 0;
	
}

.msg-inbox
{
		border:1px solid #ccc;
		overflow:hidden;
		padding-bottom:30px;
}

.chats
{
	padding:30px 15px 0 25px;
}

.msg-page
{
	height:516px;
	overflow-y:auto;
}

.recieved-chats-img
{
	display:inline-block;
	width:20px;
	float:left;
}

.received-msg
{
	display:inline-block;
	padding:0 0 0 10px;
	vertical-align:top;
	width:92%;
}

.received-msg-inbox
{
	width:57%;
}

.received-msg-inbox 
{
	background:#efefef none repeat scroll 0 0;
	border-radius:10px;
	color:#646464;
	font-size:14px;
	margin:0;
	padding:5px 10px 5px 12px;
	width:100%;
}

.time
{
		color:#777;
		display:block;
		font-size:12px;
		margin:8px 0 0;
}

.sent-chats
{
	overflow:hidden;
	margin:26px 20px;
}

.sent-chats-img 
{
	display:inline-block;
	width:20px;
	float:right;
}

.sent-chats-msg p
{
	background:#007bff none repeat scroll 0 0;
	color:#fff;
	border-radius:10px;
	font-size:14px;
	margin:0;
	color:#fff;
	padding:5px 10px 15px 12px;
	width:100%;
}

.sent-chats-msg 
{
	float:left;
	width:46%;
	margin-left:45%;
}

.msg-bottom
{
	position:relative;
	height:10%;
	background-color:#007bff;
}

.input-group
{
	float:right;
	margin-top:13px;
	margin-right:20px;
	outline:none !important;
	border-radius:20px;
	width:61% !important;
	background-color:#fff;
}

.form-control
{
	border:none !important;
	border-radius:20px !important;
}

.input-group
{
	border:1px solid green;
	width:100%;
}

.input-group-text
{
		background:transparent !important;
		border:none ! important;
}

.input-group .fa
{
	color:#007bff;
	float:right;
}	



.form-control:focus
{
	border-color:none ! important;
	box-shadow:none ! important;
	border-radius:20px;
}

a:visited {
  background-color: purple;
}

a:hover {
  background-color: lightgreen;
}

body {
  background-image: url('img_girl.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>
</head>
<body>		
	<div class="container">
		<div class="msg-header"> 
			
			<div class="heading">
				<h4>Chat Room</h4>
			</div>
			<div class="header-icons">
				<i class="fa fa-phone"></i>
				<i class="fa fa-video-camera"></i>
				<i class="fa fa-info-circle"></i>
			</div>
		</div>
		
		
		
<div class="chat-page">
<div class="msg-inbox">
	<div class="chats">
	<div class="msg-page">
						
		<div class="recieved-chats">
		<div class="recieved-chats-img">
			<img src="17a.jpg"/>
		</div>
		<div class="received-msg">
		<div class="received-msg-inbox">
		<p>
			<?php
			session_start();
			$c_name=$_SESSION['chatroom_name'];
			$username=$_SESSION['username'];
			$servername = "localhost:3306";
			$username1= "root";
			$password1 = "";
			$dbname = "chatdb";

// Create connection
		$conn = new mysqli($servername, $username1, $password1, $dbname);
// Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
	
	//printing the existing messages in the chat room
		$q1="SELECT * FROM $c_name";
		$r1=$conn->query($q1);
		while($row=$r1->fetch_row())//added NN
		{
			echo '<br><h4 style="color:darkturquoise;">'.$row[1].'</h4>';
			echo '<p><h5 style="color:black;">&nbsp;&nbsp;&nbsp;'.$row[2].'</h5></p>';
			echo $row[3];
			'<br>';
		}
	
		if(isset($_POST['submit']))
		{
			 $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
			$message=$_POST['message'];
			$q="INSERT INTO $c_name(username,message)
			VALUES('$username','$message')";
			if($conn->query($q)==TRUE)//added NN
			{
				echo '<br><h4 style="color:darkturquoise;">'.$username.'</h4>';
				echo '<p><h5 style="color:black;">&nbsp;&nbsp;&nbsp;'.$message.'</h5></p>';
				echo $date->format("F j,Y, g:i a");
			}
			$_POST['submit']=NULL;
		}
		$conn->close();
		?>
		</p>
			
		</div>
		</div>
		</div>
		
		<div class="sent-chats">
		<div class="sent-chats-img">
			<img src="17a.jpg"/>
		</div>
		<div class="sent-chats-msg">
			<p>messages to be dislayed here!</p>
		</div>
		</div>
	
	</div>
	</div>
	
	<div class="msg-bottom">
		
		<div class="input-group">
			<form method="post">
			<input type="text" class="form-control" name="message" placeholder="Enter the message here...">
			<input type="submit" name="submit" value="*">
			</form>
			<div class="input-group-append">
				<span class="input-group-text"><i class="fa fa-paper-plane"></i></span>
			</div>
		</div>
	</div>

</div>	
</div>
</div>
	
		<p><b><a href="http://localhost/p1/chat.php"><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="purple">BACK TO CHATROOM</font></h4></a></b></p>
</body>
</html>