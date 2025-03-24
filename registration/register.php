<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <script defer src="index.js"></script>
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../js/script1.js"></script>
</head>
<body>

<section id="header">
        <a href="#"><img src="../img/logs.png" class="logo"alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../shop/shop.php">Products</a></li>
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




        <section id="reg">
        <div class="cent">
            <div class="container">
                <form id="form1" action="../login/logindex.php" method="GET">
                            <h1>Personal Info</h1>
                        <div class="input-control">
                            <input id="firstname" name="firstname" type="text" placeholder="Firstname">
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <input id="middlename" name="middlename" type="text"  placeholder="Middlename">
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <input id="lastname" name="lastname" type="text"  placeholder="Lastname">
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <input id="phonenumber" name="phonenumber" type="number"  placeholder="Phone Number" >
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <select name="format" id="gender">
                                <option selected disabled>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="LGBTQ">LGBTQ+</option>
                            </select>
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <input type="date" id="birthdate" name="birthdate">
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <input type="text" readonly id="age" onclick="FindAge()" name="age" placeholder="Age">
                            <div class="error"></div>
                        </div> 
                        <button type="button" id="next1">Next</button>
                </form>

                <form id="form2" action="../login/logindex.php" method="GET">
                            <h1>Address</h1>
                        <div class="input-control">
                            <input id="street" name="street" type="text" placeholder="Street/Bldg.Number/Subdivision">
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <input id="city" name="city" type="text"  placeholder="City">
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <input id="province"name="province" type="text"  placeholder="Province">
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <input id="barangay"name="barangay" type="text"  placeholder="Barangay">
                            <div class="error"></div>
                        </div>
                        <button type="button" id="back1">Back</button>
                        <button type="button" id="next2">Next</button>
                
                </form>


                <form id="form3" action="../login/logindex.php" method="GET">
                    <h1>Registration</h1>
                    <div class="input-control">
                        <input id="username" name="username" type="text" placeholder="Username">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <input id="email" name="email" type="text"  placeholder="Email">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <input id="password"name="password" type="password"  placeholder="Password">
                        <div class="error"></div>
                    </div>
                    <div class="input-control">
                        <input id="password2"name="password2" type="password"  placeholder="Confirm Password">
                        <div class="error"></div>
                    </div>
                    <button type="button" id="back2">Back</button>
                    <button type="submit" id="submit">Submit</button>
                    
                    
                </form>

                <div class="step-row">
                    <div id="progress"></div>
                    <div class="step-col"><small>Step 1</small></div>
                    <div class="step-col"><small>Step 2</small></div>
                    <div class="step-col"><small>Step 3</small></div>
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

    <script src="../java/script.js"></script>
</body>
</html>