<?php
$svalue = $_SERVER["MYSQLCONNSTR_localdb"];
echo $svalue;
$servername = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $svalue);
$dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $svalue);
$username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $svalue);
$password = preg_replace("/^.*Password=(.+?)$/", "\\1", $svalue);


//$username = "zzz";
//$password = "yield";
$dbname = "zzz";
echo "|".$servername;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT user FROM state";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["user"];
} else {
    echo "0 results";
}
$conn->close();
?>