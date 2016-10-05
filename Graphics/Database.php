<?php
	$servername = "localhost";
	$uname = "root";
	$pass = "";
	$dbname = "peopleinformation";
	$conn = new mysqli($servername, $uname, $pass, $dbname);
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	function UserExists($userName, $password)
	{
		global $conn;
		$sql = "SELECT * FROM userinformation WHERE Username = '".$userName."' && Password = '".$password."'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)==0)
		{
			return false;
		}
		else
			return true;
	}
	function Exists($userName)
	{
		global  $conn;
		$sql = "SELECT * FROM userinformation WHERE Username = '".$userName."'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)==0)
		{
			return false;
		}
		else
			return true;
	}
	function InsertInformation($fname, $add, $phn, $email, $web, $imgpath, $uname, $pass)
	{
		global $conn;
		$sql = "INSERT INTO FullInformation (FullName, Address, Phone, Email, Website, PicturePath, Username)
				VALUES ('".$fname."','".$add."','".$phn."','".$email."','".$web."','".$imgpath."','".$uname."')";
		$result = mysqli_query($conn, $sql);
		
		$sql = "INSERT INTO UserInformation (Username, Password) VALUES ('".$uname."','".$pass."')";
		$result = mysqli_query($conn, $sql);
	}
	function GetInformation($uname)
	{
		global $conn;
		$sql = "SELECT * FROM FullInformation WHERE Username = '".$uname."'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) 
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				$_SESSION["fname"] = $row["FullName"];
				$_SESSION["add"] = $row["Address"];
				$_SESSION["phn"] = $row["Phone"];
				$_SESSION["email"] = $row["Email"];
				$_SESSION["web"] = $row["Website"];
				$_SESSION["imgpath"]=$row["PicturePath"];
				$_SESSION["uname"]=$row["Username"];
			}
		}
	}
	function UpdateInformation($fname, $add, $phn, $email, $web, $imgpath, $uname)
	{
		global $conn;
		$sql = "UPDATE FullInformation SET FullName='".$fname."' WHERE Username='".$uname."'";
		$result = mysqli_query($conn, $sql);
		
		$sql = "UPDATE FullInformation SET Address='".$add."' WHERE Username='".$uname."'";
		$result = mysqli_query($conn, $sql);
		
		$sql = "UPDATE FullInformation SET Phone='".$phn."' WHERE Username='".$uname."'";
		$result = mysqli_query($conn, $sql);
		
		$sql = "UPDATE FullInformation SET Email='".$email."' WHERE Username='".$uname."'";
		$result = mysqli_query($conn, $sql);
		
		$sql = "UPDATE FullInformation SET Website='".$web."' WHERE Username='".$uname."'";
		$result = mysqli_query($conn, $sql);
		
	}
?>