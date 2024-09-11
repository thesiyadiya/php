<?php
$servername="localhost";
$username="root";
$password="";
$database="diya";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("soory we failed to connect:".msqli_connect_error());
}
else{
        echo"connection was succesfull<br>";
}
$sql="SELECT * FROM `insert` where  `password`='456'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
echo $num;
if($num>0){
    while($row=mysqli_fetch_assoc($result))
    {
        echo var_dump($row);
        echo"<br>";
    }
}
$sql="UPDATE `insert` SET `password`='789' WHERE `insert`.`sr`=2";
$result=mysqli_query($conn,$sql);
if($result)
{
    echo"we update the record successfully!";
}
else{
    echo"we could not update the record successfully";
}

?>
