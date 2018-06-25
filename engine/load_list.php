<?php
    require_once 'initialize.php';
    
    $prepStatement = $conn->prepare("SELECT id, item_name, checked FROM itemsToDo WHERE userID=?");
    $prepStatement->bind_param("i", $user->id);
    $prepStatement->execute();
    $queryResult = $prepStatement->get_result();
    $prepStatement->close();
    
    if ($queryResult->num_rows > 0) {
        while($row = $queryResult->fetch_assoc()) {
            $iName = $row['item_name'];
            $done = ($row['checked']) ? "done" : "" ;
            $listString = "<li><span class=\"item $done\">$iName</span>";
            $idElement = $row['id'];
            if (!$row['checked']) {
                $listString.= "<span class=\"checker\" id=\"$idElement\">Mark as done</span>";
            }
            $listString.= "<span class=\"desc\"> +</span><span class=\"remove\" id=\"$idElement\"> x</span></li>";
            echo $listString;
        }
    } else {
        echo "<li>You haven't added any item to your list. Use the field below to add your first item.</li>";
    }
?>