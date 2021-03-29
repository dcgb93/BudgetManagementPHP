<?php 
$search=$_POST['searchRoom'];
//echo $search;	
$q=mysqli_query($conn,"select * from payment_history_room where name='$search'");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No Results found !!!</h2>";

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
<h2 style="color:white; text-decoration:underline" align="center" >Results Found</h2>

<table class="table table-bordered" style="background-color: rgba(27, 27, 50, 0.8); color: white;padding:5px">
	
	<tr>
		<td colspan="9"><a href="index.php?page=display_payment_history">Go Back </a></td>
	</tr>
	<Tr>
         <th>Sr.No</th>
		<th>Room Name</th>
		<th>Room Budget</th>
		<th>Creation Date</th>
		<th>Delete</th>
		<th>Update</th>
	</Tr>
		<?php 


$i=1;
while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td>".$i."</td>";


// $q1=mysqli_query($conn,"select * from category where cat_id='".$row['cat_id']."'");
// $r1=mysqli_fetch_assoc($q1);

echo "<td>".$row['name']."</td>";
echo "<td>".$row['budget']."</td>";
echo "<td>".$row['room_date']."</td>";

?>

<Td><a href="javascript:DeleteRoom('<?php echo $row['room_id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td>

<Td><a href="index.php?page=update_room&room_id=<?php echo $row['room_id']; ?>" style='color:green'><span class='glyphicon glyphicon-edit'></span></a></td>
<?php 

echo "</Tr>";
$i++;
}
		?>
		
</table>
<?php }?>