<?php

    require_once 'initialize.php';

    if (isset($_POST['itemName'])) {
        $itemName = test_input($_POST['itemName']);

        if (!empty($itemName)) {
            $queryStatement = $conn->prepare("INSERT INTO itemsToDo (item_name, checked, userID) VALUES (?, 0, ?)");
            $queryStatement->bind_param("si", $itemName, $_SESSION['userID']);
            $queryStatement->execute();
            $queryStatement->close();
        }
    }

    header('location: ../to_do_list.php');


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>