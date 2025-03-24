<?php
session_start();
    include('db_conn.php');

    function send_password_reset ($get_firstname, $get_email) {
        
    }

    if(isset($_POST['password_reset_link'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $token = md5(rand());

        $check_email = "SELECT email from datas WHERE email = '$email' LIMIT 1";
        $check_email_run = mysqli_query($con, $check_email);

        if(mysqli_num_rows($check_email_run) > 0 ) {
            $row = mysqli_fetch_array($check_email_run);
            $get_firstname = $row['firstname'];
            $get_email = $row['email'];

            $update_token_run = mysqli_query($con, $update_token);

            if($update_token_run) {
                send_password_reset($get_firstname, $get_email);
                $_SESSION['status'] = "We E-mailed you a password reset link";
                header("Location: password-reset.php");
                exit(0);
            }

            else {
                $_SESSION['status'] = "Something went wrong. #1";
                header("Location: password-reset.php");
                exit(0);
            }

       }

       else {
            $_SESSION['status'] = "No Email Found";
            header("Location: password-reset.php");
            exit(0);
       }
    }
?>