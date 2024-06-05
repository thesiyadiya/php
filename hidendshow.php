<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
	$(document).ready(function()
	{
		$("#hidediv").attr("hidden",true);
		$("#chkhide").click(function()
		{
			if($(this).is(':checked'))
			{
				$("#hidediv").attr("hidden",false);
				value="off";
			}
			else
			{
				$("#hidediv").attr("hidden",true);
			}
		});
	});
</script>
<input id="chkhide" type="checkbox">Hide/show
<div id="hidediv">Hello world!</div>
