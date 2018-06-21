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

        $sql = "SELECT * FROM MyUsers ORDER BY id LIMIT $userID, 1";
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
        $created = false;
        // sql to create table
        $sql = "CREATE TABLE $name (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Table MyGuests created successfully";
            $created = true;
        } else {
            echo "Error creating table: " . $conn->error;
        }
        $conn->close();

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "INSERT INTO MyUsers (username, passwrd)
        VALUES ('$name', '$pass')";

        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            $created = "New record created successfully. Last inserted ID is: " . $last_id;
        } else {
            $created = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        return $created;
    }
?>