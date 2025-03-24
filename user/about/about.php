<?php
session_start();

if (isset($_SESSION['no']) && isset($_SESSION['username'])) {
	include '../components/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
 	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  	<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                <li><a class="active" href="#">About</ax/li>
                <li><a href="../contact/contact.php">Contact</a></li>
				<li id="lg-bag"><a href="../shop/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>

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

	<div class="background">
		<div class="center">
			<br>
			<h1>Our Team</h1>
		</div>

		<div class="team-content">
			<div class="box">
				<img src="img/bernal.png">
				<h3>Christian Dave Bernal</h3>
				<h5>Developer</h5>
				<div class="icons">
					<a href="#"><i class="ri-twitter-fill"></i></a>
					<a href="https://www.facebook.com/christiandave.bernal" target="_blank"><i class="ri-facebook-box-fill"></i></a>
					<a href="#"><i class="ri-instagram-fill"></i></a>
				</div>
			</div>

			<div class="box">
				<img src="img/rj.jpg">
				<h3>Ricky James Molina</h3>
				<h5>Developer</h5>
				<div class="icons">
					<a href="#"><i class="ri-twitter-fill"></i></a>
					<a href="https://www.facebook.com/RickyJames40" target="_blank"><i class="ri-facebook-box-fill"></i></a>
					<a href="#"><i class="ri-instagram-fill"></i></a>
				</div>
			</div>

			<div class="box">
				<img src="img/menato.jpg">
				<h3>Ajhay Arendayen</h3>
				<h5>Developer</h5>
				<div class="icons">
					<a href="#"><i class="ri-twitter-fill"></i></a>
					<a href="https://www.facebook.com/ajhay.arendayen" target="_blank"><i class="ri-facebook-box-fill"></i></a>
					<a href="#"><i class="ri-instagram-fill"></i></a>
				</div>
			</div>

			<div class="box">
				<img src="img/desiree.jpg">
				<h3>Desiree Galanaga</h3>
				<h5>Developer</h5>
				<div class="icons">
					<a href="#"><i class="ri-twitter-fill"></i></a>
					<a href="https://www.facebook.com/desireegalanaga" target="_blank"><i class="ri-facebook-box-fill"></i></a>
					<a href="#"><i class="ri-instagram-fill"></i></a>
				</div>
			</div>

			
			<div class="box">
				<img src="img/kelly.jpg">
				<h3>Kelly Ann Alinsub</h3>
				<h5>Developer</h5>
				<div class="icons">
					<a href="#"><i class="ri-twitter-fill"></i></a>
					<a href="https://www.facebook.com/kellyann.tiaalinsubii" target="_blank"><i class="ri-facebook-box-fill"></i></a>
					<a href="#"><i class="ri-instagram-fill"></i></a>
				</div>
			</div>

		</div>


		<br><br><br><br><br>

		<div class="container1">
				<h1>HISTORY</h1>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Ridge apparatus is a Philippine Home appliances company founded by Ajhay Arendayen.
			The company was established in 2020 during the pandemic, the company began selling home 
			appliances online to stay up with the new style of marketing things and fortunately it was successful.
			<br><Br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It has gained experience developing household equipment that will improve life at home 
			throughout the years. With a dedication to excellence, it works to continuously enhance 
			its offerings in order to offer creative solutions for meeting the various needs of each
			individual consumer.</p>
			<br>
			
	</div>

	<br><br>

	<div class="container1">
		<h1>VISION</h1>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To be the leading producer of home appliances in the Philippines, providing a distinctive 
		customer shopping experience, a wide selection of international brands, and trustworthy 
		value-adding services that are offered in both online and physical stores.</p>
	</div>

	<br><br>

	<div class="container1">
		<h1>MISSION</h1>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Being a reputable manufacturer of well-known international appliance brands, it is our mission to 
			guarantee the high quality and current status of the product selection in our stores.With accessible
			payment options available to our consumers, we guarantee that our product line will satisfy the growing
			desire to update and simplify daily life even in the absence of ready cash or credit cards.</p>

</div>
	
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
            <a href="#">Track My Order</a>
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
        header("Location: ../index.php");
        exit();
    }
    ?>