
<?php
$servername = "mysql";
$username = "root";
$password = "";
$db = "laravel";


$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 echo "Connection Succesfully";

?>
