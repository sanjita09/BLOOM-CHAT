<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="stylesheet" type="text/css" href="reset_pswd.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<title>&nbsp;&nbsp;&nbsp;&#x1f33A;&#x1f33A;&nbsp;&nbsp;&nbsp;BLOOM CHAT&nbsp;&nbsp;&nbsp;&#x1f33A;&#x1f33A;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</title>
		
	</head>
	<body>
	<?php
	if(Isset($_POST['submit']))
	{
		$u_name= $_POST['username'];
		$answer= $_POST['answer'];
		$password1=$_POST['password'];
		$c_password=$_POST['confirm_password'];
		if($c_password==$password1)
		{   $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
			$dbname='chatdb';
            $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
         
// Check connection
			if ($conn->connect_error)
			{
			die("Connection failed: " . $conn->connect_error);
			}
			else{
			$sql = "UPDATE login SET password='".$c_password."' WHERE username='".$u_name."' and answer='".$answer."' ";
			if(mysqli_query($conn,$sql))
			{
				header("Location: http://localhost/project/sign_in.php");
				exit;
			} 
			else 
			{
				//echo " Incorrect username/answer.Error updating record: " . $conn->error;
				header("Location: http://localhost/project/Forget_pswd.html");
				//echo "Incorrect username/answer.Error updating record:";
				exit;
			}
			}

		}
		else
		{
			header("Location: http://localhost/project/sign_up.php");
		}
		$conn-> close();
	}
	?>
	</body>
</html>

	
	