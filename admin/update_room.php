<?php 
extract($_POST);
if(isset($save))
{

mysqli_query($conn,"update payment_history_room set name='$fn',budget='$ln',room_date='$gen' where room_id='".$_GET['room_id']."' ");
		
$err="<font color='blue'>Rooms Updated</font>";
		
}

$sql=mysqli_query($conn,"select * from payment_history_room where room_id='".$_GET['room_id']."'");
$r=mysqli_fetch_array($sql);

?>
<h2 align="center" style="color:white">Update Room</h2>
<form method="post" style="background-color: rgba(27, 27, 50, 0.8); color: white;padding:5px">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter Room Name</div>
		<div class="col-sm-5">
		<input type="text" value="<?php echo $r[1]; ?>" name="fn" class="form-control" required/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter Budget</div>
		<div class="col-sm-5">
		<input type="text" value="<?php echo $r[2]; ?>" name="ln" class="form-control" /></div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter room creation date</div>
		<div class="col-sm-5">
		<input type="text" value="<?php echo $r[3]; ?>" name="gen" class="form-control" />
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		
		
<input type="submit" value="Update room" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	