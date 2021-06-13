<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Main Page</title>
    <link rel="stylesheet" type = "text/css" href="mainStyle.css" media = "all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <!-- why css doesnt work anymore? command s is not working for some reasons have to manually save the doc-->

</head>

<body>

<!--Connect to phpMyAdmin Database-->
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "art_store";
$con = mysqli_connect($server, $username, $password, $database);

/*Check connection*/
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

/*queries that are used to individually select all needed attributes from the table*/
$popimage = "select imageFileName from artworks order by view LIMIT 3";
$title = "select title from artworks order by view LIMIT 3";
$newimage = "select imageFileName from artworks order by timeReleased LIMIT 3";
$newimgauthor = "select artist from artworks order by timeReleased LIMIT 3";
$newimgname = "select title from artworks order by timeReleased LIMIT 3";
$newimgdescription = "select description from artworks order by timeReleased LIMIT 3";
$newimgid = "select artworkID from artworks order by timeReleased LIMIT 3";

/*execute the queries above to assign the value to new variables*/
$result = $con->query($popimage);
$titleresult = $con->query($title);
$newimgresult = $con->query($newimage);
$newimg_artist = $con->query($newimgauthor);
$newimg_work = $con->query($newimgname);
$newimg_des = $con->query($newimgdescription);
$newimg_id = $con->query($newimgid);

$con->close(); ?>

<div class="page-container">
<!--  bootstrap implementation-->
    <div id = "demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target ="#demo" data-slide-to="0" class="active"></li>
            <li data-target ="#demo" data-slide-to="1"></li>
            <li data-target ="#demo" data-slide-to="2"></li>

        </ul>

        <!--//still need improvement. Ops is tedious for fetcing the images from array-->
        <!--To fetch the value from the array variable that we declared earlier-->
        <?php  $img_path = $result->fetch_array();?>
        <?php  $img_path2 = $result->fetch_array();?>
        <?php  $img_path3 = $result->fetch_array();?>

        <?php  $title_name = $titleresult->fetch_array();?>
        <?php  $title_name2 = $titleresult->fetch_array();?>
        <?php  $title_name3 = $titleresult->fetch_array();?>

<!--relative on the outside and absolute in the inside create overlapping
https://css-tricks.com/absolute-positioning-inside-relative-positioning/
https://puzzleweb.ru/en/css/12_positioning.php
-->
        <div class='carousel-inner'>
            <div class = 'carousel-item active'><img src="resources/img/<?php echo $img_path[0]; ?>"/>
                <div class="carousel-caption">
                    <h3><?php echo $title_name[0]; ?></h3>
                    <p>POPULAR EXHIBITION 1</p>
                </div>
            </div>
            <div class = 'carousel-item'><img src="resources/img/<?php echo $img_path2[0]; ?>"/>
                <div class="carousel-caption">
                    <h3><?php echo $title_name2[0]; ?></h3>
                    <p>POPULAR EXHIBITION 2</p>
                </div>
            </div>
            <div class = 'carousel-item'><img src="resources/img/<?php echo $img_path3[0]; ?>"/>
                <div class="carousel-caption">
                    <h3><?php echo $title_name3[0]; ?></h3>
                    <p>POPULAR EXHIBITION 3</p>
                </div>
            </div>
