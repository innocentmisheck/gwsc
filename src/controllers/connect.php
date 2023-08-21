<?php

$con = new mysqli('localhost', 'root', '', 'db_cum');

if($con){
    $message = "Connection initialized successfully!";
}

if (!$con) {
    die(mysqli_error($con));
}

?>