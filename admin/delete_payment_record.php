<?php 
include('../connection.php');


mysqli_query($conn,"delete from payment_history_room where room_id='".$_GET['id']."'");

header('location:index.php?page=display_payment_history');

?>