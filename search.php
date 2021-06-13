<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Page</title>
    <link rel="stylesheet" type="text/css" href="searchstyle.css" media="all">
</head>

<body>

<div class="navbar">
        <span class = "logo_subtitle" >
            <h1 style="display: inline-block">Art Store</h1>
            <h5 style="display: inline-block">Where you find GENIUS and EXTRAODINARY </h5>
        </span>

    <!--//search bar google search page display how to transfer the form value to php database-->
    <span class="searchbar" style="display: inline-block">
            <form>
                <input type="text" placeholder="search..." name="search" list="options">
                <datalist id="options">
                    <option label="Hello" value="Hello"> Hello<option>
                </datalist>
                <button type="submit" onclick="window.location.href='search.php';">Search</button>
            </form>
        </span>

    <span class = "nav_01">
            <a href="mainPage.php">Main</a>
            <a href="search.php">Search</a>
            <a href="product_detail.php">Product</a>
            <a href="login_page.html">Login</a>
            <a href="register_page.html">Register</a>
        </span>
</div>

<hr/>

<div class="searchbox">
    <div class="searchbar2">
        <form method="post">
            <input type="text" placeholder="Search Content" name="searchContent">
            <p>Order by price</p>
            <input type="radio" name="vieworder" value="1" id="1">
            <button type="submit" name="searchBtn" onclick="">Search</button>
        </form>
            <!--<table>
                <tr>
                    <td>


                    </td>
                    <td>
                        <p>Please Select Date</p>
                        <input type="radio" name="genre" value="1" id="4">
                        <label for= "4"> 1 </label><br>
                        <input type="radio" name="genre" value="2" id="5">
                        <label for= "5"> 2 </label><br>
                        <input type="radio" name="genre" value="3" id="6">
                        <label for= "6"> 3 </label><br>
                    </td>
                </tr>
            </table>-->
    </div>

</div>

<hr/>

<!--<table class="collection">
    <tr class="personalinfo" >
    <tr class="loves">
        <td rowspan="7">1.</td>
        <td class="lovespic" rowspan="7"><img src="resources/img/35.jpg" width="50%"/></td>
    </tr>
    <tr class="lovesinfo"><td> <h3> History</h3> </td></tr>
    <tr class="lovesinfo"><td> <p>Artist: Jean-Auguste-Dominique Ingres</p> </td></tr>
    <tr class="lovesinfo"><td> <p>Medium: Oil Painting</p> </td></tr>
    <tr class="lovesinfo"><td> <p>School: Romanticism</p> </td></tr>
    <tr class="lovesinfo"><td> <p>Location: Louvre, Paris</p> </td></tr>
    <tr class="lovesinfo"><td> <p>Price: 180,000,000 dollars</p> </td></tr>

</table>
-->
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

if(isset($_POST['searchBtn'])){
    if(isset($_POST['vieworder'])){
        $searchedID=mysqli_query($con,"SELECT artworkID FROM artworks WHERE artist='$_POST[searchContent]' order by price");
        }
    else{
        $searchedID=mysqli_query($con,"SELECT artworkID FROM artworks WHERE artist='$_POST[searchContent]'");
    }
    echo "<ul>";
    while($row = mysqli_fetch_array($searchedID))
    {
        $preference = mysqli_query($con,"select artworkID, artist,imageFileName,title,timeReleased,genre,price from artworks where $row[0] = artworkID");


        while($rows = mysqli_fetch_array($preference))
        {
            $img_artist = $rows['artist'];
            $img_src = $rows['imageFileName'];
            $img_name = $rows['title'];
            $img_date = $rows['timeReleased'];
            $img_genre = $rows['genre'];
            $img_price = $rows['price'];
            $img_id = $rows['artworkID'];

        }
        echo "<li>";
        echo "<table class='collection' width='100%'>";
        echo "<tr class='loves'>";
        echo "<td rowspan='7'>1.</td>";
        echo "<td class='lovespic' rowspan='7'>";
        echo "<img src='resources/img/$img_src' width='50%' height='400px'/>";
        echo "</td>";
        echo "</tr>";

        echo "<tr class='lovesinfo'><td> <h3> History</h3> </td></tr>";
        echo "<tr class='lovesinfo'>" ."<td>" ."<p>";
        echo "Artist: " .$img_artist;
        echo "</p>" ."</td>". "</tr>";

        echo "<tr class='lovesinfo'>" ."<td>" ."<p>";
        echo "Name: " .$img_name;
        echo "</p> </td></tr>";

        echo "<tr class='lovesinfo'>" ."<td>" ."<p>";
        echo "Upload Date: " .$img_date;
        echo "</p>" ."</td>". "</tr>";


        echo "<tr class='lovesinfo'>" ."<td>" ."<p>";
        echo "Price: " .$img_price;
        echo "</p>" ."</td>" ."</tr>";
        echo "</table>";
        echo "</li>";




    }
    echo "</ul>";
}







$con->close(); ?>




<ul class="pagination" style="position: relative">
    <li><a href="#"><</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">></a></li>
</ul>

</body>
</html>