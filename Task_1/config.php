<?php
$servername = "localhost";
$username = "id17257114_localhost";
$password = "!R(Qf6J6YjFh_P7-";
$database = "id17257114_xyzbank";
//$conn = mysqli_connect($servername, $username, $password, $database);
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Could not connect to the database due to the following error --> " . mysqli_connect_error());
}
?>