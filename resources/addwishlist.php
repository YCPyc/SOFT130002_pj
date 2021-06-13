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


$sqladd="INSERT INTO wishlist (userID, artworkID)
 VALUES ('$_POST[pjID]','$_POST[userID]' )";



if (!mysqli_query($con,$sqladd)) {
    die('Error: ' . mysqli_error($con));
}
header("Location: ../../pages_owner/blacklist_page.php");

mysqli_close($con);
?>
