<html>
		<?php
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "chatdb";

// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}

		$q1="SELECT * FROM chatrooms";
		$r1=$conn->query($q1);//added NN
		echo "\n<br>";
		$a=1;
	    while($row=$r1->fetch_row())//added NN
		{
			echo  $a.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row[1]. "<br><br>";
			$a++;
		} 
		$conn-> close();
		?>
</html>