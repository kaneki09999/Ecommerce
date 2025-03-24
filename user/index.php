<?php
session_start();

if (isset($_SESSION['no']) && isset($_SESSION['username'])) {

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
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    
    <section id="header">
        <a href="#"><img src="img/logs.png" class="logo"alt=""></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="shop/shop.php">Products</a></li>
                <li><a href="about/about.php">About</a></li>
                <li><a href="contact/contact.php">Contact</a></li>
                <li id="lg-bag"><a href="shop/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        <?php
                        if (isset($_SESSION['no'])) {
                            $user_id = $_SESSION['no'];
                            $cart_count_query = $conn->prepare("SELECT COUNT(*) as count FROM `cart` WHERE no = :no");
                            $cart_count_query->bindParam(':no', $user_id, PDO::PARAM_INT);
                            $cart_count_query->execute();
                            $cart_count = $cart_count_query->fetch(PDO::FETCH_ASSOC)['count'];
                            
                            if ($cart_count > 0) {
                                echo "<span class='cart-count'>($cart_count)</span>";
                            }
                        }
                    ?>  
                </a></li>                    
                <li><a onclick="toggleMenu()"> <?php echo $_SESSION['firstname']; ?>&nbsp<i class="fa fa-user"></i></a></li> 
                <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="../img/profile.png" alt="">
                                <h3>View Profile</h3>
                            </div>
                            <hr>
                            <a href="../index.php" class="sub-link">
                                <img src="../img/logout.png" alt="">
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

                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="../img/profile.png" alt="">
                                <h3>View Profile</h3>
                            </div>
                            <hr>
                            <a href="../index.php" class="sub-link">
                                <img src="../img/logout.png" alt="">
                                <p>Logout</p>
                                <span>></span>
                            </a>

                        </div>
                    </div>

    <section id="hero">
        <h4>Welcome to</h4>
        <div class="contain">
            <span class="text2">T</span>
            <span class="text2">H</span>
            <span class="text2">E</span>&nbsp&nbsp&nbsp&nbsp
            <span class="text2">R</span>
            <span class="text2">I</span>
            <span class="text2">D</span>
            <span class="text2">G</span>
            <span class="text2">E</span>&nbsp&nbsp&nbsp&nbsp
            <span class="text2">A</span>
            <span class="text2">P</span>
            <span class="text2">P</span>
            <span class="text2">A</span>
            <span class="text2">R</span>
            <span class="text2">A</span>
            <span class="text2">T</span>
            <span class="text2">U</span>
            <span class="text2">S</span>
        </div>
        <h2>Super value deals</h2>
        <p>Save more with coupons & up to 70% off! </p>
        <button onclick="window.location.href='shop/shop.php'">Shop Now  &#8594;</button>
    </section>
    
    <section id="product1" class="section-p1">
        <h2>Featured Product</h2>
        <p>Smart and connected appliances for a modern lifestyle</p>
        <div class="pro-container">
            <div class="pro" data-name="p-2">
                <img src="products/vacuum1.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Vacuum</h5>
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
                <img src="products/washing machine.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Washing Machine</h5>
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
                <img src="products/vacuum.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Vacuum</h5>
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
            <div class="pro" data-name="p-4">
                <img src="products/oven.gif" alt="">
                <div class="des">
                    <span>Kyowa</span>
                    <h5>Electric Oven</h5>
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
            <div class="pro">
                <img src="products/vacuum.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Vacuum</h5>
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
            <div class="pro">
                <img src="products/vacuum1.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Vacuum</h5>
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
            <div class="pro">
                <img src="products/oven.gif" alt="">
                <div class="des">
                    <span>Kyowa</span>
                    <h5>Electric Oven</h5>
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
            <div class="pro">
                <img src="products/washing machine.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Washing Machine</h5>
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

    <section id="banner" class="section-m1">
        <h4>Discover the Best Appliances for Your Home</h4>
        <h2>Elevate Your Daily Life with <span>Top-Quality</span> Appliances</h2>
        <button class="normal">Shop Now </button>
    </section>

    <section id="product1" class="section-p1">
        <h2>Latest Product</h2>
        <p>Affordable and high-quality appliances for any budget</p>
        <div class="pro-container">
            <div class="pro" onclick="window.location.href='php/product.php'">
                <img src="products/vacuum1.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Vacuum</h5>
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
            <div class="pro">
                <img src="products/washing machine.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Washing Machine</h5>
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
            <div class="pro">
                <img src="products/vacuum.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Vacuum</h5>
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
            <div class="pro">
                <img src="products/oven.gif" alt="">
                <div class="des">
                    <span>Kyowa</span>
                    <h5>Electric Oven</h5>
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
            <div class="pro">
                <img src="products/vacuum.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Vacuum</h5>
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
            <div class="pro">
                <img src="products/vacuum1.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Vacuum</h5>
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
            <div class="pro">
                <img src="products/oven.gif" alt="">
                <div class="des">
                    <span>Kyowa</span>
                    <h5>Electric Oven</h5>
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
            <div class="pro">
                <img src="products/washing machine.jpg" alt="">
                <div class="des">
                    <span>Panasonic</span>
                    <h5>Washing Machine</h5>
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

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>Upgrade Your Kitchen</h4>
            <h2>Quality and Convenience</h2>
            <span>Elevate your cooking game with our top-quality appliances.</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>Simplify Your Life with Our Appliances</h4>
            <h2>High-Quality and Affordable Appliances</h2>
            <span>Make your daily routine easier with our selection of high-quality appliances.</span>
            <button class="white">Learn More</button>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>Huge Appliance Sale</h2>
            <h3>Save Big on Top Brands</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>Appliance Blowout Sale</h2>
            <h3>Save Up to 50%</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>Spring Appliance Sale</h2>
            <h3>Freshen Up Your Home</h3>
        </div>
    </section>

    <div class="product-review">

<div class="preview" data-target="p-1">
    <i class="fa fa-times"></i>
    <img src="products/washing machine.jpg" alt="">
    <h3>Washing Machine</h3>
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
    <img src="products/vacuum1.jpg" alt="">
    <h3>Vacuum</h3>
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
    <img src="products/vacuum.jpg" alt="">
    <h3>Vacuum</h3>
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
    <img src="products/oven.gif" alt="">
    <h3>Electric Oven</h3>
    <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <span>( 520 )</span>
    </div>
    <p>Highlight the variety of cooking functions the electric oven offers, such as bake, broil, roast, convection cooking, and more. <br> Emphasize the versatility and flexibility it provides for different recipes and cooking styles.</p>
    <div class="price">₱4,000.00</div>
    <div class="buttons">
        <a href="#" class="buy">Buy now</a>
        <a href="#" class="cart">Add to cart</a>
    </div>
</div>

</div>

    <footer class="section-p1">
        <div class="col">
            <img src="img/logs.png" alt="">
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
                <img src="img/app.jpg" alt="">
                <img src="img/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateways</p>
        </div>  
        <div class="copyright">
            <p>© The Ridge Apparatus. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="java/script.js"></script>
    <script>
        let subMenu = document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>

<?php
    }
    else {
        header("Location: ../../login/logindex.php");
        exit();
    }
    ?>