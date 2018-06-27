<?php

    function connect() {
        $servername = "localhost";
        $username = "testUser";
        $password = "password123";
        $dbname = "tododb";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return false;
        }

        return $conn;
    } 

    function isNameExist($name){
        $conn = connect();
        $name = strtoupper($name);
        $sql = "SELECT * FROM MyUsers WHERE UPPER(username) = '$name'";
        $result = $conn->query($sql);
        $exists = $result->num_rows > 0;  
        return $exists ? $result->fetch_object() : null;
    }

    function passwordTest ($pass, $userID) {
        $conn = connect();
        $sql = "SELECT passwrd FROM MyUsers WHERE id=$userID LIMIT 1";
        $query = $conn->query($sql);
        $result = $query->fetch_object();
    
        return $result->passwrd == MD5($pass);
    }

    function createNewUser($name, $pass){
        $conn = connect();
        $pass = MD5($pass);
        $sql = "INSERT INTO myusers (username, passwrd)
        VALUES ('$name', '$pass')";
        
        $conn->query($sql);

        return $conn->error == '' ? (object) array('username' => $name, 'id' => $conn->insert_id) : null;
    }
?>