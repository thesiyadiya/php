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
			$("#div2").slidetoggle("sllow");
		});
	});
</script>
<div id="div1">click here</div>
<div id="div2" style="display:none;">hello world</div>