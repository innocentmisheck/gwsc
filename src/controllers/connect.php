<?php

$con = new mysqli('localhost', 'root', '', 'gwsc');

if($con){
    $message = "Connection initialized successfully!";
}

if (!$con) {
    die(mysqli_error($con));
}

?>