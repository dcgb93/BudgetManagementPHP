<?php 
$search=$_POST['searchGroup'];
$q=mysqli_query($conn,"select * from expense where cat_id='$search' ");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any Records exists !!!</h2>";
}
else
{
?>
<script>
	function DeleteGroup(id)
	{
		if(confirm("You want to delete this Group ?"))
		{
		window.location.href="delete_group.php?id="+id;
		}
	}
</script>
<h2 style="color:#00FFCC; text-decoration:underline" align="center" >Results Found</h2>

<table class="table table-bordered"  style="background-color: rgba(27, 27, 50, 0.8); color: white;padding:5px">
	
	
	<tr>
		<td colspan="16"><a href="index.php?page=display_group">Go Back to Expense Page</a></td>
	</tr>
	<Tr >
	    <th>Sr.No</th>
        <th>Expense Name</th>
        <th>Category Name</th>
		<th>Amount</th>
		<th>Expense Date</th>
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
	
	$q1=mysqli_query($conn,"select * from category where cat_id='".$row['cat_id']."'");
	$r1=mysqli_fetch_assoc($q1);
	
	echo "<td>".$r1['cat_name']."</td>";
	echo "<td>".$row['amount']."</td>";
	echo "<td>".$row['expense_date']."</td>";
?>

<Td><a href="javascript:DeleteGroup('<?php echo $row['expense_id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td>

<Td><a href="index.php?page=update_expense&expense_id=<?php echo $row['expense_id']; ?>" style='color:green'><span class='glyphicon glyphicon-edit'></span></a></td>

<?php 
echo "</Tr>";
$i++;
}
		?>
		
</table>
<?php }?>