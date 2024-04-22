<?php
$cookie_name="BCA";
$cookie_value="ATKT";
if(isset($_COOKIE[$cookie_name]))
{
	echo"value of cookie".$_COOKIE[$cookie_name];
}
else
{
	setcookie($cookie_name,$cookie_value,time()+(86400*30),"/");
}
setcookie($cookie_name,"",time()-3600);
?>