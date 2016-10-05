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
	<style>
		table, th, td 
		{
			
			border-collapse: collapse;
			background-color: #f1f1c1;
		}
		th, td 
		{
			text-align: left;
			padding: 7px;
		}
		td#t02
		{
			text-align: center;
		}
		td#t01
		{
			text-align: center;
			padding-bottom: 17%;
		}
		td#t03
		{
			
			padding-bottom: 4%;
		}
		td#t04
		{
			padding-left: 15%;
			padding-bottom: 4%;
		}
	</style>
	<body>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
			<center>
				<table style="width:70%">
					<tr>
						<td id= "t02" style="width:40%">
							<h1>Welcome <?php echo $_SESSION["uname"]?></h1>
						</td>
						
						<td style="width:20%">
							<img width="100%" height="50%" src=<?php echo "'".$_SESSION["imgpath"]."'"?></img>
						</td>
					</tr>
					<tr>
						<td style="width:30%">
							<ul>
								<li><h3>Full Name: <?php echo $_SESSION["fname"]?></h3></li>
							
								<li><h3>Address: <?php echo $_SESSION["add"]?></h3></li>
						
								<li><h3>Phone: <?php echo $_SESSION["phn"]?></h3></li>
							
								<li><h3>Email: <?php echo $_SESSION["email"]?></h3></li>
							
								<li><h3>Website: <?php echo $_SESSION["web"]?></h3></li>
							</ul>
						
						</td>
							
						<td id="t01" style="width:23%" style="height:20%">
						
							<input type="file" name="upload" id="upload"> 
							<input type="submit" value="Change Picture" name="submit">
							<br/>
							<p style="color:red"><?php echo $err;?> </p>
						</td>
					</tr>
					<tr>
						<td id = "t03">
							<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" value="Update Information" name="update">
						</td>
						<td id = "t04">
							<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" value="Log Out" name="logout">
						</td>
					</tr>
					<tr>
						<td>
						</td>
					</tr>
				</table>
			</center>
		</form>
	</body>
</html>