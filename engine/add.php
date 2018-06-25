<?php

    require_once 'initialize.php';

    if (isset($_POST['itemName'])) {
        $itemName = test_input($_POST['itemName']);

        if (!empty($itemName)) {
            $queryStatement = $conn->prepare("INSERT INTO itemsToDo (item_name, checked, userID) VALUES (?, 0, ?)");
            $queryStatement->bind_param("si", $itemName, $user->id);
            $queryStatement->execute();
            $queryStatement->close();
        }
    }

    header('location: load_list.php');


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>