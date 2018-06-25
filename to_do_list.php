<?php
    require_once 'engine/initialize.php';
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
            <span >
                <a href="engine/logout.php" class="logout">Sign out</a>
            </span>
            <h1>To do</h1>
            <small><i>Welcome back <?php echo $user->username ?></i></small>
            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Description</h2>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the Modal Body</p>
                        <p>Some other text...</p>
                    </div>
                    <div class="modal-footer">
                        <button style="margin-left:50px">Update</button><button style="margin-right:50px; float: right; background: rgb(177, 25, 25)">Clear</button>
                    </div>
                </div>
    
            </div>
    
            <ul class="items"><?php require_once 'engine/load_list.php'; ?></ul>
            <form action="engine/add.php" method="post">
                <input id="newEntry" type="text" name="itemName" placeholder="Enter a new item" required>
                <button id="submit" type="submit">Add</button>
            </form>
            
            
        </div>

        

        <script>
            // Get the modal
            var modal = document.getElementById('myModal');

            function getButtons() {
        
                //Get buttons
                var desc_btns = document.getElementsByClassName("desc");
                for (i = 0; i < desc_btns.length; i++) {
                    desc_btns.item(i).addEventListener("click", describe);
                }
                
                var delete_btns = document.getElementsByClassName("remove");
                for (i = 0; i < delete_btns.length; i++) {
                    delete_btns.item(i).addEventListener("click", remove);
                }

                var mark_btns = document.getElementsByClassName("checker");
                for (i = 0; i < mark_btns.length; i++) {
                    mark_btns.item(i).addEventListener("click", check);
                }
            }
            
            var submit_btn = document.getElementById("submit");
            submit_btn.addEventListener("click", function(event) {
                event.preventDefault();
                addNew();
            } );

            getButtons();

            function addNew() {
                var input = document.getElementById("newEntry");
                var xhr = new XMLHttpRequest();
                xhr.open('POST','engine/add.php',true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(){
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        listPlace.innerHTML = xhr.responseText;
                        input.value = "";
                        
                        getButtons();
                    }
                }
                xhr.send("itemName="+input.value);
            }

            function describe() {
                modal.style.display = "block";

                // use AJAX
                var xhr = new XMLHttpRequest();
                xhr.open('GET','engine/decription.php',true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(){
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.responseText);
                    }
                }
                xhr.send();
            }  
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

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

            var listPlace = document.getElementsByClassName("items")[0];
            function remove() {
                var xhr = new XMLHttpRequest();
                xhr.open('POST','engine/delete.php',true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(){
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        listPlace.innerHTML = xhr.responseText;
                        
                        getButtons();
                    }
                }
                xhr.send("id="+this.id);
            }  

            function check() {
                var xhr = new XMLHttpRequest();
                xhr.open('POST','engine/mark.php',true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(){
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        listPlace.innerHTML = xhr.responseText;
                        
                        getButtons();
                    }
                }
                xhr.send("id="+this.id);
            }  
        </script>

    </body>
</html>
