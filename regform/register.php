<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Ridge Apparatus/Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
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

<section id="regis">
    <div class="containers">
        <div class="container">
                <h1 class="title">Register</h1>
                <div class="indicator">
                    <span class="line"><span></span></span>
                    <p class="active">1</p>
                    <p>2</p>
                    <p>3</p>
                </div>

            <form action="../login/logindex.php" method="GET">
                <div class="tab show">
                    <p>Personal Info</p>
                    <div class="form">
                        <input type="text" id="firstname" placeholder="First Name">
                    </div>
                    <div class="form">
                        <input type="text" id="middlename" placeholder="Middle Initial" maxlength="2">
                    </div>
                    <div class="form">
                        <input type="text" id="lastname" placeholder="Last Name">
                    </div>

                    <div class="form">
                        <input type="tel" id="phonenumber" name="phonenumber" maxlength="13" onclick="formatPhoneNumber()" placeholder="Enter phone number" required>                       
                    </div>

                    <div class="form">
                        <select name="format" id="gender">
                            <option selected disabled>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="rthrntsy">Rather not say</option>
                        </select>
                    </div> 

                    <div class="form">
                        <input type="date" id="birthdate" name="birthdate">
                        <div class="error"></div>
                    </div>
                    <div class="form">
                        <input type="text" readonly id="age" onclick="FindAge()" name="age" placeholder="Age">
                        <div class="error"></div>
                    </div> 
                </div>
                    <div class="tab">
                        <p>Address</p>
                        <div class="form">
                            <select id="street" name="street">
                                <option value="" disabled selected>Select Region</option>
                                <option value="NCR">National Capital Region (NCR)</option>
                                <!-- Add more options for regions -->
                            </select>
                        </div>
                        <div class="form">
                            <select id="city" name="city">
                                <option value="" disabled selected>Select City</option>
                                <option value="City of Manila">City of Manila</option>
                                <option value="Quezon City">Quezon City</option>
                                <option value="Caloocan City">Caloocan City</option>
                                <!-- Add more options for cities -->
                            </select>
                        </div>
                        <div class="form">
                            <select id="province" name="province">
                                <option value="" disabled selected>Select Province</option>
                                <option value="Metro Manila">Metro Manila</option>
                                <option value="Cavite">Cavite</option>
                                <option value="Laguna">Laguna</option>
                                <!-- Add more options for provinces -->
                            </select>
                        </div>
                        <div class="form">
                            <select id="barangay" name="barangay">
                                <option value="" disabled selected>Select Barangay</option>
                                <!-- Add options for barangays -->
                                <?php
                                for ($i = 1; $i <= 200; $i++) {
                                    echo '<option value="Barangay ' . $i . '">Barangay ' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="tab">
                        <p>Login Info</p>
                        <div class="form">
                            <input type="text" id="username" placeholder="Username">
                            <span id="username-error" style="color: red; font-size:10px;"></span>
                        </div>
                        <div class="form">
                            <input type="email" id="email" placeholder="Email">
                        </div>
                        <div class="form">
                            <div class="password-wrapper">
                                <input type="password" id="password" placeholder="Password" required>
                                <span class="toggle-password" onclick="togglePasswordVisibility(this)">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form">
                            <div class="password-wrapper">
                                <input type="password" id="conpass" placeholder="Confirm Password" required>
                                <span class="toggle-password" onclick="togglePasswordVisibility(this)">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                            <span id="password-error" style="color: red; font-size:10px;"></span>
                        </div>
                    </div>

                    <div class="btn">
                    <button type="button" class="prev">Previous</button>
                    <button type="button" id="btadd" class="next">Next</button>
                    </div>
                </form>
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

    <script src="js/script.js"></script>


<script>
        var phoneNumberInput = document.getElementById('phonenumber');
        var isUpdating = false;

        phoneNumberInput.addEventListener('input', function(event) {
            if (isUpdating) {
            return;
            }

            isUpdating = true;

            var inputValue = phoneNumberInput.value;
            var numericValue = inputValue.replace(/[^\d+]/g, '');

            // Add the '+' sign and country code if not already included
            if (!numericValue.startsWith('+63')) {
            numericValue = '+63' + numericValue.slice(1);
            }

            // Limit the length to 18 characters (including the '+', country code, and separators)
            if (numericValue.length > 18) {
            numericValue = numericValue.slice(0, 18);
            }

            phoneNumberInput.value = numericValue;
            isUpdating = false;
        });
</script>



<script>
    function togglePasswordVisibility(element) {
        var passwordInput = element.parentNode.querySelector('input[type="password"]');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            element.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } else {
            passwordInput.type = "password";
            element.innerHTML = '<i class="fa fa-eye"></i>';
        }
    }

    var passwordInput = document.getElementById('password');
    var passwordError = document.getElementById('password-error');

    passwordInput.addEventListener('input', function() {
        var password = passwordInput.value;
        var pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if (pattern.test(password)) {
            passwordError.textContent = '';
        } else {
            passwordError.textContent = 'Password must be at least 8 characters long and contain a combination of letters and numbers.';
        }
    });

    var usernameInput = document.getElementById("username");
    var usernameError = document.getElementById("username-error");

    usernameInput.addEventListener("input", function () {
        var username = usernameInput.value;
        if (username.length < 8 || username.length > 12) {
            usernameError.textContent = "Username must be between 8 and 12 characters";
        } else {
            usernameError.textContent = "";
        }
    });
</script>




<script>
    var passwordInput = document.getElementById('password');
    var confirmPasswordInput = document.getElementById('conpass');
    var passwordError = document.getElementById('password-error');

    confirmPasswordInput.addEventListener('input', function() {
        var password = passwordInput.value;
        var confirmPassword = confirmPasswordInput.value;

        if (password !== confirmPassword) {
            passwordError.textContent = "Passwords do not match.";
        } else {
            passwordError.textContent = "";
        }
    });
</script>

</body>
</html>