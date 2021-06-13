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

$sqldelete="Select FROM Joins WHERE userID='$_POST[userID]' AND projectID='$_POST[pjID]'";
$sqladd="INSERT INTO Blacklist (projectID, userID)
 VALUES ('$_POST[pjID]','$_POST[userID]' )";


if (!mysqli_query($con,$sqldelete)) {
    die('Error: ' . mysqli_error($con));
}
if (!mysqli_query($con,$sqladd)) {
    die('Error: ' . mysqli_error($con));
}
header("Location: ./search.php");

$con->close(); ?>