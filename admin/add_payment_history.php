<?php 
extract($_POST);
if(isset($save))
{
		mysqli_query($conn,"INSERT INTO `payment_history_room`( `name`, `budget`, `room_date`) VALUES ('$group','$amount',now())");
		
$err="<font color='blue'>Congrates New Room added </font>";
}

?>

<script>
function showLoanDetails(data)
{

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("loandetails").innerHTML=xmlhttp.responseText;
}
}
//alert(data);
xmlhttp.open("GET","show_group_ajax.php?loan_details="+data,true);
xmlhttp.send();
}
</script>

<h2 align="center" style="color:#00FFFF;text-decoration:underline">Add New Room</h2>
<form method="post"  style=" color: white;">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>

	<div class="row" id="loandetails">
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Room Name</div>
		<div class="col-sm-5">
		<input type="text" name="group" class="form-control" required/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Room Budget</div>
		<div class="col-sm-5">
		<input type="text" name="amount" class="form-control" required/></div>
	</div>

	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		
		
<input type="submit" value="Add New Room" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	