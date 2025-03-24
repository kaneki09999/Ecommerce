<?php
session_start();
include '../components/connect.php';

if (isset($_POST['update_qty'])) {
    $user_id = $_SESSION['no'];
    $product_id = $_POST['product_id'];
    $new_quantity = $_POST['qty'];

    // Perform the update in the database
    $update_quantity = $conn->prepare("UPDATE `cart` SET quantity = :quantity WHERE no = :no AND pid = :pid");
    $update_quantity->bindParam(':quantity', $new_quantity, PDO::PARAM_INT);
    $update_quantity->bindParam(':no', $user_id, PDO::PARAM_INT);
    $update_quantity->bindParam(':pid', $product_id, PDO::PARAM_INT);
    $update_quantity->execute();

    $_SESSION['update_message'] = 'Quantity updated successfully';

    // Redirect back to the page where the form was submitted
    header("Location: " . $_SERVER['HTTP_REFERER'] . '?update_success=1');
    exit();
}
?>
