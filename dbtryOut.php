<?php
/*$server = "localhost";
$username = "root";
$password = "";
$database = "art_store";
$con = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$con) {
    echo "sad";
}

$image = "SELECT * FROM artworks";
$result = $con->query($image);

while($row = $result->fetch_assoc())
{
 echo $row['imageFileName'];
}

$con->close();
*/?>

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

$image = "select imageFileName from artworks order by view LIMIT 3";
$result = $con->query($image);

$con->close(); ?>

<?php
while($row = $result->fetch_array()){
    $row = $result;
}

echo $row[0];

?>
<?php echo $result[0]; ?>
<?php echo $result[1]; ?>






