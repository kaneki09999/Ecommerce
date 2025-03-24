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
                <li id="lg-bag"><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
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
                                <img src="../../img/logout.png" alt="" >
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


<section id="product1" class="section-p1">        

<?php

if (isset($_GET['id'])) {
    $pid = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $show_product = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
    $show_product->bindParam(1, $pid, PDO::PARAM_INT);
    $show_product->execute();

    if ($show_product->rowCount() > 0) {
        $fetch_product = $show_product->fetch(PDO::FETCH_ASSOC);
        $user_id = isset($_SESSION['no']) ? $_SESSION['no'] : null;

        if (isset($_POST['add_to_cart'])) {
            $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
            $quantity = max(1, $quantity);

            $check_cart_query = $conn->prepare("SELECT * FROM `cart` WHERE no = ? AND pid = ?");
            $check_cart_query->bindParam(1, $user_id, PDO::PARAM_INT);
            $check_cart_query->bindParam(2, $pid, PDO::PARAM_INT);
            $check_cart_query->execute();

            if ($check_cart_query->rowCount() > 0) {
                echo '<div id="successModal" class="modal">
                <div class="modal-content">
                  <span class="close" onclick="closeModal()">&times;</span>
                  <h2>Opps!</h2>
                  <p class="success">Product is already in the cart.</p>
                </div>
              </div>';
            }
            
            else {

            $add_to_cart_query = $conn->prepare("INSERT INTO `cart` (no, pid, name, image, price, quantity) VALUES (?, ?, ?, ?, ?, ?)");
            $add_to_cart_query->bindParam(1, $user_id, PDO::PARAM_INT);
            $add_to_cart_query->bindParam(2, $pid, PDO::PARAM_INT);
            $add_to_cart_query->bindParam(3, $fetch_product['name'], PDO::PARAM_STR);
            $add_to_cart_query->bindParam(4, $fetch_product['image'], PDO::PARAM_STR);
            $add_to_cart_query->bindParam(5, $fetch_product['price'], PDO::PARAM_INT);
            $add_to_cart_query->bindParam(6, $quantity, PDO::PARAM_INT);

            if ($add_to_cart_query->execute()) {
                        echo '<div id="successModal" class="modal">
                        <div class="modal-content">
                          <span class="close" onclick="closeModal()">&times;</span>
                          <h2>Success!</h2>
                          <p class="success">Product added to cart successfully!</p>
                        </div>
                      </div>';
            } else {
                echo "Failed to add product to cart.";
            }
        }
    }

?>




<div id="successModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h2>Success!</h2>
    <p>Product added to cart successfully!</p>
  </div>
</div>




<section id="prodetails" class="section-p1">
    <div class="single-pro-image">
        <img src="../../uploaded_img/<?= $fetch_product['image']; ?>" width="100%" alt="">
    </div>
    <div class="single-pro-details">
        <h4><?= $fetch_product['name']; ?></h4>
        <h2>₱<?= number_format($fetch_product['price'], 2); ?></h2>
        <form method="post">
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit" name="add_to_cart" class="bn13">Add To Cart</button>
        </form>

        <h3>Product Details</h3>
        <span><?= $fetch_product['description']; ?></span>
    </div>
</section>

<?php
    } else {
        echo "No product found with the given ID.";
    }

} else {
    echo "Product ID is missing in the URL.";
}
?>







        <br><br><h2>Featured Product</h2><br>
        <section class="pro-container" style="padding-top: 0;">
        <?php
        $limit = 4;
        $show_products = $conn->prepare("SELECT * FROM `products` LIMIT :limit");
        $show_products->bindParam(':limit', $limit, PDO::PARAM_INT);       
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
            <div class="price1"><span>₱&nbsp;</span><?= number_format($fetch_products['price'], 2); ?><span></span></div>
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

<!--PARA SA SUCCESS VIEW-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        function closeModal() {
            document.getElementById('successModal').style.display = 'none';
        }

        <?php if (isset($_POST['add_to_cart'])) { ?>
            document.getElementById('successModal').style.display = 'block';
        <?php } ?>
        
        document.querySelector('.close').addEventListener('click', closeModal);
    });
</script>



    <script>
            let subMenu = document.getElementById("subMenu");
            function toggleMenu(){
                subMenu.classList.toggle("open-menu");
            }
        </script>
        
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