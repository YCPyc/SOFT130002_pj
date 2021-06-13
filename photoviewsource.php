<?php
// include database connection
include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql="SELECT ";

if (!mysqli_query($con,$sql))
{
    die('Error: ' . mysqli_error($con));
}

// select the image
$query = "select imageFileName from artworks ORDER BY view LIMIT 3 ";
$stmt = $con->prepare( $query );

// bind the id of the image you want to select
$stmt->bindParam(1, $_GET['id']);
$stmt->execute();

// to verify if a record is found
$num = $stmt->rowCount();

mysqli_close($con);
?>