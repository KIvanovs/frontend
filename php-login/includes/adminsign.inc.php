<?php

// if (isset($_POST["submit"])) {

//     $username = $_POST["uid"];
//     $pwd = $_POST["pwd"];

//     require_once 'dbh.inc.php';
//     require_once 'functions.inc.php';

//     if(emptyInputAdmin($username, $pwd) !== false) {
//         header("location: ../adminsign.php?error=emptyinput");
//         exit();
//     }
//     if(uidExistsAdmin($conn, $username) !== false) {
//         header("location: ../signup.php?error=usernametaken");
//         exit();
//     }

//     createAdmin($conn, $username, $pwd);

// }else{
//     header("location: ../adminsign.php");
//     exit();
// }
