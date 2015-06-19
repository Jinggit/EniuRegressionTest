<?php
$servername = "rdsmnm6famnm6fa.mysql.rds.aliyuncs.com";
$username = "eniu";
$password = "wlmyeniu";
$dbname = "eniu";
$pid = $argv[1];
$tid = 54;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "update eniu_account_flow set created_time=1428624000 where project_id = ".$pid." and type_id = ".$tid;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully\n";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
