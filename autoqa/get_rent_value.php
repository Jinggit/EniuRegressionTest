<?php
$servername = "rdsmnm6famnm6fa.mysql.rds.aliyuncs.com";
$username = "eniu";
$password = "wlmyeniu";
$dbname = "eniu";
$pid = $argv[1];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select rent from eniu_project where project_id = ".$pid;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo $row["rent"]."\n";
	}
} else {
    echo "0 Result ";
}

$conn->close();

?>
