<?php
    session_start();

    require_once 'db_manager.php';

    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['userID'] = isNameExist($_POST['uname'], true);
        if ($id != -1) {
            if (passwordTest($_POST['psw'], $id)) {
                header('location: to_do_list.php');
            } else {
                $error = "Password is incorrect<br />";
                $isError = true;
            }
        }else {
            $error = "Username does not exist<br />";
            $isError = true;
        }
    }elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['alert'])) {
            $msg = $_GET['alert']."!";
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TODO list manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="formStyle.css" />
    </head>
    <body>
        <form action="index.php" method="post">
            <div class="imgcontainer">
                <img src="images/chat_bot.png" alt="Avatar" class="avatar">
            </div>
            <div class="container">
                <?php echo "<span>".$error."</span>"; ?>
                <label for="uname"><b>Username</b><br /></label>
                <input type="text" placeholder="Enter Username" name="uname" required><br />

                <label for="psw"><b>Password</b><br /></label>
                <input type="password" placeholder="Enter Password" name="psw" required><br /><br />

                <button type="submit">Login</button>
            </div>
        </form>
        
        <div class="container" style="background-color:#f1f1f1">
            <a href="sign_up.php">
                <button>Sign Up!</button>
            </a>
        </div>
        <div class="container signin">
            <p>Forgot <a href="#">password?</a></p>
            <footer>
                <cite>Bot Image gotten from <a href="https://www.google.com.ng/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwiyoPzI7OHbAhVJxRQKHQjZBkQQjRx6BAgBEAU&url=https%3A%2F%2Fchatbotsmagazine.com%2Fto-build-a-successful-chatbot-ask-these-5-questions-b7fe3776c74c&psig=AOvVaw0d3QoVUHXebVRrMww1hac0&ust=1529570576470176" target="_blank">here</a></cite>
            </footer>
        </div>
    </body>
</html>
