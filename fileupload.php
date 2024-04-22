 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <div class="container">
	<form action="fileupload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="filetoupload" accept="application/pdf" class="form-control mt-2">
		<input type="submit" value="upload file" class="btn btn-primary w-100 mt-2">
	</form>
</div>
<?php
	if(isset($_FILES['filetoupload']))
	{
		$filename=basename($_FILES['filetoupload']['name']);
		$temp=explode('.',$filename);
		$ext=end($temp);
		if($ext=="pdf"||$ext=="PDF")
		{
			$newname=time();
			$finalname=$newname.".".$ext;
			$target_dir="uploadsss/";
			$target_file=$target_dir.$finalname;
			move_uploaded_file($_FILES['filetoupload']['tmp_name'],$target_file);
			$sql="";
		}
	}
?>
	
	