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
                <li><a href="../about/about.php">About</a></li>
                <li><a href="../contact/contact.php">Contact</a></li>
                <li><a href="../login/logindex.php">Sign In</a></li>
                <a href="#" id="close"><i class="fa fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
            
        </div>
    </section>

    <section id="prodetails" class="section-p1">
        <div class="single-image">
            <img src="../products/vacuum1.jpg" width="100%" id="mainimg" alt="">
            <div class="small-img">
                    <div class="small-img-col">
                        <img src="../products/vacuum1.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="../products/vacuum.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="../products/vacuum1.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="../products/vacuum1.jpg" width="100%" class="small-img" alt="">
                    </div>
            </div>
        </div>

        <div class="single-details">
            <h6>Power Clean</h6>
            <h4 id="title">Turbo Sweep Vacuum</h4>
            <h2>₱4,000.00</h2>

            <input type="number" value="1">
            <button class="normal">Add To Cart</button>
            <h4>Product Details</h4>
            <span>Lightweight and Maneuverable: Customers want vacuums that are easy to move around and handle, especially if they have to clean multiple rooms or levels. Emphasize the weight of the vacuum and the ease of use, especially if it has swivel steering, low profile design, or other features that enhance maneuverability.</span>
        </div>
    </section>
    <hr>
    <section id="product1" class="section-p1">
        <h2>Latest Product</h2>
        <p>Affordable and high-quality appliances for any budget</p>
        <div class="pro-container">
            <div class="pro" onclick="window.location.href='product.php'">
                <img src="../products/vacuum1.jpg" alt="">
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
                <img src="../products/washing machine.jpg" alt="">
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
                <img src="../products/vacuum.jpg" alt="">
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
                <img src="../products/oven.gif" alt="">
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
        </div>

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

    <script>
        var mainimg = document.getElementById("mainimg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[1].onclick = function(){
            mainimg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function(){
            mainimg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function(){
            mainimg.src = smallimg[3].src;
        }
        smallimg[4].onclick = function(){   
            mainimg.src = smallimg[4].src;
        }
    </script>
    <script src="../java/script.js"></script>
</body>
</html>