<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main></main>
        <footer>
        <?php
//INSERT INTO `notes` (`sr`, `title`, `description`) VALUES (NULL, 'abcd', 'dfxgfv hbrtfdgvbgf');
	$insert=false;
	$servername="localhost";
	$username="root";
	$password="";
	$database="diya";

	$conn=mysqli_connect($servername,$username,$password,$database);

	if(!$conn)
	{
		die("sorry we failed to connect:".mysqli_connect_error());
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
	$title=$_POST["title"];
	$description=$_POST["description"];
	
	$sql="INSERT INTO `notes`( `title`, `description`) VALUES ('$title','$description')";
	$result = mysqli_query($conn,$sql);
	
	if($result)
	{
		//echo"successful inserted!<br>";
		$insert=true;
	}
	else
	{
		echo"not inserted".mysqli_error($conn);
	}
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>i notes </title>
   
  </head>
  <body>
    <h1><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
    <title>inotes</title>

  </head>
<body>

</nav></h1>
<?php
	if($insert)
	{
		echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
		<strong>Success!</strong> Your note has been inserted successfully
		<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
		<span aria-hidden='true'>&times;</span>
		</button>
	  </div>";
	}
?>
<div class="container my-4">
  <h2> Add a Note </h2>
<form action="crud.php" method="post">
  <div class="form-group">
    <label for="title">Note Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" >
  </div>
  <div class="form-group">
    <label for="desc">Not Description</label>
    <textarea class="form-control" id="description" name="description"  rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Add Note</button>

</form>
</div>
<div calss="container">
	
	<div class="container">
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Title</th>
      <th scope="col">Discription</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
	 $sql="SELECT * FROM `notes`";
	 $reslut=mysqli_query($conn,$sql);
	 $sr=0;
	 while($row=mysqli_fetch_assoc($reslut))
	 {
		 $sr=$sr + 1;
		 echo"<tr>
		 <th scope='row'>". $sr ."</th>
		 <td>".$row['title']."</td>
		<td>".$row['description']."</td>
		<td><button class='edit btn-sm btn-primary'>Edit</button> <a href='/del'>Delete </a></td>
		</tr>";
	 }
	?>
	</tbody>
    <script>
		edits=document.getElementsByClassName('edit');
		Array.from(edits).forEach(element)=>
		{
			element.addEventListener("click",(e)=>
			{
				console.log("edit",);
				tr=e.target.parentNode.parentNode;
				title=tr.getElementsByTagName("td")[0].innerText;
				description=tr.getElementsByTagName("td")[1].innerText;
				console.log*(title,description)
				titleEdit.value=title;
				descriptionEdit.value=desciption;
				$('#editModel').modal('toggle');
			})
		})
	</script> 
<!-- Edit modal -->
<!--button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" >
  Edit modal
</button-->

<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit this note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <span aria-hidden="true">×</span>
      </div>
      <div class="modal-body">
      <form action="crud1.php" method="post">
  <div class="form-group">
    <label for="title">Note Title</label>
    <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp" >
  </div>
  <div class="form-group">
    <label for="desc">Not Description</label>
    <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"  rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update Note</button>

</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<h1>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="/crud/logo.svg" height="28px" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
        </footer>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script>
      edits =document.getelementsBYClassName('edit');
      Array.from(edits).forEach(element)=>{
        element.addEventListener("click",(e)=>{
          console.log("edit",);
          tr = e.target.parentNode.parentNode;
         title = tr.getElementsByTagName("td")[0].innerText;
         description = tr.getElementsByTagName("td")[1].innerText;
          console.log(title, description);
         titleEdit.value = title;
         descriptionEdit.value = description;
         $('#editModal').modal('toggle');
        })
      })
     </script>
    </body>
</html>
