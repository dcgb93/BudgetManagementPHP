<?php
// $conn=mysqli_connect("127.0.0.1:3305","root","12345","budget_management");


// $cleardb_url = parse_url(getenv("mysql://b7bb72b188e030:f338dec4@us-cdbr-east-03.cleardb.com/heroku_51f8455bb22f3af?reconnect=true"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect("us-cdbr-east-03.cleardb.com", "b7bb72b188e030", "f338dec4", "heroku_51f8455bb22f3af");

?>