<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};





if (isset($_POST['add_product'])) {

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);

    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);

    $category = $_POST['category'];
    $category = filter_var($category, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../uploaded_img/' . $image;

    $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
    $select_products->execute([$name]);

    if ($select_products->rowCount() > 0) {
        $message[] = 'Product Name Already Exists!';
    } else {
        if ($image_size > 2000000) {
            $message[] = 'Image Size is Too Large';
        } else {
            move_uploaded_file($image_tmp_name, $image_folder);   


       
        // Determine the table based on the selected category
        $table = '';
        switch ($category) {
            // For Cleaning Appliances
           case 'Cleaning Appliances':
                $table = 'z_vacuum';
             break;
                $table = 'z_dishsterilizer';
            break;
                $table = 'z_insectsterilizer';
                break; 
               

            // For Kitchen Appliances
            case 'Kitchen Appliances':
                $table = 'z_refrigerator';
                break;
                $table = 'z_coffeemaker';
                break;
                $table = 'z_airfryer_ovens';
                break;
                $table = 'z_blender_mixers';
                break;

            // For Laundry Appliances   
            case 'Laundry Appliances':
                $table = 'z_washingmachine';
                break;
                $table = 'z_dryer';
                break;
                $table = 'z_irons';
                break;

            // For Climate Control Appliances
            case 'Climate Control Appliances':
                $table = 'z_airconditioners';
                break;
                $table = 'z_heater';
                break;
                $table = 'z_fans';
                break;

            // For Multimedia Appliances
            case 'Multimedia Appliances':
                $table = 'z_television';
                break;
                $table = 'z_audiosystem';
                break;
                $table = 'z_gameconsole';
                break;
       

        default:
         // Default to 'products' table
                 $table = 'products';
                 break;
 }


        // Insert the product into the determined table
        $insert_product = $conn->prepare("INSERT INTO `$table` (name, description, category, price, image) VALUES(?,?,?,?,?)");
        $insert_product->execute([$name, $description, $category, $price, $image]);

        $insert_product = $conn->prepare("INSERT INTO `products` (name, description, category, price, image) VALUES(?,?,?,?,?)");
        $insert_product->execute([$name, $description, $category, $price, $image]);

        $message[] = 'New Product Added!';
            }
        } 
        
        
}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/'.$fetch_delete_image['image']);
   $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   header('location:products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>

<?php include '../components/admin_header.php' ?>

<section class="add-products">

   <form action="" method="POST" enctype="multipart/form-data" id="productForm">
      <h3>Add Product</h3>
    
      <input type="text" required placeholder="Enter Product Name" name="name" maxlength="100" class="box">
      <input type="text" required placeholder="Enter Product Description" name="description" maxlength="2000" class="box">
      <input type="number" min="0" max="9999999" required placeholder="Enter Product Price" name="price" onkeypress="if(this.value.length == 10) return false;" class="box">
     
      <select name="category" class="box" require id="categorySelect">
         <option value="" disabled selected>Select Category</option>
         <option value="Cleaning Appliances">Cleaning Appliances</option>
         <option value="Kitchen Appliances">Kitchen Appliances</option>
         <option value="Laundry Appliances">Laundry Appliances</option>
         <option value="Climate Control Appliances">Climate Control Appliances</option>
         <option value="Multimedia Appliances">Multimedia Appliances</option>
      </select>


       <!-- Another dropdown textbox for additional options -->
    <select name="additionalOption" class="box" id="additionalOptionSelect">
        <option value="" disabled selected>Select Additional Option</option>
        <!-- Options will be dynamically added here based on the selected category -->
    </select>

      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
      <input type="submit" value="add product" name="add_product" class="btn1">
   </form>

</section>


<section class="show-products" style="padding-top: 0;">

   <div class="box-container">

   <?php
      $show_products = $conn->prepare("SELECT * FROM `products`");
      $show_products->execute();
      if($show_products->rowCount() > 0){
         while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){  
            
   ?>
   <div class="box">
      <img src="../uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="flex">
         <div class="price"><span>₱&nbsp;</span><?= $fetch_products['price']; ?><span></span></div>
        
      </div>
      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="flex-btn">
         <a href="update_product.php?update=<?= $fetch_products['id']; ?>" class="option-btn">Update</a>
         <a href="products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Delete This Product?');">Delete</a>
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



<script>
    $(document).ready(function () {
        $("#categorySelect").change(function () {
            var selectedCategory = $(this).val();
            var additionalOptionSelect = $("#additionalOptionSelect");

            // Clear previous options
            additionalOptionSelect.empty();

            // Add options based on the selected category
            if (selectedCategory === "Cleaning Appliances") {
                // Add options for Cleaning Appliances
                additionalOptionSelect.append('<option value="Option1">Vacuum</option>');
                additionalOptionSelect.append('<option value="Option2">Dish Sterilizer</option>');
                additionalOptionSelect.append('<option value="Option2">Insect Sterilizer</option>');
            } else if (selectedCategory === "Kitchen Appliances") {
                // Add options for Kitchen Appliances
                additionalOptionSelect.append('<option value="Option3">Refrigerators</option>');
                additionalOptionSelect.append('<option value="Option4">Coffee Maker</option>');
                additionalOptionSelect.append('<option value="Option4">Air Fryer&Ovens</option>');
                additionalOptionSelect.append('<option value="Option4">Blender&Mixers</option>');
            } else if (selectedCategory === "Laundry Appliances") {
                // Add options for Laundry Appliances
                additionalOptionSelect.append('<option value="Option3">Washing Machine</option>');
                additionalOptionSelect.append('<option value="Option4">Dryer</option>');
                additionalOptionSelect.append('<option value="Option4">Irons</option>');
            } else if (selectedCategory === "Climate Control Appliances") {
                // Add options for Climate Control Appliances
                additionalOptionSelect.append('<option value="Option3">Air Conditioners</option>');
                additionalOptionSelect.append('<option value="Option4">Heater</option>');
                additionalOptionSelect.append('<option value="Option4">Fans</option>');
            } else if (selectedCategory === "Multimedia Appliances") {
                // Add options for Multimedia Appliances
                additionalOptionSelect.append('<option value="Option3">Flats Screen Television</option>');
                additionalOptionSelect.append('<option value="Option4">Audio System</option>');
                additionalOptionSelect.append('<option value="Option4">Game Consoles</option>');
            }
           
        });
    });
</script>




<script src="../js/admin_script.js"></script>

</body>
</html>