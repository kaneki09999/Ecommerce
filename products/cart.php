<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Ridge Apparatus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<section class="header">
        <nav>
        <a href="index.php"><img src="../img/logo5.png"></a>
            <div class="nav-links" id="navlinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
					<li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Products</a></li>   
					<li><a href="login/logindex.php">Sign In</a></li>
					<li><a href="regform/registration.php">Register</a></li>
                    
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
</section>


<div class="footer">
        <div class="container">
            <div class="smallcont">
                <div class="foot1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and IOS Mobile Phone</p>
                    <div class="applogo">
                        <img src="../img/play-store.png">
                        <img src="../img/app-store.png">
                    </div>
                </div>
                <div class="foot2">
                    <img src="../img/logo5.png">
                    <p>Our purpose is to make our lives easier and more convenient by providing a way to automate and simplify everyday tasks. Appliances are designed to perform specific functions such as cooking, cleaning, refrigeration, and heating, among others.</p>
                </div>
                <div class="foot3">
                    <h3>Contuct Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>   
                        <li>Youtube</li>
                    </ul>
                </div>
                <div class="foot3">
                    <h3>Browse</h3>
                    <ul>
                        <li>Privacy Policy</li>
                        <li>Copyright Policy</li>
                        <li>Terms of Service</li>   
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyrights">© The Ridge Apparatus. All Rights Reserved. </p>
        </div>
    </div>
    <!--FOR MERNU-->
    <script>
        var navlinks = document.getElementById("navlinks");
        
        function showMenu(){
            navlinks.style.right = "0";
        }
        function hideMenu(){
            navlinks.style.right = "-300px";
        }

    </script>
</body>
</html>