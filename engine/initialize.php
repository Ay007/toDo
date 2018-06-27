<?php
    session_start();
    $servername = "localhost";
    $username = "testUser";
    $password = "password123";
    $dbname = "todoDB";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return false;
    }

    if (!isset($_SESSION['user'])) {
        header ('Location:./');
    }

    $user = $_SESSION['user'];
?>