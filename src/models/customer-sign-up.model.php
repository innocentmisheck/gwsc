<?php

//$message = "Please fill all required spaces!";

if (isset($_POST['submit'])) {
    // Inserting the primary data
    $national_id = $_POST['national_id'];
    $email = $_POST['email_address'];
    // Ending the primary data

    //start the KYS data and other data
    $dob = $_POST['dob'];
    $gender= $_POST['gender'];
    $first_name= $_POST['first_name'];
    $last_name= $_POST['last_name'];
    $other_name= $_POST['other_name'];
    $nationality = $_POST['nationality'];
    $home_address = $_POST['home_address'];
    $phone_number = $_POST['phone_number'];


    //checking the data inside the database
    $check_user_email_query = "SELECT * FROM `tbl_students` WHERE `email_address` = '$email'";
    $check_user_nid_query = "SELECT * FROM `tbl_students` WHERE `national_id` = '$national_id'";
    $check_user_email_result = mysqli_query($con, $check_user_email_query);
    $check_user_nid_result = mysqli_query($con, $check_user_nid_query);
    $user_email_exists = mysqli_num_rows($check_user_email_result);
    $user_nid_exists = mysqli_num_rows($check_user_nid_result);



    //If all good inserting the PRIMARY AND KYS data into the database
    if ($user_email_exists === 0 || $user_nid_exists === 0) {
            // Generate a random floating-point number between 0 and 1
            $randomFloat = mt_rand() / mt_getrandmax();

            // Multiply by 9 to get a number between 0 and 9
            $randomFloat *= 9;

            // Format the number as a string without the dot (.)
            $randomString = "SCUM" . str_replace('.', '', number_format($randomFloat, 4)); // You can adjust the number of decimal places if needed

        //insert PRIMARY DATA
        $insert_query_data = "INSERT INTO `tbl_students` (`id`, `student_code`, `national_id`, `email_address`) VALUES ('', '$randomString','$national_id', '$email');";

        //insert KYS DATA
        $insert_query = "INSERT INTO `tbl_student_details` (`id`,`first_name`, `last_name`,`other_name`,`nationality`,`home_address`, `phone_number`,`gender`,`dob`) VALUES ('','$first_name', '$last_name', '$other_name','$nationality', '$home_address', '$phone_number','$gender','$dob');";

        //Insert ALL DATA 
        $insert_result_data = mysqli_query($con, $insert_query_data);
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result_data && $insert_result) {
            $message = "Registration successful!";
            $message = "Your student number is: $randomString";
        } else {
            $message = "Error: " . mysqli_error($con);
            $message = "Error initializing student number: " . mysqli_error($con);
        }
    }

    else 
    {
        $message = "Email or National ID already exists.";
    }
}


// Jobs ending here
?>