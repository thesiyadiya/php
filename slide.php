<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
	div
	{
		padding:5px;
		text-align:center;
		background-color:green;
		border:solid 1px red;
	}
</style>
<script>
	$(document).ready(function()
	{
		$("#div1").click(function()
		{
			$("#div2").slideToggle("slow");
		});
	});
</script>
<div id="div1">click here</div>
<div id="div2" style="display:none;">Hello world</div>