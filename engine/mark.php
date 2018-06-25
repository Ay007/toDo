<?php

    require_once 'initialize.php';

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $ch = 1;
        $queryStatement = $conn->prepare("UPDATE itemsToDo SET checked = ? WHERE id = ?");
        $queryStatement->bind_param("ii", $ch, $id);
        $queryStatement->execute();
        $queryStatement->close();
    }
    header('location: load_list.php');
?>