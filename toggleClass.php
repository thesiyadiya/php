<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function()
{
	$("#html").click(function()
	{
		$("#demo").toggleClass("demo");
	});
}); 
</script>
<div id="demo" class="demo">
	<b>Hello</b>
</div>
<button id="html">Before</buton>
<style>
.demo
{
	background-color:green;
}
</style>