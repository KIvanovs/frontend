<?php

if (isset($_POST["submit"])) {

    $usernameA = $_POST["uidA"];
    $pwdA = $_POST["pwdA"];

    require_once 'dbh.inc.php';
    require_once 'AdminFunctions.inc.php';

    if(emtpyInputaldomgiinn($usernameA, $pwdA) !== false) {
        header("location: ../aldomgiinn.php?error=emptyinput");
        exit();
    }

    loginaldomgiinn($conn, $usernameA, $pwdA);
}
else{
    header("location: ../aldomgiinn.php");
    exit();
}