<?php
$serverName = "localhost";
$UserName = "root";
$Password = "";
$dbName = "special";
// connectind to database
$con=mysqli_connect( $serverName,$UserName,$Password,$dbName);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="Style.css">
    <title>Document</title>
</head>
<body>
    
        <div class="nav">
            <div class="navbar">
                <h2>SwellOverEverythin</h2>
                <ul>
                    <li><a href=""></a>Home</li>
                    <li><a href=""></a>About</li>
                    <li><a href=""></a>Shop</li>
                    <li><a href=""></a>Contact</li>
                </ul>
               
            </div>
            <h1>Welcome to SwellOverEverythin</h2>
            <p>Best Local brand</p>
            <input type="button" value="Shop Now">
        </div>
   
        <section>
            <div class="about">
                <h1>About Us</h1>
                <hr>
                <img src="images/About.jpg" id="about_img">
                <p>kjfdjksngdf gdkfjgbuisdf sdfuisdf sdfuds fuisdf 
                    sdufnjksfn sdjfiudsf sduifsdf sdfusdfi sdfudsds
                    sdfiusdfsdfiosdf dsiufsidfs fuisdnfusidf sdfnsduifs
                    asdnusai sfusidf susndasd asdnas hjhefds sdfbsdsd sdhbsd. 
                </p>
            </div>
        </section>

        <section id="shop">
            <div class="shop">
                <h1>
                    Shop with Us
                </h1>
                <hr>
               <h3>Product</h3>
                
                <div class="cont">

                <?php
                    $query = " SELECT * FROM pic";

                    $result = mysqli_query($con, $query);
                    if(mysqli_query($con, $query) > 0){
                        while ($row = mysqli_fetch_array($result)) {
                    
                ?>
                

               

           

                <div class="box">
                    <dvi class="slide-img">
                        <img src="images/img1.jpg" alt="1">
                    </dvi>
                    <div class="detail">
                        <div class="type">
                            <a href="#"><?php $row["Description"]; ?></a>
                            <span><?php $row["price"]; ?></span>
                        </div> 
                        <div class="btn-buy">
                            <input type="button" value="Add To Cart">
                        </div>
                        
                        
                    </div>
                    
                </div>
               <?php
                        }
                    }
               ?>

             
            </div>
            <div class="btn">
                <input type="button" value="View Products">

            </div>
            
             
            </div>
        </section>
        <footer>

        </footer>
    <script src="script.js"></script>
</body>
</html>

