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
                <li><a href="../shop/shop.php">Products</a></li>
                <li><a href="../about/about.php">About</ax/li>
                <li><a href="../contact/contact.php">Contact</a></li>
                <li id="lg-bag"><a class="active"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
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
    

    <section id="page-header">
        <h2>SHOPPING CART</h2>
        <p></p>
    </section>
    <div class="button-container">
            <a class="custom-button1">Shopping Cart</a>
             <a href="checkout/checkout.php" class="custom-button2">Order</a>
             <a href="#" class="custom-button3">Completed</a>
    </div>                  

    <?php 
    if (isset($_SESSION['update_message'])) {
        echo '<div class="update-message">';
        echo $_SESSION['update_message'];
        echo '<span class="close-button" onclick="closeMessage()">X</span>';
        echo '</div>';
        unset($_SESSION['update_message']);
    }
    ?>



<section id="product1" class="section-p1">
    <section id="product1" class="section-p1">
        <section class="pro-container" style="padding-top: 0;">
        
            <?php
            $user_id = $_SESSION['no'];
            $total_price = 0;            
            $show_products = $conn->prepare("SELECT * FROM `cart` WHERE no = :no");
            $show_products->bindParam(':no', $user_id, PDO::PARAM_INT);
            $show_products->execute();

            if($show_products->rowCount() > 0){
                while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){  
                    $user_id = $fetch_products['no'];
                    $product_quantity = $fetch_products['quantity'];
                    $product_price = $fetch_products['price'];

                    $product_total = $product_quantity * $product_price;
                    $total_price += $product_total;
            
            ?>

            <div class="pro" data-name="p-2">
            
                <a class="pname">
                    <img src="../../uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                    <div class="des1">
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
                <div class="product-details">
                        <div class="price"><span>₱</span><?= number_format($fetch_products['price'], 2); ?></div>                      
                        <form method="post" action="update_quantity.php">
                            <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $product_quantity; ?>">
                            <input type="hidden" name="product_id" value="<?= $fetch_products['pid']; ?>">
                            <button type="submit" class="fas fa-edit" name="update_qty"></button>
                        </form>
                    </div>
                </div>

                    <div class="quanti">
                        <div class="total-price">Total Price:<span> ₱</span><?= number_format($product_total, 2); ?></div>
                        <form action="delete_from_cart.php" method="post">
                            <input type="hidden" name="pid" value="<?= $fetch_products['pid']; ?>">
                            <button type="submit" class="delete-btn" name="delete_item" onclick="return confirm('delete this from cart?');">Delete Item</button>
                        </form>
                        <a href="checkout/checkout.php?pid=<?= $fetch_products['pid']; ?>" class="btn">Proceed to Checkout</a>


                    </div>
                
            </div>

             
                <?php
                    }
                }else{
                    echo '<p class="empty">Your Cart Is Empty!</p>';
                }
                ?>


        </section>
    </section>
</section>       
    <?php
$cartItemCount = $show_products->rowCount();
?>

<section class="pro-container" style="padding-top: 0;">
    <section id="product1" class="section-p1">            
        <div class="cart-total">
            <p class="total">Total Price for All Products: <span>₱</span><?= number_format($total_price, 2); ?></p>
            <a href="shop.php" class="option-btn">Continue Shopping</a>
            <form action="delete_all_from_cart.php" method="post">
                <button type="submit" class="delete-all-btn" name="delete_all_items" <?= $cartItemCount > 0 ? '' : 'disabled'; ?> onclick="return confirm('Delete all items from the cart?');">Delete All Items</button>
            </form>
            <?php if ($cartItemCount > 0): ?>
                <a href="checkout.php" class="btn">Proceed to Checkout</a>
            <?php else: ?>
                <a href="#" class="btn" onclick="alert('Please add items to the cart before proceeding.'); return false;" disabled>Proceed to Checkout</a>
            <?php endif; ?>
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

<script>
    // Check for the success parameter in the URL
    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get('success');

    // Display an alert if success is present in the URL
    if (successParam === '1') {
        alert("Order placed successfully!");
    }
</script>


<script>
    function closeMessage() {
        document.querySelector('.update-message').style.display = 'none';
    }
</script>
    
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
        header("Location: ../../login/logindex.php");
        exit();
    }
    ?>