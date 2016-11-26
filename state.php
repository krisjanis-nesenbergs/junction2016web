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

$sql = "SELECT user, s1, s2 FROM state";
$result = $conn->query($sql);

$usr = 0;
$s1 = 0;
$s2 = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $usr = $row["user"];
    $s1 = $row["s1"];
    $s2 = $row["s2"];
}
$conn->close();

echo $usr." ".$s1." ".$s2;

?>