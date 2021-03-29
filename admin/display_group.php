<?php 
$q=mysqli_query($conn,"select * from expense");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No Expense Records exists !!!</h2>";
echo "<a style='text-decoration:underline' href='index.php?page=add_group'>Add New Expense ?</a>";
}
else
{
?>
<script>
	function DeleteExpense(id)
	{
		if(confirm("You want to delete this Record ?"))
		{
		window.location.href="delete_group.php?id="+id;
		}
	}
</script>
<h2 style="color:white;text-decoration:underline" align="center">Budget (Expense Management)</h2>

<table class="table table-bordered" style="background-color: rgba(27, 27, 50, 0.8); color: white;padding:5px">
	<tr>
		<form method="post" action="index.php?page=search_group" >
		<td colspan="7">
		<select name="searchGroup" class="form-control" required>
			<option value="">Select category</option>
			<?php 
$q1=mysqli_query($conn,"select * from category");
while($r1=mysqli_fetch_assoc($q1))
{
echo "<option value='".$r1['cat_id']."'>".$r1['cat_name']."</option>";
}
			?>
		</select>
		</td>
		<td colspan="5">
		<input type="submit" value="Search category" name="sub" class="btn btn-success" />
		</td>
		</form>
	</tr>
	<tr>
		<td colspan="12">
		
		<a title="Add New Expense Records" href="index.php?page=add_group"><span class="glyphicon glyphicon-plus"</a>
		&nbsp; &nbsp; 
		
		<!-- <a title="Print all Loan Records" href="print_loan_record.php"><span class="glyphicon glyphicon-print"</a> -->
		
		</td>
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
         error_reporting(1);
         $rec_limit =10;
         
         /* Get total number of records */
        
		 $sql = "SELECT count(expense_id) FROM expense ";
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
         $sql = "SELECT * ". "FROM expense ".
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

$q1=mysqli_query($conn,"select * from category where cat_id='".$row['cat_id']."'");
$r1=mysqli_fetch_assoc($q1);

echo "<td>".$r1['cat_name']."</td>";
echo "<td>".$row['amount']."</td>";
echo "<td>".$row['expense_date']."</td>";


        
         

?>

<Td><a href="javascript:DeleteExpense('<?php echo $row['expense_id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td>

<Td><a href="index.php?page=update_expense&expense_id=<?php echo $row['expense_id']; ?>" style='color:green'><span class='glyphicon glyphicon-edit'></span></a></td>



<?php 

echo "</Tr>";
$inc++;
}




//for shoing Pagination

echo "<tr><td colspan='12'>";
if( $pagi > 0 )
 {
         $last = $pagi - 2;
      echo "<a href = \"index.php?page=display_group&pagi=$last\">Last 10 Records</a> |";
        echo "<a href = \"index.php?page=display_group&pagi=$pagi\">Next 10 Records</a>";
         
		 }
		 else if( $pagi == 0 )
		  {
     echo "<a href = \"index.php?page=display_group&pagi=$pagi\">Next 10 Records</a>";
         }
		 else if( $left_rec < $rec_limit ) {
            $last = $pagi - 2;
            echo "<a href = \"index.php?page=display_group&pagi=$last\">Last 10 Records</a>";
         }
        echo "</td></tr>"; 
		?>
		
</table>
<?php }?>