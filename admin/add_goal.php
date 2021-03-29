<?php 
extract($_POST);
if(isset($save))
{

	if($fn=="" || $ln=="" || $group=="" || $gen=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
$sql=mysqli_query($conn,"select * from goal where name='$fn' and goal_id='$group'");
$r=mysqli_num_rows($sql);
		if($r!=true)
		{
		mysqli_query($conn,"insert into goal values('','$fn','$ln','$gen','$group',now())");
		
$err="<font color='blue'>Congrats a new goal was added successfully</font>";
		}
		
		else
		{

	$err="<font color='red'>This goal already exists</font>";
		
		}
	}
}

?>
<h2>Add New goal</h2>
<form method="post" style="background-color: #f6f6f6;padding:5px">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter goal name</div>
		<div class="col-sm-5">
		<input type="text" name="fn" class="form-control" required/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter goal description</div>
		<div class="col-sm-5">
		<input type="text" name="ln" class="form-control" /></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Select Category</div>
		<div class="col-sm-5">
		<select name="group" class="form-control" required>
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
		<div class="col-sm-4">Select goal Amount</div>
		<div class="col-sm-5">
		<input type="text" name="gen" class="form-control" />
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		
		
<input type="submit" value="Add New goal" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	