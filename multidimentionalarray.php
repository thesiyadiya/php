<?php
//Defining a multidimensional array
	$favorites=array(
						array(
								"sem"=>"sem1",
								"fees"=>"15000",
								"result"=>"pass",
							),
						array(
								"sem"=>"sem2",
								"fees"=>"14000",
								"result"=>"pass",
							),
						array(
								"sem"=>"sem3",
								"fees"=>"15500",
								"result"=>"pass",
							)
					);
//Accesing elements
	echo"sem-1 result is:".$favorites[0]["result"],"</br>";
	echo"sem-3 fees is:".$favorites[2]["fees"];
?>
								