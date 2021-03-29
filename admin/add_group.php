<?php 
extract($_POST);
if(isset($save))
{
		mysqli_query($conn,"INSERT INTO `expense`(`name`, `cat_id`, `amount`, `expense_date`) VALUES ('$group','$category','$amount',now())");
		
$err="<font color='blue'>Congrats a New Expense has been added </font>";
}

?>


<h2 align="center" style="color:white;text-decoration:underline">Add New Expense</h2>
<form method="post"  style=" color: white;">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>

	<div class="row" id="loandetails">
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Expense Name</div>
		<div class="col-sm-5">
		<input type="text" name="group" class="form-control" required/></div>
	</div>

	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Select Category</div>
		<div class="col-sm-5">
		<select name="category" class="form-control" required>
			<option value="">Select Category</option>
			<?php 
$q1=mysqli_query($conn,"select * from category");
while($r1=mysqli_fetch_assoc($q1))
{
echo "<option value='".$r1['cat_id']."'>".$r1['cat_name']."</option>";
}
			?>
		</select>
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Expense Amount</div>
		<div class="col-sm-5">
		<input type="text" name="amount" class="form-control" required/></div>
	</div>


	<!-- <div class="row" style="margin-top:10px">
		<div class="col-sm-4">Expense Date</div>
		<div class="col-sm-5">
		<input type="text" name="dateE" class="form-control" required/></div>
	</div> -->


	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		
		
<input type="submit" value="Add New Expense" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	