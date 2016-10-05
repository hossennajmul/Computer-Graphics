<!DOCTYPE html>
<?php
	session_start();
	$err = "";
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
	{
		if(empty($_POST["fname"]))
			$err = "*Full name not given.";
		else if(empty($_POST["add"]))
			$err = "*Empty address not allowed.";
		else if(empty($_POST["phn"]))
			$err = "*Phone field cant be empty.";
		else if(empty($_POST["email"]))
			$err = "*Email can't be empty.";
		else if(empty($_POST["web"]))
			$err = "*Website can't be empty.";
		else if(!isset($_FILES['upload']) || $_FILES['upload']['error'] == UPLOAD_ERR_NO_FILE)
			$err = "*No picture uploaded.";
		else
		{
			include 'Upload.php';
			$err = UploadFile();
			if($err == "")
			{
				$target_dir = "Uploads/";
				$target_file = $target_dir . basename($_FILES["upload"]["name"]);
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$imageName = "Uploads/".$_SESSION["uname"].".".$imageFileType;
				chmod("Uploads/".basename( $_FILES["upload"]["name"]),0644);
				rename("Uploads/".basename( $_FILES["upload"]["name"]), $imageName);
				include 'Database.php';
				InsertInformation($_POST["fname"], $_POST["add"], $_POST["phn"], $_POST["email"], $_POST["web"], $imageName, $_SESSION["uname"],$_SESSION["pass"]);
				header("Location: Welcome.php");
			}
		}
	}
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["back"]))
	{
		header("Location: Reg1.php");
	}
?>
<html>
	<head>
		<title>Registration</title>
	</head>
	<body bgcolor="#00FFFF">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
			<br><br><br><br><br><br><br>
			
					<br>
					<h2>Registration Form
					<p style="color:#980000"><?php echo $err;?> </p>
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
					<br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Profile Picture: &nbsp;&nbsp;
					<input type="file" name="upload" id="upload">
					<br><br>
					<input type="submit" value="Back" name = "back">	
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;
					<input type="submit" value="Submit" name="submit">
				
		</form>
	</body>
</html>