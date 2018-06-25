<?php

    require_once 'initialize.php';

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $queryStatement = $conn->prepare("DELETE FROM itemsToDo WHERE id = ?");
        $queryStatement->bind_param("i", $id);
        $queryStatement->execute();
    }
    header('location: load_list.php');
?>