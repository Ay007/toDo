<?php
    function isNameExist($name, $returnID = false){
        $servername = "localhost";
        $username = "testUser";
        $password = "password123";
        $dbname = "todoDB";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT id, username FROM MyUsers";
        $result = $conn->query($sql);

        $exist = false;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if (strtolower($row['username']) == strtolower($name)) {
                    //name exists
                    $exist = true;
                    $userID = $row['id'];
                    break;
                }
            }
        }
        $conn->close();
        if ($exist && $returnID) {
            return $userID;
        }elseif (!$exist && $returnID) {
            return -1;
        } else{
            return $exist;
        }
    }

    function passwordTest($pass, $userID){
        $servername = "localhost";
        $username = "testUser";
        $password = "password123";
        $dbname = "todoDB";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT * FROM MyUsers WHERE id=$userID";
        $result = $conn->query($sql);

        $correctPassword = false;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['passwrd'] == $pass) {
                    //name exists
                    $correctPassword = true;
                    break;
                }
            }
        }
        $conn->close();
        return $correctPassword;
    }

    function createNewUser($name, $pass){
        $servername = "localhost";
        $username = "testUser";
        $password = "password123";
        $dbname = "todoDB";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO MyUsers (username, passwrd)
        VALUES ('$name', '$pass')";

        if ($conn->query($sql) === TRUE) {
            $created = true;
        } else {
            $created = false;
        }

        $conn->close();
        return $created;
    }
?>