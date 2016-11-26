<?php
$svalue = $_SERVER["MYSQLCONNSTR_localdb"];
$servername = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $svalue);
$dbname = "zzz";
$username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $svalue);
$password = preg_replace("/^.*Password=(.+?)$/", "\\1", $svalue);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT user FROM state";
$result = $conn->query($sql);

$usr = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $usr = $row["user"];
}
$conn->close();

echo $usr." ".rand(0,4)." ".rand(0,2);

?>