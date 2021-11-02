<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>&#x1f33A;WELCOME TO BLOOM CHAT&#x1f33A;</title>
<style>	
body
{
	margin:0;
	padding:0;
	background-image:url(12.jpg);
	background-repeat:no-repeat;
	background-size:cover;
	background-attachment:fixed;
	background-position:center;
	font-family:sans-serif;
}
.SigninBox
{
	width:330px;
	height:420px;
	background:transparent;
	color:palevioletred;
	top:50%;
	left:50%;
	border:2px outset lightpink;
	position:absolute;
	transform:translate(-50%,-50%);
	box-sizing:border-box;
	padding:70px 30px;
}

.avatar
{
	width:100px;
	height:100px;
	border-radius:50%;
	position:absolute;
	top:-50px;
	left:calc(50% - 50px);
}


h1
{
	margin : 0;
	padding:0 0 20px;
	text-align:center;
	font-size:30px;
	color:lightpink;
}

.SigninBox p
{
	margin: 0;
	padding: 0;
	font-weight: bold;
	font-size:18px;
}

.SigninBox input
{
	width: 100%;
	margin-bottom:20px;
	
}

.SigninBox input[type="text"],input[type="password"]
{
	border: none;
	border-bottom:1px solid #fff;
	background: transparent;
    outline:none;
    color:#fff;
    font-size:18px;
	height:40px;
}

.SigninBox input[type="submit"]
{
    border:none;
    outline:none;
    height:40px;
    background:lightpink;
    color:darkgreen;
    font-size:18px;
    border-radius:20px;
}

.SigninBox input[type="submit"]:hover
{
	cursor:pointer;
	background:palevioletred;
	color:darkgreen;
}

.SigninBox a
{
	text-decoration:none;
	font-size:15px;
	line-height:20px;
	color:mistyrose;
	text-align:center;
	
}

.SigninBox a:hover
{
	color:pink;
}
</style>
	</head>
	<body>
		<div class="SigninBox">
		<?Php 
		session_start();
		if(Isset($_POST['Login']))
		{
			$dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
			$dbname='chatdb';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);         
			$username=$_POST['username'];
			$password=$_POST['password'];
			$q='SELECT * FROM login where username= "'.$username.'" and password="'.$password.'" ';
			$r=mysqli_query($conn,$q);
			if(mysqli_num_rows($r) >0)
			{
				$_SESSION['username']=$username;
				header("location:http://localhost/p1/chat.php");
			}
			else
			{
				echo 'Your username and password does not match';
			}
			mysqli_close($conn);
		}
		
		?>
		<img src="17a.jpg" class="avatar"/>
		<h1>Login Here</h1>
		<form method="post">
			<p><i class="fa fa-user" aria-hidden="true" style="color:palevioletred"></i>&nbsp;Username</p>
			<input type="text" name="username" placeholder="Enter Username" required>
			<p><i class="fa fa-unlock-alt" aria-hidden="true" style="color:palevioletred"></i>&nbsp;Password</p>
			<input type="password" name="password" placeholder="Enter Password" required>
			<input type="submit" name="Login" value="Login">
			<a href="Forget_pswd.html"> Forget password ? </a><br>
			<p>Dont have an account ?<a href="sign_up.html"> SignUp </a></p><br>
		</form>
		</div>

	</body>
</html>

	