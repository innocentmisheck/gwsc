<?php
// Assuming you have a database connection established

// Generate a random floating-point number between 0 and 1
$randomFloat = mt_rand() / mt_getrandmax();

// Multiply by 9 to get a number between 0 and 9
$randomFloat *= 9;

// Format the number as a string
$randomString = "SCUM" . number_format($randomFloat, 2); // You can adjust the number of decimal places if needed

// Assuming you have a database table named 'random_numbers'
$query = "INSERT INTO random_numbers (value) VALUES ('$randomString')";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Random number inserted successfully: $randomString";
} else {
    echo "Error inserting random number: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
