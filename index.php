<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TODO list manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="formStyle.css" />
        <!-- <style>
            /* Bordered form */
            form {
                border: 3px solid #f1f1f1;
            }

            /* Full-width inputs */
            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* Set a style for all buttons */
            button {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            /* Add a hover effect for buttons */
            button:hover {
                opacity: 0.8;
            }

            /* Center the avatar image inside this container */
            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
            }

            /* Avatar image */
            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            /* Add padding to containers */
            .container {
                padding: 16px;
            }

            /* The "Forgot password" text */
            span.psw {
                text-align: center;
            }
        </style> -->
    </head>
    <body>
        <form action="index.php" method="post">
            <div class="imgcontainer">
                <img src="images/chat_bot.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
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
            <span>Forgot <a href="#">password?</a></span>
            <footer>
                <cite>Bot Image gotten from <a href="https://www.google.com.ng/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwiyoPzI7OHbAhVJxRQKHQjZBkQQjRx6BAgBEAU&url=https%3A%2F%2Fchatbotsmagazine.com%2Fto-build-a-successful-chatbot-ask-these-5-questions-b7fe3776c74c&psig=AOvVaw0d3QoVUHXebVRrMww1hac0&ust=1529570576470176" target="_blank">here</a></cite>
            </footer>
        </div>
    </body>
</html>
