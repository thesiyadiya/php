<?php
$servername="localhost";
$username="root";
$password="";
$database="diya";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
	die("sorry we failed to connect:".mysqli_connect_error());
	
}
echo $_SERVER['REQUEST_METHOD'];
if($_SERVER['REQUEST_METHOD']=='post'){
	$title=$_POST["title"];
	$description=$_POST["description"];
	
	$sql="INSERT INTO `notes`( `title`, `description`) VALUES ('$title','$description')";
	$result1=mysqli_query($conn,$sql);
	
	if($reslut1)
	{
		echo"successful inserted<br>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>inotes</title>
  </head>
  <body>
    <h1><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">inotes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/new.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">about</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">contact us</a>
      </li>
     
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav></h1>
<div class="container my-4">
  <h2> Add a Note </h2>
<form action="crud32.php" method="post">
  <div class="form-group">
    <label for="title">Note Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="desc">Not Description</label>
    <textarea class="form-control" id="description" name="description"  rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Add Note</button>

</form>
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Title</th>
      <th scope="col">Discription</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
	$sql="SELECT * FROM `notes`";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
  {
	echo" <tr>
      <th scope='row'>".$row['sno']."</th>
      <td>".$row['title']."</td>
      <td>".$row['description']."</td>
      <td>Action</td>
    </tr>";
    
  }
  
?>
  
  </tbody>
</table>
