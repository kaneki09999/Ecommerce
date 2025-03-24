<?php

include '../components/connect.php';
session_start();

//$admin_id = $_SESSION['admin_id'];

//if(!isset($admin_id)){
  // header('location:admin_login.php');
//};

/*if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'Product Name Already Exists!';
   }else{
      if($image_size > 2000000){
         $message[] = 'Image Size is Too Large';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);

         $insert_product = $conn->prepare("INSERT INTO `products`(name, category, price, image) VALUES(?,?,?,?)");
         $insert_product->execute([$name, $category, $price, $image]);

         $message[] = 'New Product Added!';
      }

   }

}*/
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
                <li><a href="../login/logindex.php">Sign In</a></li>
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

            if($show_product->rowCount() > 0){
                $fetch_product = $show_product->fetch(PDO::FETCH_ASSOC);

        ?>
            <section id="prodetails" class="section-p1">
                <div class="single-pro-image">
                    <img src="../uploaded_img/<?= $fetch_product['image']; ?>" width="100%" alt="">
                </div>
                <div class="single-pro-details">
                    <h4><?= $fetch_product['name']; ?></h4>
                    <h2>₱<?= $fetch_product['price']; ?>.00</h2>
                    <input type="number" value="1">
                    <a href="../login/logindex.php" class="bn13">Add To Cart</a>
                    
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
                
            <img src="../uploaded_img/<?= $fetch_products['image']; ?>" alt="">
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
            <div class="price"><span>₱&nbsp;</span><?= $fetch_products['price']; ?><span></span></div>
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
    
    <script src="../java/script.js"></script>

</body>
</html>