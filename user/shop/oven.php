<?php
session_start();

if (isset($_SESSION['no']) && isset($_SESSION['username'])) {

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
                <li id="lg-bag"><a href="../shop/shop.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                <li><a href="#" onclick="toggleMenu()"> <?php echo $_SESSION['firstname']; ?>&nbsp<i class="fa fa-user"></i></a></li>
                <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="../../img/profile.png" alt="">
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
        <h2>Electric Oven</h2>
        <p>Precise Temperature Control</p>
    </section>
    
    <section id="product1" class="section-p1">
    <div id="categories">
             <a href="shop.php" class="category-button">All</a>
            <a href="washing.php" class="category-button">Washing Machine</a>
            <a href="#" class="category-button">Vacuum</a>
            <a href="#" class="category-button active">Oven</a>
        </div>
        <div class="pro-container">
        <div class="pro" data-name="p-2">
                <img src="../products/oven1.jpg" alt="">
                <div class="des">
                    <span>3D</span>
                    <h5>3D EO-16C Electric Oven</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₱4,000.00</h4>
                </div>
                <div class="cart">
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>

            <div class="pro" data-name="p-1">
                <img src="../products/oven2.jpg" alt="">
                <div class="des">
                    <span>Hanabishi</span>
                    <h5>HE0-68R Electric Oven</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₱4,000.00</h4>
                </div>
                <div class="cart">
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="pro" data-name="p-3">
                <img src="../products/oven3.jpg" alt="">
                <div class="des">
                    <span>Hanabishi</span>
                    <h5>HE090RSS Electric Oven</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₱4,000.00</h4>
                </div>
                <div class="cart">
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="pro"  data-name="p-4">
                <img src="../products/oven4.jpg" alt="">
                <div class="des">
                    <span>Kyowa</span>
                    <h5>Kyowa KW 335 Electric Oven</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₱4,000.00</h4>
                </div>
                <div class="cart">
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="pro" data-name="p-5">
                <img src="../products/oven5.jpg" alt="">
                <div class="des">
                    <span>3D</span>
                    <h5>3D EO-28RC 28 Liters Electric Oven</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₱4,000.00</h4>
                </div>
                <div class="cart">
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>


           
        </div>

    </section>

    <div class="product-review">

        <div class="preview" data-target="p-1">
            <i class="fa fa-times"></i>
            <img src="../products/oven1.jpg" alt="">
            <h3>3D EO-16C Electric Oven</h3>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span>( 520 )</span>
            </div>
            <p>Lightweight and Maneuverable: Customers want vacuums that are easy to move around and handle, <br> especially if they have to clean multiple rooms or levels.</p>
            <div class="price">₱4,000.00</div>
            <div class="buttons">
                <a href="#" class="buy">Buy now</a>
                <a href="#" class="cart">Add to cart</a>
            </div>
        </div>

        <div class="preview" data-target="p-2">
            <i class="fa fa-times"></i>
            <img src="../products/oven2.jpg" alt="">
            <h3>HE0-68R Electric Oven</h3>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span>( 520 )</span>
            </div>
            <p>Lightweight and Maneuverable: Customers want vacuums that are easy to move around and handle, <br> especially if they have to clean multiple rooms or levels.</p>
            <div class="price">₱4,000.00</div>
            <div class="buttons">
                <a href="#" class="buy">Buy now</a>
                <a href="#" class="cart">Add to cart</a>
            </div>
        </div>

        <div class="preview" data-target="p-3">
            <i class="fa fa-times"></i>
            <img src="../products/oven3.jpg" alt="">
            <h3>HE090RSS Electric Oven</h3>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span>( 520 )</span>
            </div>
            <p>Lightweight and Maneuverable: Customers want vacuums that are easy to move around and handle, <br> especially if they have to clean multiple rooms or levels.</p>
            <div class="price">₱4,000.00</div>
            <div class="buttons">
                <a href="#" class="buy">Buy now</a>
                <a href="#" class="cart">Add to cart</a>
            </div>
        </div>
        
        <div class="preview" data-target="p-4">
            <i class="fa fa-times"></i>
            <img src="../products/oven4.jpg" alt="">
            <h3>Kyowa KW 335 Electric Oven</h3>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span>( 520 )</span>
            </div>
            <p>Lightweight and Maneuverable: Customers want vacuums that are easy to move around and handle, <br> especially if they have to clean multiple rooms or levels.</p>
            <div class="price">₱4,000.00</div>
            <div class="buttons">
                <a href="#" class="buy">Buy now</a>
                <a href="#" class="cart">Add to cart</a>
            </div>
        </div>

        <div class="preview" data-target="p-5">
            <i class="fa fa-times"></i>
            <img src="../products/oven5.jpg" alt="">
            <h3>3D EO-28RC 28 Liters Electric Ovens</h3>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span>( 520 )</span>
            </div>
            <p>Lightweight and Maneuverable: Customers want vacuums that are easy to move around and handle, <br> especially if they have to clean multiple rooms or levels.</p>
            <div class="price">₱4,000.00</div>
            <div class="buttons">
                <a href="#" class="buy">Buy now</a>
                <a href="#" class="cart">Add to cart</a>
            </div>
        </div>

    </div>


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
        header("Location: ../index.php");
        exit();
    }
    ?>