<!--new layout for navigation bar and search bar--put it in the center of the carousel to have search engine look-->
            <div class="navbar">
                    <span class = "nav_01">
                        <a href="mainPage.php">Main</a>
                        <a href="search.php">Search</a>
                        <a href="product_detail.php">Product</a>
                        <a href="collection.php">Store</a>
                        <a href="login_page.html">Login</a>
                        <a href="register_page.html">Register</a>
                    </span>
            </div>

            <div class="searchengine">
                <span class = "logo_subtitle" >
                    <h1 style="display: inline-block">Art Store</h1>
                    <h5 style="display: inline-block">Where you find GENIUS and EXTRAODINARY </h5>
                </span>
                </br>
                <span class="searchbar" style="display: inline-block">
                        <form action="search.html">
                            <input type="text" placeholder="search..." name="search" list="options" size="50">
                            <button type="submit" >Search</button>
                        </form>
                </span>
            </div>

        </div>

        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

  <!--  new release section using flexbox-->
    <h3>-------------------------------------------------Newest Release------------------------------------------------</h3>
    <div class="pic_display">

        <div class="img_container">
            <div class="img">
                <?php  $newimg_path = $newimgresult->fetch_array();?>
                <a href="product_detail.html"><img class="displayimg" src="resources/img/<?php echo $newimg_path[0]; ?>" alt="fancystuff"></a>
            </div>
            <div class="img_text">
                <?php  $newimg_author = $newimg_artist->fetch_array();?>
                <?php  $newimg_name = $newimg_work->fetch_array();?>
                <?php  $newimg_text = $newimg_des->fetch_array();?>
                <?php  $newimg_num = $newimg_id->fetch_array();?>
                <h3><?php echo $newimg_name[0]; ?></h3>
                <h3>Author: <?php echo $newimg_author[0]; ?></h3>
                <p>
                    <?php echo $newimg_text[0]; ?>
                </p>
                <a  class="figname" href="product_detail.php?myid=<?php echo $newimg_num[0]; ?>">LEARN MORE</a>
            </div>
        </div>

        <div class="img_container">
            <div class="img_text">
                <?php  $newimg_author2 = $newimg_artist->fetch_array();?>
                <?php  $newimg_name2 = $newimg_work->fetch_array();?>
                <?php  $newimg_text2 = $newimg_des->fetch_array();?>
                <?php  $newimg_num2 = $newimg_id->fetch_array();?>
                <h3><?php echo $newimg_name2[0]; ?></h3>
                <h3>Author: <?php echo $newimg_author2[0]; ?></h3>
                <p>
                    <?php echo $newimg_text2[0]; ?>
                </p>
                <a  class="figname" href="product_detail.php?myid=<?php echo $newimg_num2[0]; ?>">LEARN MORE</a>
            </div>
            <div class="img">
                <?php  $newimg_path2 = $newimgresult->fetch_array();?>
                <a href="product_detail.html"><img class="displayimg" src="resources/img/<?php echo $newimg_path2[0]; ?>" alt="fancystuff"></a>
            </div>
        </div>

        <div class="img_container">
            <?php  $newimg_author3 = $newimg_artist->fetch_array();?>
            <?php  $newimg_name3 = $newimg_work->fetch_array();?>
            <?php  $newimg_text3 = $newimg_des->fetch_array();?>
            <?php  $newimg_num3 = $newimg_id->fetch_array();?>
            <div class="img">
                <?php  $newimg_path3 = $newimgresult->fetch_array();?>
                <a href="product_detail.html"><img class="displayimg" src="resources/img/<?php echo $newimg_path3[0]; ?>" alt="fancystuff"></a>
            </div>
            <div class="img_text">
                <h3><?php echo $newimg_name3[0]; ?></h3>
                <h3>Author: <?php echo $newimg_author3[0]; ?></h3>
                <p >
                    <?php echo $newimg_text3[0]; ?>
                </p>
                <a class="figname" href="product_detail.php?myid=<?php echo $newimg_num3[0]; ?>">LEARN MORE</a>
            </div>
        </div>



        </div>
<!--footer problem：for position element, need to consider the parent element. If the parent element is body, the position is decided relative to the initial containing block which is viewport-->

        <footer class="footer">
            <p>ArtStore. Produced and maintained by YC. All rights reserved.</p>
        </footer>
    </div>

</body>

<script>

</script>

</html>

<!--/*old codes*/-->
<!-- Carousel bootstrap
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->

<!-- Carousel bootstrap additional css <style>
       /* Make the image fully responsive */
       .carousel-inner ig {
           width: 100%;
           height: 600px;
       }

       .carousel-inner{
           position: relative;
           text-align: center;
           color: white;
       }
       .searchengine{
           position: absolute;
       }

   </style>-->

<!-- Old CSS <style>
    .nav_01 a {float: right; text-align: center; width: 50px; padding-top: 2%; padding-bottom:2%; padding-left:0; padding-right:0;}
    .logo_subtitle{padding: 0px}
    .head_pic{text-align: center}


    .mostviewed{
        text-align: center;
    }
    .content-wrap{
        min-height: 100vh;
        overflow: hidden;
        position: relative;
        padding-bottom: 100px;
    }
    .footer{
        position: absolute;
        bottom: 0;
        width: 100%;
        background: grey;
    }
    /*figure{*/
    /*    width:20%;*/
    /*    float: left;*/
    /*    margin-left:80px;*/
    /*    margin-right: 80px;*/
    /*    text-align:center;*/
    /*    padding:0px;*/
    /*}*/
    .column {
        float: left;
        padding: 0px;
        text-align: center;
        margin: 10px;

    }
    .displayimg{
        width:356px;
        height: 640px;
    }

    </style>-->

