<?php
session_start();

if (isset($_POST["submit"])) {

    $comment = $_POST["comment"];

    if (isset($_SESSION["useruid"])) {
        $username = $_SESSION['useruid'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emtyInputComment($comment) !== false) {
            header("location: ../comment.php?error=emptyinput");
            exit();
        }

        createComment($conn, $username, $comment);
        
    }else{
        $username = $_SESSION['adminN'];
        
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';
        
        if(emtyInputComment($comment) !== false) {
            header("location: ../comment.php?error=emptyinput");
            exit();
        }
    
        createComment($conn, $username, $comment);
    }

}else{
    header("location: ../comment.php");
    exit();
}
