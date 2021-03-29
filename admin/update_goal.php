<?php 
extract($_POST);
if(isset($save))
{

mysqli_query($conn,"update goal set name='$fn',description='$ln',goal_amount='$gen',cat_id='$group' where goal_id='".$_GET['goal_id']."' ");
		
$err="<font color='blue'>Goals Updated</font>";
		
}

$sql=mysqli_query($conn,"select * from goal where goal_id='".$_GET['goal_id']."'");
$r=mysqli_fetch_array($sql);

?>
<h2 align="center">Update Goal</h2>
<form method="post" style="background-color: #f6f6f6;padding:5px">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter goal Name</div>
		<div class="col-sm-5">
		<input type="text" value="<?php echo $r[1]; ?>" name="fn" class="form-control" required/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter goal description</div>
		<div class="col-sm-5">
		<input type="text" value="<?php echo $r[2]; ?>" name="ln" class="form-control" /></div>
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
?>
<option <?php if($r[4]==$r1['cat_id']){echo "selected";} ?> 
value="<?php echo  $r1['cat_id'];?> "><?php echo $r1['cat_name']; ?></option>
<?php 
}
			?>
		</select>
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Select goal amount</div>
		<div class="col-sm-5">
		<input type="text" value="<?php echo $r[3]; ?>" name="gen" class="form-control" />
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		
		
<input type="submit" value="Update goal" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	