<?php 
include('../connection.php');

mysqli_query($conn,"delete from expense where expense_id='".$_GET['id']."'");

// mysqli_query($conn,"delete from groups where group_id='".$_GET['id']."'");

header('location:index.php?page=display_group');

?>