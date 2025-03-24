<?php
session_start();

if (isset($_SESSION['no']) && isset($_SESSION['username'])) {

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
  <body>
        <h1>Hello, <?php echo $_SESSION['firstname']; ?></h1><br>  
        <a href="logout.php"> Log out</a>
  </body>
</html> 


<?php
}
else {
    header("Location: index.php");
    exit();
}
?>