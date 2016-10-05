<?php
	function UploadFile()
	{
		$target_dir = "Uploads/";
		$target_file = $target_dir . basename($_FILES["upload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		if (file_exists($target_file)) 
		{
			return "Sorry, file already exists.";
			$uploadOk = 0;
		}

		if ($_FILES["upload"]["size"] > 2000000) 
		{
			return "Sorry, your file is too large. Max 2000KB.";
			$uploadOk = 0;
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
			return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		if($uploadOk == 1) 
		{
			if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) 
			{
				return "";
			} 
			else 
			{
				return "Sorry, there was an error uploading your file.";
			}
		}
	}
	function UpdatePicture($imgpath, $uname)
	{
		$err = UploadFile();
		if($err == "")
		{
			if(unlink($imgpath))
			{
				$target_dir = "Uploads/";
				$target_file = $target_dir . basename($_FILES["upload"]["name"]);
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$imageName = "Uploads/".$uname.".".$imageFileType;
				chmod("Uploads/".basename( $_FILES["upload"]["name"]),0644);
				rename("Uploads/".basename( $_FILES["upload"]["name"]), $imageName);
				return $err;
			}
			
		}
		return $err;
	}
?>