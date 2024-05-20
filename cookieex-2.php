<?php
	setcookie("Auction_Item","Luxury car",time()+2*24*60*60);
?>
<html>
<body>
<?php	
	echo "Auction Item is a ".$_COOKIE["Auction_Item"];
?>
	<p>
		<strong>Note:</strong>
		you might have to reload the page to  see the value of the cookie.
	</p>
</body>
</html>
