<?php
    
    $servername = 'localhost';
    $user = '';
    $pass = '';
    $db = 'Portfolio';

    $conn = mysqli_connect($servername, $user, $pass, $db) or die("Unable to connect");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
