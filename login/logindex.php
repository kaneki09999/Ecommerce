<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Ridge Apparatus/Login</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="style.css">
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
                <li><a href="../shop/shop.php">Products</a></li>
                <li><a href="../about/about.php">About</ax/li>
                <li><a href="../contact/contact.php">Contact</a></li>
                <li><a class="active" href="#">Sign In</a></li>
                <a href="#" id="close"><i class="fa fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
            
        </div>
</section>
<section id="bg">
    <div class="container">
        <form action="login.php" method="post">
            <h2>LOGIN</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Username</label>
            <input type="text" name="username" placeholder="Username"><br>

            <label>Password</label>
            <div class="password-wrapper">
                <input type="password" name="password" id="password" placeholder="Password"><br>
                <span class="toggle-password">
                    <i class="fa-solid fa-eye" id="show-password"></i>
                </span>
            </div>

            <button type="submit">Login</button>

            <ul>
                <li><a href="../regform/register.php">Create Account</a></li>
            </ul>
        </form><br>
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
    <script src="../java/showpass.js"></script>
    <script src="../java/script.js"></script>
    
</body>
</html>