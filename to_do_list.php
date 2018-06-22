<?php
    require_once 'engine/initialize.php';

    $prepStatement = $conn->prepare("SELECT id, item_name, checked FROM itemsToDo WHERE userID=?");
    $prepStatement->bind_param("i", $_SESSION['userID']);
    $prepStatement->execute();
    $queryResult = $prepStatement->get_result();
    $prepStatement->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TODO list</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="engine/todoStyle.css" />
    </head>
    <body>
        <div>
            <h1>To do</h1>
            <ul class="items">
                <?php
                    if (!empty($queryResult)) {
                        while($row = $queryResult->fetch_assoc()) {
                            $iName = $row['item_name'];
                            $done = ($row['checked']) ? "done" : "" ;
                            $listString = "<li><span class=\"item $done\">$iName</span>";
                            if (!$row['checked']) {
                                $idElement = $row['id'];
                                $listString.= "<a href=\"engine/mark.php?check=true&id=$idElement\" class=\"checker\">Mark as done</a>";
                            }
                            $listString.= "<a href=\"#\" class=\"desc\"> +</a><a href=\"#\" class=\"remove\"> x</a></li>";
                            echo $listString;
                        }
                    } else {
                        echo "You haven't added any item to your list. Use the field below to add your first item.";
                    }
                    
                     
                ?>
            </ul>
            <form action="engine/add.php" method="post">
                <input type="text" name="itemName" placeholder="Enter a new item" required>
                <button type="submit">Add</button>
            </form>

        </div>

        <!-- Trigger/Open The Modal -->
        <!-- <button id="myBtn">Open Modal</button> -->

        <!-- The Modal -->
        <!-- <div id="myModal" class="modal"> -->

            <!-- Modal content -->
            <!-- <div class="modal-content">
                <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Modal Header</h2>
                </div>
                <div class="modal-body">
                <p>Some text in the Modal Body</p>
                <p>Some other text...</p>
                </div>
                <div class="modal-footer">
                <h3>Modal Footer</h3>
                </div>
            </div>

        </div> -->

        <!-- <script>
            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script> -->

    </body>
</html>
