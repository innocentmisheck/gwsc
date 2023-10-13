<?php
$con = new mysqli('localhost', 'root', '', 'gwsc');

if (!$con) {
    die(mysqli_error($con));
}

$message = "";

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email_address'];
    $phone = $_POST['phone'];


    $check_user_query = "SELECT * FROM `booking_vistor_detail` WHERE `booking_email` = '$email'";
    $check_user_result = mysqli_query($con, $check_user_query);
    $user_exists = mysqli_num_rows($check_user_result);

    if ($user_exists === 0) {
        $insert_query = "INSERT INTO `booking_vistor_detail` (`id`, `first_name`, `last_name`, `booking_email`,`phone`) VALUES ('', '$first_name', '$last_name', '$email','$phone');";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="display: block !important;">
    <form action="forms.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email_address" id="email_address">
        <br>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name">
        <br>
        <label for="middle_name">Last Name</label>
        <input type="text" name="last_name" id="last_name">
        <br>
        <label for="phone">Mobile</label>
        <input type="text" name="phone" id="phone">
        <br>
        <button type="submit" name="submit">Send it</button>
    </form>
    <p><?php echo $message; ?></p>
</body>

</html>
