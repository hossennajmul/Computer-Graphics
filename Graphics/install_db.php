<?php
include('db.php');
$sql="CREATE TABLE login (
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL
)";
if($mysqli->query($sql)==TRUE) {
	echo 'Login table Created<br>';
}
else {
	echo $mysqli_error;
}
$sql="CREATE TABLE user_info (
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
firstname VARCHAR(100),
address VARCHAR(100),
phone VARCHAR(100),
email VARCHAR(100),
website VARCHAR(100),
picture VARCHAR(100)
)";
if($mysqli->query($sql)==TRUE) {
	echo 'user_info table Created';
}
else {
	echo $mysqli->error;
}
?>