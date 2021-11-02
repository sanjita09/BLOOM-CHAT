<?Php
	session_start();
	if(isset($_SESSION['username']))
	{
		unset($_SESSION['username']);
		header("Location: home_page.html");
	}
	else
	{
		header("Location: home_page.html");
	}
?>