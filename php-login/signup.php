<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Project</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/signup.css">
    <!-- <link rel="stylesheet" href="css/reset.css"> -->
</head>
<body>
        <section class="signup-form">
        <div class="center">
            <h1>Sign up</h1>
            <form action="includes/signup.inc.php" method="POST">
                <div class="txt_field">
                    <input type="text" name="name" required>
                    <span></span>
                    <label>Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="email" required>
                    <span></span>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="uid" required>
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                <input type="password" name="pwd" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <div class="txt_field">
                <input type="password" name="pwdrepeat" required>
                    <span></span>
                    <label>Repeat Password</label>
                </div>
                <button onclick="Sign()" id="signupButton" type="submit" name="submit">Sign up</button>
            </form>
                <div class="login_link">
                  Have an account? <a href="login.php">Login</a>
                </div> 
                <div class="home_link">
                  <a href="index.php">Home</a>
                </div> 
        </div>


        
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<script>alert('Fill inputs')</script>";
            }
            elseif ($_GET["error"] == "invaliduid"){
                echo "<script>alert('Choose a proper username')</script>";
            }
            elseif ($_GET["error"] == "invalidemail"){
                echo "<script>alert('Choose a proper email')</script>";
            } 
            elseif ($_GET["error"] == "passwordsdontmatch") {
                echo "<script>alert('passwords doesn't match')</script>";
            }
            elseif ($_GET["error"] == "stmtfailed"){
                echo "<script>alert('Somethink went wrong try again')</script>";
            }
            elseif ($_GET["error"] == "usernametaken"){
                echo "<script>alert('Username already taken')</script>";
            }
            elseif ($_GET["error"] == "passwordtooshort"){
                echo "<script>alert('Password too short!')</script>";
            }
            elseif ($_GET["error"] == "onenumber"){
                echo "<script>alert('Password must include at least one number!')</script>";
            }
            elseif ($_GET["error"] == "oneletter"){
                echo "<script>alert('Password must include at least one letter!')</script>";
            }
            elseif ($_GET["error"] == "onesymb"){
                echo "<script>alert('Password must include at least one symbol!')</script>";
            }
            
                    
        }

        ?>
</section>
    </body>
    </html>


