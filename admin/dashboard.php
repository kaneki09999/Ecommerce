<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>


<section class="dashboard">

   <h1 class="heading">Dashboard</h1>
<br><br><br><br><br>
   <div class="box-container">

   <div class="box">
      <h4>Admin Profile</h4>
      <p><?= $fetch_profile['name']; ?></p>
   </div>

   <div class="box">
      <?php
         $select_orders = $conn->prepare("SELECT * FROM `products`");
         $select_orders->execute();
         $numbers_of_orders = $select_orders->rowCount();
      ?>
      <h3><?= $numbers_of_orders; ?></h3>
      <p><i class="fa-sharp fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Total Orders</p>
   </div>

   <div class="box">
      <?php
         $select_products = $conn->prepare("SELECT * FROM `products`");
         $select_products->execute();
         $numbers_of_products = $select_products->rowCount();
      ?>
      <h3><?= $numbers_of_products; ?></h3>
      <p><i class="fa-sharp fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Products Added</p>
   </div>

   <div class="box">
      <?php
         $select_users = $conn->prepare("SELECT * FROM `datas`");
         $select_users->execute();
         $numbers_of_users = $select_users->rowCount();
      ?>
      <h3><?= $numbers_of_users; ?></h3>
      <p><i class="fa-solid fa-users"></i>&nbsp;&nbsp;Users Accounts</p>

   </div>

   <div class="box">
      <?php
         $select_admins = $conn->prepare("SELECT * FROM `admin`");
         $select_admins->execute();
         $numbers_of_admins = $select_admins->rowCount();
      ?>
      <h3><?= $numbers_of_admins; ?></h3>
      <p><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Admins</p>
   </div>

   <div class="box">
      <?php
         $select_messages = $conn->prepare("SELECT * FROM `messages`");
         $select_messages->execute();
         $numbers_of_messages = $select_messages->rowCount();
      ?>
      <h3><?= $numbers_of_messages; ?></h3>
      <p><i class="fa-solid fa-comment"></i>&nbsp;&nbsp;New Messages</p>
   </div>

   </div>

</section>



<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>