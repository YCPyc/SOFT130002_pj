<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Single Item</title>
    <link rel="stylesheet" type = "text/css" href="pdetail.css" media = "all">

</head>


<body>
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
    // to get the id from the main page
    $id = $_GET["myid"];
    //view count
    session_start();
    $rs = mysqli_query($con,"SELECT view FROM artworks WHERE $id = artworkID ");
    $row = mysqli_fetch_array($rs);
    $clicks = $row['view'] + 1;
    $update = mysqli_query($con,"UPDATE artworks SET view = $clicks WHERE $id = artworkID ");

    //to receive the image data to display
    $image_query = mysqli_query($con,"select artist,imageFileName,title,yearOfWork,genre,price,view from artworks where $id = artworkID");
    while($rows = mysqli_fetch_array($image_query))
    {
    $img_artist = $rows['artist'];
    $img_src = $rows['imageFileName'];
    $img_name = $rows['title'];
    $img_date = $rows['yearOfWork'];
    $img_genre = $rows['genre'];
    $img_price = $rows['price'];
    $img_view = $rows['view'];}

    //to insert the item to wishlist
    if(isset($_POST['submitBtn']))
    {
        $check = mysqli_query($con,"SELECT * from wishlist WHERE artworkID=$id and userID = '000'");

        //check whether the data already existed
            if($check->num_rows == 0){
                $insert = mysqli_query($con,"INSERT INTO wishlist (userID, artworkID)
VALUES ('000',$id); ");

            }
            else{

                echo "Records already existed.";}
        }
    $con->close(); ?>

    <span class = "logo_subtitle" >
        <h1 style="display: inline-block">Art Store</h1>
        <h5 style="display: inline-block">Where you find GENIUS and EXTRAODINARY </h5>
        <a href="mainPage.php">Main</a>
        <a href="search.html">Search</a>
        <a href="product_detail.html">Product</a>
        <a href="collection.php">Store</a>
        <a href="login_page.html">Login</a>
        <a href="register_page.html">Register</a>
    </span>

    <span class="searchbar" style="display: inline-block">
            <form action="search.php">
                <input type="text" placeholder="search..." name="search">
                <button type="submit" >Search</button>
            </form>
    </span>

    <span class = "nav_01">
        <a href="login_page.html">未登录</a>
    </span>


    <hr/>

    <div class="title">
        <h4><?php echo $img_name; ?></h4>
        <p><a href="search.html"><?php echo $img_artist; ?></a></p>
    </div>

    <hr/>

    <table class="details">
        <tr><td rowspan="9" width = 50% padding-top="0" padding-bottom="0" style="text-align: center"><img src="resources/img/<?php echo $img_src; ?>" width="80%"/></td></tr>
        <tr><td> <p>Total Views:<?php echo $img_view; ?> </p> </td></tr>
        <tr><td> <p>Artist:<?php echo $img_artist; ?> </p> </td></tr>
        <tr><td> <p>Name: <?php echo $img_name; ?></p> </td></tr>
        <tr><td> <p>Genre:<?php echo $img_genre; ?></p> </td></tr>
        <tr><td> <p>Year: <?php echo $img_date; ?></p> </td></tr>
        <tr><td> <hr/> </td></tr>
        <tr><td> <p>Price: <?php echo $img_price; ?> dollars</p> </td></tr>
        <tr><td><form method="post"> <button class="wishbutton" name="submitBtn" onclick="myFunction()">Add to wish bag</button> </form></td></tr>


    </table>

    <script>
        function myFunction(){
            alert("Added Successfully");
        }
    </script>
</body>
</html>、

<!--old css： <style>
       .nav_01 a {float: right; text-align: center; width: 50px; margin-top:2%}
       .logo_subtitle{padding: 0px}
       .title{text-align: center}
       figure{
           float: left;
           padding: 100px;

       }
       /*.discription{*/
       /*    float:right;*/
       /*    padding: 0px;*/
       /*    margin-right: 20%;*/

       /*}*/
       .wishbutton{
           border: none;
           color: aliceblue;
           background-color: black;
           font-size: 16px;
           cursor: pointer;
       }

   </style>-->