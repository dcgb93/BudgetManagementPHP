<?php 
include('../connection.php');


$q=mysqli_query($conn,"delete from goal where goal_id='".$_GET['id']."'");

header('location:index.php?page=display_goal');

?>