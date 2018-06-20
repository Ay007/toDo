<?php
    session_start();

    $username = $password = $passwordRep = "";
    $userErr = $passwordErr = $passwordRepErr = "";
    $isError = false;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = test_input($_POST['uname']);
        if (empty($username)) {
            $userErr = "Input a username";
            $isError = true;
        }else if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
            $userErr = "Only letters and white space allowed"; 
            $isError = true;
        }

        if (strlen($_POST['psw']) < 8) {
            $passwordErr = "Password must be at least 8 characters";
            $isError = true;
        } else {
            $password = $_POST['psw'];
        }
        
        if ($_POST['psw-repeat'] !== $_POST['psw']) {
            $passwordRepErr = "Passwords do not match";
            $isError = true;
        } else {
            $passwordRep = $_POST['psw-repeat'];
        }
        if (!$isError) {
        
        }
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TODO|Sign up for free!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="formStyle.css" />
    </head>
    <body>
        <form action="sign_up.php" method="post">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="uname"><b>Username  </b></label><span><?php echo $userErr; ?></span>
            <input type="text" placeholder="Enter Username" name="uname" value="<?php echo $username; ?>" required>

            <label for="psw"><b>Password  </b></label><span><?php echo $passwordErr; ?></span>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label for="psw-repeat"><b>Repeat Password  </b></label><span><?php echo $passwordRepErr; ?></span>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

            <button type="submit" class="registerbtn">Register</button>
        </div>
        
        <div class="container signin">
            <p>Already have an account? <a href="index.php">Sign in</a>.</p>
        </div>
        </form>
    </body>
</html>
