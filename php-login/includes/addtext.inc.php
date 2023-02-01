<?php

if (isset($_POST["submit"])) {

    $addedtext = $_POST["addedtext"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputText($addedtext) !== false) {
        header("location: ../addtext.php?error=emptyinput");
        exit();
    }

    createText($conn, $addedtext);

}
else{
    header("location: ../addtext.php");
    exit();
}