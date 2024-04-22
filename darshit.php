<html>
<body>

<form action="*c:\xampp\htdocs\diya\darsh" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload file" name="submit">
</form>
</body>
</html>


<?php
		if(isset($_files('fileToUpload'))
		{
			$target_dir="upload/";
			$targetfile=$target_dir.basename($files['fileToUpload']['*c:\xampp\htdocs\diya\darsh']));
			move_uploaded_file($files(['fileToUpload']['tmp_name'],$target_file);
			
		}	
		enctype="multipart/form-data";
?>
	