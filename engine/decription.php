<?php
    require_once 'initialize.php';
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $prepStatement = $conn->prepare("SELECT descriptions FROM itemsToDo WHERE id=?");
        $prepStatement->bind_param("i", $id);
        $prepStatement->execute();
        $queryResult = $prepStatement->get_result();

    }
    
    $desc = $queryResult->fetch_object();
    echo "<p>" . $desc->descriptions . "</p>";
?>