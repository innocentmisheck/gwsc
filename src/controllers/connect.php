<?php

// $con = new mysqli('localhost', 'root', '', 'gwsc');

if($con){
    $message = "Send the feedback and get touched!";
}

if (!$con) {
    die(mysqli_error($con));
}


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $feedback = $_POST['feedback'];
    $rememberMe = $_POST['rememberMe'];


    $check_user_query = "SELECT * FROM `vistor_feedback` WHERE `email` = '$email'";
    $check_user_result = mysqli_query($con, $check_user_query);
    $user_exists = mysqli_num_rows($check_user_result);

    if ($user_exists === 0) {
        $message = "Send the feedback and get touched!";
        $insert_query = "INSERT INTO `vistor_feedback` (`id`, `email`, username`, `feedback`,remember_me) VALUES ('', '$email', '$username', '$feedback', '$rememberMe');";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            $message = "User registration successful!";
        } else {
            $message = "Error: " . mysqli_error($con);
        }
    } else {
        $message = "User with the provided email already exists.";
    }
}


?>