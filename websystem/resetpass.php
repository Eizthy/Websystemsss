<?php
session_start();
include_once('connection.php');

if (isset($_POST['reset'])) {
    $username = $_POST['username'];
    $newPassword = md5($_POST['new_password']);
    $confirmPassword = md5($_POST['confirm_password']);

    // Check if the new password and confirm password match
    if ($newPassword != $confirmPassword) {
        echo "<script>alert('New password and confirm password do not match');</script>";
        exit;
    }

    // Check if the username exists in the database
    $checkUsernameQuery = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

    if (mysqli_num_rows($checkUsernameResult) > 0) {
        // Update the password for the user
        $updatePasswordQuery = "UPDATE `tbl_user` SET `password`='$newPassword' WHERE `username`='$username'";
        $updatePasswordResult = mysqli_query($conn, $updatePasswordQuery);

        if ($updatePasswordResult) {
            echo "<script>alert('Password reset successful');</script>";
            // Redirect to the login page or any other page you desire
            header('location: index1.php');
            exit;
        } else {
            echo "<script>alert('There was an error changing your password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Invalid username');</script>";
    }
}
?>
