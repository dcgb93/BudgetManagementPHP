<?php 
$search=$_POST['searchGoal'];
$q=mysqli_query($conn,"select * from goal where name='$search' or description='$search'");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No Results found !!!</h2>";
}
else
{
?>
<script>
	function DeleteMember(id)
	{
		if(confirm("You want to delete this Goal?"))
		{
		window.location.href="delete_goal.php?id="+id;
		}
	}
</script>
<h2 style="color:#00FFCC; text-decoration:underline" align="center" >Results Found</h2>
<table class="table table-bordered" style="background-color: #f6f6f6;padding:5px">
	
	<tr>
		<td colspan="16"><a href="index.php?page=display_goal">Go Back</a></td>
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


$i=1;
while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['description']."</td>";
echo "<td>".$row['goal_amount']."</td>";

$q1=mysqli_query($conn,"select * from category where cat_id='".$row['cat_id']."'");
$r1=mysqli_fetch_assoc($q1);

echo "<td>".$r1['cat_name']."</td>";
echo "<td>".$row['goal_date']."</td>";

?>

<Td><a href="javascript:DeleteMember('<?php echo $row['goal_id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td>

<Td><a href="index.php?page=update_goal&goal_id=<?php echo $row['goal_id']; ?>" style='color:green'><span class='glyphicon glyphicon-edit'></span></a></td>
<?php 

echo "</Tr>";
$i++;
}
		?>
		
</table>
<?php }?>