<?php
    function isNameExist($name){
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

        $sql = "SELECT username FROM MyUsers";
        $result = $conn->query($sql);

        $exist = false;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if (strtolower($row['username']) == strtolower($name)) {
                    //name exists
                    $exist = true;
                    break;
                }
            }
        }
        $conn->close();
        return $exist;
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