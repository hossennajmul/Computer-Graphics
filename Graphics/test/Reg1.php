<!DOCTYPE html>
<?php
	session_start();
	$err="";
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["next"]))
	{
		include 'Database.php';
		if(empty($_POST["uname"]) || empty($_POST["pass"]) || empty($_POST["repass"]))
			$err="*Username/Password is not given";
		else if(Exists($_POST["uname"]))
			$err="Username exists. Try another one.";
		else if ($_POST["pass"] != $_POST["repass"])
			$err="Password didn't match.";
		else
		{
			$_SESSION["uname"] = $_POST["uname"];
			$_SESSION["pass"] = $_POST["pass"];
			header("Location: Reg2.php");
		}
	}
?>
<html>
	<head>
		<title>Registration Form</title>
	</head>
	<body bgcolor="#999966">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<br><br><br><br><br><br><br><br><br><br>
			
					<h2>Registration Form</h2>
					<p style="color:#980000"><?php echo $err;?> </p>
					<br>
					Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="uname" <?php if(!empty($_SESSION["uname"])){echo "value = '".$_SESSION["uname"]."'";}?>>
					<br><br>	
					Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="password" name="pass" >
					<br><br>
					Retype Password:
					<input type="password" name="repass" >
					<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;
					<input type="submit" value="Next" name="next">
				
		</form>
	</body>
</html>