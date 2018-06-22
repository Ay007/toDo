<?php
    session_start();
    $_SESSION['userID'] = 1;
    $servername = "localhost";
    $username = "testUser";
    $password = "password123";
    $dbname = "todoDB";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    if (!isset($_SESSION['userID'])) {
        die('You are not signed in.');
    }
?>