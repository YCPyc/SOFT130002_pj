<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "art_store";
$con = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$searchselect="SELECT * FROM artworks WHERE title='$_POST[searchContent]'";



$con->close(); ?>
