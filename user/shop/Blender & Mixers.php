<?php
session_start();

if (isset($_SESSION['no']) && isset($_SESSION['username'])) {

?>

<?php

include '../components/connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Ridge Apparatus</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    
<section id="header">
        <a href="#"><img src="../img/logs.png" class="logo"alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="../index.php">Home</a></li>
                <li><a class="active" href="#">Products</a></li>
                <li><a href="../about/about.php">About</ax/li>
                <li><a href="../contact/contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                <li><a onclick="toggleMenu()"> <?php echo $_SESSION['firstname']; ?>&nbsp<i class="fa fa-user"></i></a></li>  
                <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="../../im  g/profile.png" alt="">
                                <h3>View Profile</h3>
                            </div>
                            <hr>
                            <a href="../../index.php" class="sub-link">
                                <img src="../../img/logout.png" alt="">
                                <p>Logout</p>
                                <span>></span>
                            </a>
                        </div>
                </div>   
                <a href="#" id="close"><i class="fa fa-times"></i></a>
            </ul>
        </div>
        
        <div id="mobile">
            <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
            
        </div>
    </section>

    <section id="page-header">
        <h2>Blender & Mixers</h2>
        <p>Advanced Cleaning Technology</p>
    </section>
    
    <section id="product1" class="section-p1">
    <div id="categories">
    <div id="categories">

    <a href="shop.php" class="dropbtn">All</a>
<div class="dropdown">

<button class="dropbtn">Cleaning Appliances</button>
<div class="dropdown-content1">
        <a href="Vacuum.php" class="category-button">Vacuum Cleaners</a>
        <br>
        <a href="Dish Sterilizer.php" class="category-button">Dish Sterilizer</a>
        <br>
        <a href="Insect Sterilizer.php" class="category-button">Insect Sterilizer</a>
    </div>
</div>

<div class="dropdown">
<button class="dropbtn1">Kitchen Appliances</button>
<div class="dropdown-content2">
        <a href="Refrigerator.php" class="category-button">Refrigerators</a>
        <br>
        <a href="Coffee Maker.php" class="category-button">Coffee Maker</a>
        <br>
        <a href="Ovens.php" class="category-button">Air Fryer & Ovens</a>
        <br>
        <a href="Blender & Mixers.php" class="category-button">Blender and Mixers</a>
    </div>
</div>  

<div class="dropdown">
<button class="dropbtn">Laundry Appliances</button>
<div class="dropdown-content3">
<a href="Washing Machine.php" class="category-button">Washing Machine</a>
        <br>
        <a href="Dryer.php" class="category-button">Dryer</a>
        <br>
        <a href="Iron.php" class="category-button">Irons</a>
        <br>
        <a href="#" class="category-button">Ironing Boards</a>
    </div>
</div>       

<div class="dropdown">
<button class="dropbtn">Climate Control Appliances</button>
<div class="dropdown-content4">
        <a href="Aircon.php" class="category-button">Air Conditioners</a>
        <br>
        <a href="#" class="category-button">Heaters</a>
        <br>
        <a href="Fans.php" class="category-button">Fans</a>
        <br>
        <a href="#" class="category-button">Air Purifiers</a>
    </div>
</div>      

<div class="dropdown">
<button class="dropbtn">Multimedia Appliances</button>
<div class="dropdown-content5">
        <a href="TV.php" class="category-button">Flat Screen Television</a>
        <br>
        <a href="#" class="category-button">Audio Systems</a>
        <br>
        <a href="#" class="category-button">Game Consoles</a>

    </div>
</div>  
<section class="pro-container" style="padding-top: 0;">
        <section id="product1" class="section-p1">
            <section class="pro-container" style="padding-top: 0;">
                <?php
                $show_products = $conn->prepare("SELECT * FROM `z_blender_mixers`");
                $show_products->execute();
                if($show_products->rowCount() > 0){
                    while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){  
                ?>

                <div class="pro" data-name="p-2">
                
                    <a class="pname"href="product_display.php?id=' <?= $fetch_products['id']; ?> '">
                        
                    <img src="../../uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                    <div class="des">
                            <div class="name"><?= $fetch_products['name']; ?>
                    </div>
                    </a>
                    <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                            </div>
                    <div class="price"><span>₱&nbsp;</span><?= $fetch_products['price']; ?><span></span></div>
                    <div class="cart">
                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                        </div>

                    <?php
                        }
                    }else{
                        echo '<p class="empty">No Products Added Yet!</p>';
                    }
                    ?>

                </div>

            </section>
    </section>



  


    <section id="pagination" class="section-p1">
        <a class="active" href="#"><i class="fa fa-long-arrow-alt-up"></i></a>
    </section>


    <footer class="section-p1">
        <div class="col">
            <img src="../img/logs.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address: </strong>Biglang Awa Street Cor 11th Ave Catleya, Caloocan 1400 Metro Manila, Philippines</p>
            <p><strong>Phone: </strong>+632-3106581 / +632-3106855</p>
            <p><strong>Hours: </strong>8:00 AM - 6:00 PM, MON - SAT</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Tract My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store and Google Play</p>
            <div class="row">
                <img src="../img/app.jpg" alt="">
                <img src="../img/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateways</p>
        </div>  
        <div class="copyright">
            <p>© The Ridge Apparatus. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="script.js"></script>
    <script src="../java/script.js"></script>
</body>
</html>

<?php
    }
    else {
        header("Location: ../../login/logindex.php");
        exit();
    }
    ?>