<!--JS manual carousel
    <div class="navbar">
       <span class = "nav_01">
           <a href="html_Spring.php">首页</a>
           <a href="search.html">搜索</a>
           <a href="product_detail.html">详情</a>
           <a href="collection.html">收藏</a>
           <a href="login_page.html">登陆</a>
           <a href="register_page.html">注册</a>
       </span>
   </div>

   <div class="searchengine">
       <span class = "logo_subtitle" >
           <h1 style="display: inline-block">Art Store</h1>
           <h5 style="display: inline-block">Where you find GENIUS and EXTRAODINARY </h5>
       </span>
       </br>
       <span class="searchbar" style="display: inline-block">
                           <form action="search.html">
                               <input type="text" placeholder="search..." name="search" list="options" size="50">
                                   <datalist id="options">
                                       <option label="Hello" value="Hello"> Hello<option>
                                   </datalist>
                               <button type="submit" >Search</button>
                           </form>
                   </span>
   </div>

   <div class="slideshow-container">
       <div class="mySlide fade">
           <img src="resources/img/48.jpg" width="100%" height="800px"/>
       </div>
       <div class="mySlide fade">
           <img src="resources/img/58.jpg" width="100%" height="800px"/>
       </div>
       <div class="mySlide fade">
           <img src="resources/img/70.jpg" width="100%" height="800px"/>
       </div>

       <a class="prev" onclick="plusSlide(-1)">&#10094;</a>
       <a  class="next" onclick="plusSlide(1)">&#10095;</a>
   </div>-->

<!-- original main page body layout <hr/>

   <div class="head_pic">
       <a href="product_detail.html"><img src="resources/img/7.jpg" alt = "family" /></a>
   </div>

   <hr/>

   <div class="mostviewed">
       <h5>Most Viewed</h5>
   </div>

   <div class="pic_display">
       <div class = "row">

           <div class="column">

                   <a href="product_detail.html"><img class="displayimg" src="resources/img/14.jpg" alt="fancystuff"></a>

                   <h3>Two Nudes</h3>
                   <h3>Author: Pablo Picasso</h3>
                   <p >
                       The terracotta shades and heavy monumentality of the figures in <em>Two Nudes</em> derive from Picasso\'s interest at the time in the ancient Iberian sculpture of his native Spain.
                   </p>
                   <a  class="figname" href="product_detail.html">LEARN MORE</a>

           </div>

           <div class="column">

                   <a href="product_detail.html"><img class="displayimg" src="resources/img/12.jpg" alt="fancystuff"></a>

                   <h3>Portrait of Gertrude Stein</h3>
                   <h3>Author: Pablo Picasso</h3>
                   <p>
                           By 1905 Picasso became a favorite of the American art collectors Leo and Gertrude Stein. Their older brother Michael Stein and his wife Sarah also became collectors of his work.
                   </p>
                   <a  class="figname" href="product_detail.html">LEARN MORE</a>

           </div>

           <div class="column">

                   <a href="product_detail.html"><img class="displayimg" src="resources/img/8.jpg" alt="fancystuff"></a>
                   <h3>Portrait of Daniel-Henry Kahnweiler</h3>
                   <h3>Author: Pablo Picasso</h3>
                   <p >
                           In 1907 Picasso joined an art gallery that had recently been opened in Paris by Daniel-Henry Kahnweiler. Kahnweiler was a German art historian, art collector who became one of the premier French art dealers of the 20th century.
                   </p>
                   <a class="figname" href="product_detail.html">LEARN MORE</a>

           </div>

       </div>
   </div>

   <footer class="footer">
       <p>ArtStore. Produced and maintained by YC. All rights reserved.</p>
   </footer>
</div>-->

<!-- JS script for Carousel
var slideIndex=1;
showSlide(slideIndex);
function plusSlide(n){
showSlide(slideIndex+=n);
}
function currentSlide(n){
showSlide(slideIndex=n);

}

function showSlide(n){
var i;
var slides=document.getElementsByClassName("mySlide");

slideIndex++;
if(slideIndex> slides.length){
slideIndex = 1;
}
if(n> slides.length){
slideIndex = 1;
}
if(n<1){
slideIndex = slides.length;
}
for(i = 0; i<slides.length;i++){
slides[i].style.display="none";
}
slides[slideIndex-1].style.display="block";
setTimeout(showSlide,4000);


}-->
