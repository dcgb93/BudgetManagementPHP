<?php 
$q=mysqli_query($conn,"select * from goal");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No Goals exists !!!</h2>";
echo "<a style='text-decoration:underline' href='index.php?pagi=add_goal'>Add New Goal ?</a>";}
else
{
?>
<script>
	function Deletegoal(id)
	{
		if(confirm("You want to delete this Goal ?"))
		{
		window.location.href="delete_goal.php?id="+id;
		}
	}
</script>
<h2 style="color:#00FFCC">All Goals</h2>

<table class="table table-bordered" style="background-color: #f6f6f6;padding:5px">
	<tr>
		<form method="post" action="index.php?page=search_goal">
		<td colspan="4">
		<input type="text" placeholder="Search Goal" name="searchGoal" class="form-control"required />
		</td>
		<td colspan="4">
		<input type="submit" value="Search Goal" name="sub" class="btn btn-success" />
		</td>
		</form>
	</tr>
	<tr>
		<td colspan="8"><a href="index.php?page=add_goal">Add New Goal</a></td>
	</tr>
	<Tr class="active">
		<th>Sr.No</th>
		<th>Goal Name</th>
		<th>Description</th>
		<th>Amount</th>
		<th>Category</th>
		<th>Date</th>
		<th>Delete</th>
		<th>Update</th>
	</Tr>
		<?php
         error_reporting(1);
         $rec_limit =10;
         
         /* Get total number of records */
        
		 $sql = "SELECT count(goal_id) FROM goal ";
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
         $sql = "SELECT * ". "FROM goal ".
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
echo "<td>".$row['name']."</td>";
echo "<td>".$row['description']."</td>";
echo "<td>".$row['goal_amount']."</td>";

$q1=mysqli_query($conn,"select * from category where cat_id='".$row['cat_id']."'");
$r1=mysqli_fetch_assoc($q1);

echo "<td>".$r1['cat_name']."</td>";
echo "<td>".$row['goal_date']."</td>";
        
         

?>

<Td><a href="javascript:Deletegoal('<?php echo $row['goal_id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td>

<Td><a href="index.php?page=update_goal&goal_id=<?php echo $row['goal_id']; ?>" style='color:green'><span class='glyphicon glyphicon-edit'></span></a></td>
<?php 

echo "</Tr>";
$inc++;
}




//for shoing Pagination

echo "<tr><td colspan='8'>";
if( $pagi > 0 )
 {
         $last = $pagi - 2;
      echo "<a href = \"index.php?page=display_member&pagi=$last\">Last 10 Records</a> |";
        echo "<a href = \"index.php?page=display_member&pagi=$pagi\">Next 10 Records</a>";
         
		 }
		 else if( $pagi == 0 )
		  {
     echo "<a href = \"index.php?page=display_member&pagi=$pagi\">Next 10 Records</a>";
         }
		 else if( $left_rec < $rec_limit ) {
            $last = $pagi - 2;
            echo "<a href = \"index.php?page=display_member&pagi=$last\">Last 10 Records</a>";
         }
        echo "</td></tr>"; 
		?>
		
</table>
<?php }?>