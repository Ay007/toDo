<?php

    require_once 'initialize.php';

    if (isset($_GET['check'], $_GET['id'])) {
        $id = $_GET['id'];
        $ch = 1;
        $queryStatement = $conn->prepare("UPDATE itemsToDo SET checked = ? WHERE id = ?");
        $queryStatement->bind_param("ii", $ch, $id);
        $queryStatement->execute();
        $queryStatement->close();
    }
    header('location: ../to_do_list.php');
?>