<?php
// Assuming you have a session mechanism in place
session_start();

// Set the maximum number of login attempts
$maxAttempts = 3;

// Check if the login attempts session variable is set
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

// Check if the waiting end time session variable is set
if (!isset($_SESSION['waiting_end_time'])) {
    $_SESSION['waiting_end_time'] = 0;
}

// Get the current timestamp
$currentTimestamp = time();

// Check if waiting period is still active
if ($currentTimestamp < $_SESSION['waiting_end_time']) {
    $remainingTime = $_SESSION['waiting_end_time'] - $currentTimestamp;
    echo "Please wait for " . gmdate("i:s", $remainingTime) . " before attempting again.";
} else {
    // Process the login attempt
    if ($_SESSION['login_attempts'] < $maxAttempts) {
        // Simulate a failed login attempt for demonstration
        $loginSuccess = false;

        if (!$loginSuccess) {
            $_SESSION['login_attempts']++;

            if ($_SESSION['login_attempts'] === $maxAttempts) {
                // Set the waiting end time to 15 minutes from now
                $_SESSION['waiting_end_time'] = $currentTimestamp + 900; // 15 minutes in seconds
                echo "Maximum login attempts reached. Please wait for 15 minutes.";
            } else {
                echo "Login attempt failed. Remaining attempts: " . ($_SESSION['login_attempts'] - $maxAttempts);
            }
        } else {
            echo "Login successful!";
            // Reset login attempts upon successful login
            $_SESSION['login_attempts'] = 0;
        }
    } else {
        echo "Maximum login attempts reached. Please wait for 15 minutes.";
    }
}
?>
