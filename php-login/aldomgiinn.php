<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Project</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">
    <!-- <link rel="stylesheet" href="css/reset.css"> -->
</head>
<body>
    <section class="login-form">
        <div class="center">
            <h1>Login</h1>
            <form action="includes/aldomgiinn.inc.php" method="POST">
                <div class="txt_field">
                    <input type="text" name="uidA" required>
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                <input type="password" name="pwdA" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <button onclick="Sign()" id="loginButton" type="submit" name="submit">Login</button>
            </form>
                <div class="home_link">
                  <a href="index.php">Home</a>
                </div>
        </div>

    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<script>alert('Fill inputs')</script>";
            }
            elseif ($_GET["error"] == "wronglogin"){
                echo "<script>alert('Incorrect login info')</script>";
            }
            elseif ($_GET["error"] == "wrongpassword"){
                echo "<script>alert('Incorrect password')</script>";
            }   
            elseif ($_GET["error"] == "stmtfailed"){
                echo "<script>alert('Somethink went wrong try again')</script>";
            } 
            elseif ($_GET["error"] == "none"){
                echo "<script>alert('You have logined!')</script>";
            }
        }
    ?>
</section>