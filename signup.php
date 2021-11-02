<html>
<body>
<?php
         if(isset($_POST['submit'])) {
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            if(! get_magic_quotes_gpc() ) {
               $first_name= addslashes ($_POST['first_name']);
               $last_name = addslashes ($_POST['last_name']);
			   $username= addslashes ($_POST['username']);
               $password = addslashes($_POST['password']);
			   $dob= addslashes ($_POST['dob']);
               $answer = addslashes ($_POST['answer']);
	
            } else {
				$first_name=($_POST['first_name']);
               $last_name =($_POST['last_name']);
               $username= $_POST['username'];
               $password = $_POST['password'];
			   $dob= ($_POST['dob']);
               $answer= ($_POST['answer']);
	
            }
   
            $sql = "INSERT INTO login(first_name,last_name,username,password,dob,answer)
			   VALUES('".$first_name."','".$last_name."','".$username."','".$password."','".$dob."','".$answer."')";
               mysql_select_db('chatdb');
            $retval = mysql_query( $sql, $conn );
         
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
			else
			{
			header("Location: http://localhost/p1/sign_in.php");

			}
         } 
 ?>
 </body>
 </html>
 