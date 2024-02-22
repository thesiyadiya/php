<?php 
	$con=mysqli_connect("localhost","root","","email");
	if(isset($_POST['txtunm']))
	{
			$unm=$_POST['txtunm'];
			$mb=$_POST['txtmb'];
			$pwd=$_POST['txtpwd'];
			$rpwd=$_POST['txtrpwd'];
			$sql="INSERT INTO `user_login`(`id`, `Enter username`, `Moblie Number`, `Enter Password`, `Enter Re-type Password`) VALUES ('','$unm','$mb','$pwd','$rpwd')";
			$res=mysqli_query($con,$sql);
			
	}
?>
<script>
	$("#txtunm").keyup((function()
	{
		unm=$("#txtum").val();
		$.ajax({
				type:'POSt",
				url:'checknm:php',
				data:{username:unm},
				success:function(response)
				{
					if(response=="D")
					{
						$("#txtunm").css("background-color","red");
					}
					else
					{
						$("#txtunm").css("backgroud-color","green");
					}
				}
			));
		});
</script>

