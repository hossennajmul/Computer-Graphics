<!DOCTYPE html>
<?php
	session_start();
	$err = "";
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
	{
		if(empty($_POST["fname"]))
			$err = "Full Name is empty.";
		else if(empty($_POST["add"]))
			$err = "Address is empty.";
		else if(empty($_POST["phn"]))
			$err = "Phone is empty.";
		else if(empty($_POST["email"]))
			$err = "Email is empty.";
		else if(empty($_POST["web"]))
			$err = "Website is empty.";
		else
		{
			include 'Database.php';
			UpdateInformation($_POST["fname"], $_POST["add"], $_POST["phn"], $_POST["email"], $_POST["web"], $imageName, $_SESSION["uname"]);
			header("Location: Welcome.php");
		}
	}
?>
<html>
	<head>
		<title>Update</title>
	</head>
	<body>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
			<br><br><br><br><br><br><br>
			
					
					<p style="color:red"><?php echo $err;?> </p>
					Full Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="fname" <?php if(!empty($_SESSION["fname"])){echo "value = '".$_SESSION["fname"]."'";}?>>
					<br><br>	
					Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;
					<input type="text" name="add" <?php if(!empty($_SESSION["add"])){echo "value = '".$_SESSION["add"]."'";}?>>
					<br><br>
					 Phone: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="phn" <?php if(!empty($_SESSION["phn"])){echo "value = '".$_SESSION["phn"]."'";}?>>
					<br><br>
					Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="email" <?php if(!empty($_SESSION["email"])){echo "value = '".$_SESSION["email"]."'";}?>>
					<br><br>
					Website: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="web" <?php if(!empty($_SESSION["web"])){echo "value = '".$_SESSION["web"]."'";}?>>
					<br><br><br/>
					<input type="submit" value="Update" name="submit">
				
		</form>
	</body>
</html>