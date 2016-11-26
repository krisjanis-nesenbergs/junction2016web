<?php

$conn = new mysqli(MYSQLCONNSTR_localdb, "zzz", "yield", "state");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT user FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["user"];
} else {
    echo "0 results";
}
$conn->close();
?>