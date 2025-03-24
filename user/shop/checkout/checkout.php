<?php
session_start();


if (isset($_SESSION['no']) && isset($_SESSION['username'])) {
     include '../../components/connect.php';
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Ridge Apparatus</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    
</head>
<body onload="generateOrderID();">
    
    <section id="header">
        <a href="#"><img src="../../img/logs.png" class="logo"alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="../../index.php">Home</a></li>
                <li><a href="../../shop/shop.php">Products</a></li>
                <li><a href="../../about/about.php">About</ax/li>
                <li><a href="../../contact/contact.php">Contact</a></li>
                <li id="lg-bag"><a href="../cart.php" class="active"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
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
                                <img src="../../../img/profile.png" alt="">
                                <h3>View Profile</h3>
                            </div>
                            <hr>
                            <a href="../../../index.php" class="sub-link">
                                <img src="../../../img/logout.png" alt="">
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
        <h2>Checkout</h2>
        <p></p>
    </section>

    <?php
if (isset($_POST['order'])) {
    // Get values from the form
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['address'];
    $street = $_POST['street'];
    $order_id = uniqid(); // Generate a unique order ID
    $order_date_time = date('Y-m-d H:i:s'); // Get current date and time

    $product_id = isset($_POST['pid']) ? $_POST['pid'] : null;
    $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : null;
    $product_quantity = isset($_POST['product_quantity']) ? $_POST['product_quantity'] : null;
    $product_price = isset($fetch_products['price']) ? $fetch_products['price'] : 0; // Assuming a default value of 0 if not set
    $product_total = isset($product_quantity, $product_price) ? $product_quantity * $product_price : 0; // Assuming a default value of 0 if not set

// ...
    // Save order details in the database
    $order_query = $conn->prepare("INSERT INTO orders 
        (no, name, number, email, method, address, street, order_id, pid, product_name, product_quantity, product_price, product_total, order_date_time)
        VALUES (:no, :name, :number, :email, :method, :address, :street, :order_id, :pid, :product_name, :product_quantity, :product_price, :product_total, :order_date_time)");

    $order_query->bindParam(':no', $user_id, PDO::PARAM_INT);
    $order_query->bindParam(':name', $name, PDO::PARAM_STR);
    $order_query->bindParam(':number', $number, PDO::PARAM_STR);
    $order_query->bindParam(':email', $email, PDO::PARAM_STR);
    $order_query->bindParam(':method', $method, PDO::PARAM_STR);
    $order_query->bindParam(':address', $flat, PDO::PARAM_STR);
    $order_query->bindParam(':street', $street, PDO::PARAM_STR);
    $order_query->bindParam(':order_id', $order_id, PDO::PARAM_STR);
    $order_query->bindParam(':pid', $product_id, PDO::PARAM_INT);
    $order_query->bindParam(':product_name', $product_name, PDO::PARAM_STR);
    $order_query->bindParam(':product_quantity', $product_quantity, PDO::PARAM_INT);
    $order_query->bindParam(':product_price', $product_price, PDO::PARAM_STR);
    $order_query->bindParam(':product_total', $product_total, PDO::PARAM_STR);
    $order_query->bindParam(':order_date_time', $order_date_time, PDO::PARAM_STR);

    if ($order_query->execute()) {
   
        $clear_cart_query = $conn->prepare("DELETE FROM cart WHERE pid = :product_id AND no = :user_id");
        $clear_cart_query->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $clear_cart_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $clear_cart_query->execute();


        header("Location: ../cart.php?success=1");
        exit();
    } else {
        // Error handling
        echo "Failed to place the order.";
    }
}
?>




    
<section id="product1" class="section-p1">
    <section class="pro-container" style="padding-top: 0;">
        asdasdsadsadsdds
            <?php
            if (isset($_GET['pid']) && isset($_SESSION['no'])) {
                $product_id = $_GET['pid'];
                $user_id = $_SESSION['no'];
                $total_price = 0;
                $product_totals = [];

                //user information
                $user_query = $conn->prepare("SELECT * FROM `datas` WHERE no = :no");
                $user_query->bindParam(':no', $user_id, PDO::PARAM_INT);
                $user_query->execute();


                //cart items
                $show_products = $conn->prepare("SELECT * FROM `cart` WHERE pid = :pid AND no = :no");
                $show_products->bindParam(':pid', $product_id, PDO::PARAM_INT);
                $show_products->bindParam(':no', $user_id, PDO::PARAM_INT);
                $show_products->execute();

                if ($show_products->rowCount() > 0) {
                    while ($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)) {
                        $product_quantity = $fetch_products['quantity'];
                        $product_price = $fetch_products['price'];
                        $product_name = $fetch_products['name'];
                        $product_image = $fetch_products['image']; 

                        $product_total = $product_quantity * $product_price;
                        $product_totals[] = $product_total;  
                        $total_price += $product_total;
                        ?>

                <div class="titleorder">
                        <div id="head">
                            <h4>YOUR ORDER</h4>
                        </div>
                    <div class="move">
                        <div class="pro" data-name="p-2">
                            <a class="pname" style="text-align: center;">
                            <img src="../../../uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                                <p id="prodname"><?= $product_name; ?></p>
                                <p>Quantity: <?= $product_quantity; ?></p>
                                <p>Price: <span id="price">₱</span><?= number_format($product_price, 2); ?></p>
                                <p>Total: <span id="price">₱</span><?= number_format($product_total, 2); ?></p>
                            </a>
                        </div> 
                    </div>
                </div>
                        <?php
                    }
                } else {
                    echo "No products in the cart.";
                }
                            
                        if ($user_query->rowCount() > 0) {
                            while ($user_info = $user_query->fetch(PDO::FETCH_ASSOC)) {
                                $user_firstname = $user_info['firstname']; 
                                $user_lastname =$user_info['lastname']; 
                                $user_number = $user_info['phonenumber']; 
                                $user_email = $user_info['email']; 
                                $user_region = $user_info['street']; 
                                $user_city = $user_info['city']; 
                                $user_province = $user_info['province']; 
                                $user_barangay = $user_info['barangay']; 
                        ?>
                         <form action="" method="POST">
                                <div class="flex">
                                    <div class="userinfo">
                                        <div id="head1">
                                            <h4>Place Your Orders</h4>
                                        </div>
                                
                                    <div class="inputBox">
                                        <input type="text" name="name" placeholder="<?= $user_firstname; ?> <?= $user_lastname; ?>" class="box" maxlength="20" required readonly> 
                                    </div>
                                    <div class="inputBox">
                                        <input type="number" name="number" placeholder="<?= $user_number; ?>" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required readonly>
                                    </div>
                                    <div class="inputBox">
                                        <input type="email" name="email" placeholder="<?= $user_email; ?>" class="box" maxlength="50" required readonly>
                                    </div>
                                    <div class="inputBox">
                                        <select name="method" class="box" required>
                                        <option value="cash on delivery">CASH ON DELIVERY</option>
                                        <option value="credit card">CREDIT CARD</option>
                                        <option value="paytm">PAYTM</option>
                                        <option value="paypal">PAYPAL</option>
                                        </select>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="address" placeholder="<Input your Address>" class="box" maxlength="50" required >
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="street" placeholder="<?= $user_region; ?>, <?= $user_city; ?>, <?= $user_province; ?>, <?= $user_barangay; ?>" class="box" maxlength="50" required readonly>
                                    </div>

                                    <div class="inputBox">
                                        <input type="hidden" name="order_id" id="order_id" placeholder="Order ID" class="box" readonly>
                                    </div>

                                </div>
                                                            <!-- Add hidden fields for order details -->
                                <input type="hidden" name="order_id" value="<?= $order_id; ?>">
                                <input type="hidden" name="pid" value="<?= $product_id; ?>">
                                <input type="hidden" name="product_name" value="<?= $product_name; ?>">
                                <input type="hidden" name="product_quantity" value="<?= $product_quantity; ?>">
                                <input type="hidden" name="product_price" value="<?= $product_price; ?>">
                                <input type="hidden" name="product_total" value="<?= $product_total; ?>">

                                <!-- Your existing submit button -->
                                <input type="submit" name="order" class="btn1  <?= ($grand_total > 1) ? '' : 'disabled'; ?>"  onclick="alert('Please add items to the cart before proceeding.');return true; value="place order">
                            </form>
                               


                        
                        <?php
                            }
                           } else {
                               echo "No products in the cart.";
                            }
                                       
                        ?>
                    

                    <?php
            } else {
                echo "Product ID not specified or user not logged in.";
            }
            ?>
        
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
                <img src="../../img/app.jpg" alt="">
                <img src="../../img/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateways</p>
        </div>  
        <div class="copyright">
            <p>© The Ridge Apparatus. All Rights Reserved.</p>
        </div>
</footer>




<script>
    function generateOrderID() {
        // Generate a random number and letters
        const randomPart = Math.floor(Math.random() * 1000000).toString().padStart(6, '0');
        const lettersPart = generateRandomLetters(3); // Adjust the number of letters as needed

        // Combine the random number and letters to create the order ID
        const orderID = `${randomPart}-${lettersPart}`;

        // Set the generated order ID to the input field
        document.getElementById('order_id').value = orderID;
    }

    function generateRandomLetters(length) {
        const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        let result = '';
        for (let i = 0; i < length; i++) {
            result += letters.charAt(Math.floor(Math.random() * letters.length));
        }
        return result;
    }
</script>








<script>
    function closeMessage() {
        document.querySelector('.update-message').style.display = 'none';
    }
</script>
    
    <script src="../../java/script.js"></script>
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
        header("Location: ../../../login/logindex.php");
        exit();
    }
    ?>