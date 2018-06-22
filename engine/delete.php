<?php

    require_once 'initialize.php';

    if (isset($_GET['delete'], $_GET['id'])) {
        $id = $_GET['id'];
        $queryStatement = $conn->prepare("DELETE FROM itemsToDo WHERE id = ?");
        $queryStatement->bind_param("i", $id);
        $queryStatement->execute();
        $queryStatement->close();
    }
    header('location: ../to_do_list.php');
?>