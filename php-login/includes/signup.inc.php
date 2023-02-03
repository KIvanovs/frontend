<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (strlen($pwd) < 8) {
        header("location: ../signup.php?error=passwordtooshort");
        exit();
    }
    if (!preg_match("#[0-9]+#", $pwd)) {
        header("location: ../signup.php?error=onenumber");
        exit();
    }
    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        header("location: ../signup.php?error=oneletter");
        exit();
    } 
    if (!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $pwd)) {
        header("location: ../signup.php?error=onesymb");
        exit();
    }    
    if(uidExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);
 }else{
    header("location: ../signup.php");
    exit();
}