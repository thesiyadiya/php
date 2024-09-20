<?php
$conn=mysqli_connect("localhost","root","","test") or die("connection failed");
$sql="SELECT * FROM new";
$result=mysqli_query($conn,$sql)or die("SQL Query Failed.");
$output="";

if(mysqli_num_rows($result)>0){
    $output='<table border="1" width="100%" cellspacing="0" cellpadning="10px">
            <tr>
                <th>SR</th>
                <th>Name</th>
                <th>Password</th>
            </tr>';
            while($row = mysqli_fetch_assoc($result)){
                $output.="<tr><td>{$row["sr"]}</td><td>{$row["name"]}</td><td> {$row["password"]}</td></tr>";
                        }
            $output.="</table>";
            mysqli_close($conn);
            echo $output;
                    }
                    else{
                        echo"<h2> NO Record found.</h2>";
                    }

?>
