<?php
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;        
    }

    $username = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($username)) {
        header("Location: ../login/logindex.php?error=Username is required");
        exit();
    } else if (empty($pass)) {
        header("Location: ../login/logindex.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM datas WHERE username='$username' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) ===1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $pass) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['no'] = $row['no'];
                header("Location: ../user/index.php");
                exit();

            } else {
                header("Location: ../login/logindex.php?error=Incorrect Username or Password");
                exit();
            }
            } else {
                header("Location: ../login/logindex.php?error=Incorrect Username or Password");
                exit();
            }
        }

} else {
    header ("Location: ../user/index.php");
    exit();
}


