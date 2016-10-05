<!DOCTYPE html>
<?php
	session_start();
	$emp = "";
	$inv = "";
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
	{
		if(empty($_POST["uname"]) || empty($_POST["pass"]))
		{
			$emp = "*Username/Password mustn't be empty.";
		}
		else
		{
			include 'Database.php';
			if(!UserExists($_POST["uname"], $_POST["pass"]))
				$inv = "*Username/Password not matched.";
			else
			{
				$_SESSION["uname"] = $_POST["uname"];
				$_SESSION["pass"] = $_POST["pass"];
				header("Location: Welcome.php");
			}
		}
			
	}
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reg"]))	
	{
		header("Location: Reg1.php");
	}
?>
<html>
	<head>
		<title>Log In</title>
	</head>
	<body bgcolor="#66CCCC">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<br><br><br><br><br><br><br><br><br><br><br><br>
			
				
					<h2>Log In</h2>
					<p style="color:red"><?php echo $emp;?> </p>
					<p style="color:red"><?php echo $inv;?> </p>
					<br>
					Username:
					<input type="text" name="uname">
					<br><br>	
					Password:
					<input type="password" name="pass" >
					<br><br>
					&nbsp; &nbsp &nbsp<input type="submit" value="Submit" name="submit">
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
					<input type="submit" value="Register" name="reg">
			
		</form>
	</body>
</html>