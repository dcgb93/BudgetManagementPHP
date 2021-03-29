<?php 
$q=mysqli_query($conn,"select * from payment_history_room");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any Payment Records found !!!</h2>";
echo "<a style='text-decoration:underline' href='index.php?page=add_loan'>Add  New Payment Record ?</a>";
}
else
{
?>
<script>
	function DeleteRoom(id)
	{
		if(confirm("You want to delete this Record ?"))
		{
		window.location.href="delete_payment_record.php?id="+id;
		}
	}
</script>
<h2 style="color:white;text-decoration:underline" align="center">Housing Budget</h2>

<table class="table table-bordered" style="background-color: rgba(27, 27, 50, 0.8); color: white;">
	<tr>
		<form method="post" action="index.php?page=search_room">
		<td colspan="4">
		<input type="text" placeholder="Search Room" name="searchRoom" class="form-control"required />
		</td>
		<!-- <td colspan="3">
		<select name="seachLoan" class="form-control" required>
			<option value="">Select Category</option>
			<?php 
$q1=mysqli_query($conn,"select * from category");
while($r1=mysqli_fetch_assoc($q1))
{
echo "<option value='".$r1['cat_id']."'>".$r1['cat_name']."</option>";
}
			?>
		</select>
		</td> -->
		<td colspan="3">
		<input type="submit" value="Search Room names" name="sub" class="btn btn-success" />
		</td>
		</form>
	</tr>
	<tr>
		<td colspan="6">
		
		<a title="Add New Payment Records" href="index.php?page=add_payment_history"><span class="glyphicon glyphicon-plus"</a>
		&nbsp; &nbsp; 
		
		
		</td>
	</tr>
	<Tr >
		<th>Sr.No</th>
		<th>Room Name</th>
		<th>Room Budget</th>
		<th>Creation Date</th>
		<th>Delete</th>
		<th>Update</th>
	</Tr>
		<?php
         error_reporting(1);
         $rec_limit =10;
         
         /* Get total number of records */
        
		 $sql = "SELECT count(room_id) FROM payment_history_room ";
         $retval = mysqli_query($conn,$sql);
         
         if(! $retval )
		  {
            die('Could not get data: ' . mysqli_error());
         }
         $row = mysqli_fetch_array($retval, MYSQLI_NUM );
         $rec_count = $row[0];
         
         if( isset($_GET['pagi'] ) ) {
            $pagi = $_GET['pagi'] + 1;
            $offset = $rec_limit * $pagi ;
         }else {
            $pagi = 0;
            $offset = 0;
         }
         
		 
         $left_rec = $rec_count - ($pagi * $rec_limit);
         $sql = "SELECT * ". "FROM payment_history_room ".
            "LIMIT $offset, $rec_limit";
            
         $retval = mysqli_query($conn, $sql);
         
         if(! $retval )
		  {
            die('Could not get data: ' . mysqli_error());
         }
         
         $inc=1;
		 while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
		  {
		  
           echo "<Tr>";
echo "<td>".$inc."</td>";


// $q1=mysqli_query($conn,"select * from groups where group_id='".$row['group_id']."'");
// $r1=mysqli_fetch_assoc($q1);

// echo "<td>".$r1['group_name']."</td>";
// echo "<td>".$row['room_id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['budget']."</td>";
echo "<td>".$row['room_date']."</td>";

        
         

?>

<Td><a href="javascript:DeleteRoom('<?php echo $row['room_id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td>

<Td><a href="index.php?page=update_room&room_id=<?php echo $row['room_id']; ?>" style='color:green'><span class='glyphicon glyphicon-edit'></span></a></td>



<?php 

echo "</Tr>";
$inc++;
}




//for shoing Pagination

echo "<tr><td colspan='6'>";
if( $pagi > 0 )
 {
         $last = $pagi - 2;
      echo "<a href = \"index.php?page=display_payment_history&pagi=$last\">Last 10 Records</a> |";
        echo "<a href = \"index.php?page=display_payment_history&pagi=$pagi\">Next 10 Records</a>";
         
		 }
		 else if( $pagi == 0 )
		  {
     echo "<a href = \"index.php?page=display_payment_history&pagi=$pagi\">Next 10 Records</a>";
         }
		 else if( $left_rec < $rec_limit ) {
            $last = $pagi - 2;
            echo "<a href = \"index.php?page=display_payment_history&pagi=$last\">Last 10 Records</a>";
         }
        echo "</td></tr>"; 
		?>
		
</table>
<?php }?>