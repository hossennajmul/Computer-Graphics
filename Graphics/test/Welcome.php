<!DOCTYPE html>
<?php
	session_start();
	include 'Database.php';
	$err = "";
	GetInformation($_SESSION["uname"]);
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"]))
	{
		session_unset();
		session_destroy(); 
		header("Location: index.php");
	}
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
	{
		if(!isset($_FILES['upload']) || $_FILES['upload']['error'] == UPLOAD_ERR_NO_FILE)
		{
			
		}
		else
		{
			include 'Upload.php';
			$err = UpdatePicture($_SESSION["imgpath"], $_SESSION["uname"]);
			GetInformation($_SESSION["uname"]);
			if($err == "")
				header("Refresh:0");
		}
	}
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"]))
	{
		header("Location: Reg3.php");
	}
?>
<html>
	<head>
		<title>Welcome</title>
	</head>
	
	<body bgcolor="#00CCFF">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
			
				<table style="width:70%">
					<tr>
						<td id= "t02" style="width:40%">
							<h1>Welcome to  <?php echo $_SESSION["uname"]?>'s page</h1>
						</td>
						
						<td style="width:20%">
							<img width="100%" height="50%" src=<?php echo "'".$_SESSION["imgpath"]."'"?></img>
						</td>
					</tr>
					<tr>
						<td style="width:30%">
							<ol type="i">
								<li><h1>FullName: <?php echo $_SESSION["fname"]?></h1></li>
							
								<li><h1>AddressLine: <?php echo $_SESSION["add"]?></h1></li>
						
								<li><h1>cell: <?php echo $_SESSION["phn"]?></h1></li>
							
								<li><h1>Email: <?php echo $_SESSION["email"]?></h1></li>
							
								<li><h1>Website: <?php echo $_SESSION["web"]?></h1></li>
							</ul>
						
						</td>
							
						<td id="t01" style="width:23%" style="height:20%">
						
							<input type="file" name="upload" id="upload"> 
							<input type="submit" value="Change Pp" name="submit">
							<br/>
							<p style="color:red"><?php echo $err;?> </p>
						</td>
					</tr>
					<tr>
						<td id = "t03">
							<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" value="Update" name="update">
						</td>
						
							
							<br ><input type="submit" value="Log Out" name="logout">
						
					</tr>
					<tr>
						<td>
						</td>
					</tr>
				</table>
			
		</form>
	</body>
</html>