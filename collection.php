<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Collection</title>
    <link href="collectionStyling.css" type="text/css" media="all" rel="stylesheet">
</head>

<body>

<div class="navbar">
        <span class = "logo_subtitle" >
            <h1 style="display: inline-block">Art Store</h1>
            <h5 style="display: inline-block">Where you find GENIUS and EXTRAODINARY </h5>
        </span>

    <span class="searchbar" style="display: inline-block">
            <form action="search.php">
                <input type="text" placeholder="search..." name="search" list="options">

                <button type="submit" >Search</button>
            </form>
        </span>

    <span class = "nav_01">
            <a href="mainPage.php">Main</a>
            <a href="search.php">Search</a>
            <a href="product_detail.php">Store</a>
            <a href="login_page.html">Login</a>
            <a href="register_page.html">Register</a>
        </span>
</div>

<hr/>

<div class="personalinfo">

            <img src="resources/Screen Shot 2021-04-07 at 9.42.11 PM.png" height=200px width=200px />
            <div style="margin: 0 auto; width: 200px">
                <p style="text-align: left">Name: Yancheng Pan</p>
                <p style="text-align: left">Date of Birth: 12/06/1900</p>
                <p style="text-align: left">Gender: Male</p>
            </div>

</div>

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

    $likeid = mysqli_query($con,"select artworkID from wishlist where userID ='0'");
    echo "<ul id='fav'>";
    while($row = mysqli_fetch_array($likeid))
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
        echo "<table>";

        echo "<tr class='loves'>";
        echo "<td rowspan='7'>1.</td>";
        echo "<td class='lovespic' rowspan='7'>";
        echo "<img src='resources/img/$img_src' width='50%'/>";
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

        echo " </table>";
        echo "<form method='post'><button name = 'removeBtn' class='removebtn' onclick=''>remove</button></form>";
        echo "</li>";


    }
    echo "</ul>";
    if(isset($_POST['removeBtn']))
    {


        $delete = mysqli_query($con,"DELETE FROM wishlist WHERE artworkID=$img_id");
        header("location:collection.php");
    }

    $con->close(); ?>

<!--<ul id="fav">
    <li>
        <table>
            <tr class="loves">
                <td rowspan="7">1.</td>
                <td class="lovespic" rowspan="7"><img src="resources/img/<?php /*echo $img_src; */?>" width="50%"/></td>

            </tr>
            <tr class="lovesinfo"><td> <h3> History</h3> </td></tr>
            <tr class="lovesinfo"><td> <p>Artist: <?php /*echo $img_artist; */?></p> </td></tr>
            <tr class="lovesinfo"><td> <p>Name: <?php /*echo $img_name; */?></p> </td></tr>
            <tr class="lovesinfo"><td> <p>Genre:<?php /*echo $img_genre; */?></p> </td></tr>
            <tr class="lovesinfo"><td> <p>Location: Louvre, Paris</p> </td></tr>
            <tr class="lovesinfo"><td> <p>Price: 180,000,000 dollars</p> </td></tr>


        </table>
       <form method="post"><button name = "removeBtn" class="removebtn">remove</button></form>
    </li>

</ul>-->


</body>

<script>
   /* function removeItem() {

        // Declaring a varible to get select element
        var a = document.getElementById("fav");
        var item = document.getElementById("<?php $row[0] ?>");
        a.removeChild(item);
    }*/
/*document.getElementById("fav").addEventListener('click',(event)=>{
    if(event.target.tagName==='removeBtn'){
        const button = event.target;
        const li = button.parentNode;
        const ul = li.parentNode;
        if(button.textContent==='remove'){
            ul.removeChild(li);

        }
    }
});*/
</script>

</html>