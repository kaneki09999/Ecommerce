<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">


<header class="header">

   <section class="flex">

      <a href="dashboard.php" class="logo">Ridge<span>&nbsp;Apparatus</span></a>
      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <a href="../components/admin_logout.php" onclick="return confirm('Logout from this Website?');" class="delete-btn">Logout</a>
      </div>

   </section>

</header>

 <div class="sidebar">
   <div class="logo">
      <img src="../img/logs.png">
   </div>
   <nav class="navbar">
      <a href="dashboard.php"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a>
      <a href="products.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Products</a>
      <a href="admin_accounts.php"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Admin</a>
      <a href="users_accounts.php"><i class="fa-solid fa-users"></i>&nbsp;&nbsp;Users</a>
      <a href="messages.php"><i class="fa-solid fa-comment"></i>&nbsp;&nbsp;Messages</a>
   
   </nav>
</div>

<script src="https://kit.fontawesome.com/4597c3c494.js" crossorigin="anonymous"></script>


