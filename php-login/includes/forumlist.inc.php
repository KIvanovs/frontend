<?php
session_start();

if (isset($_POST["submit"])) {

    $title = $_POST["title"];
    $text = $_POST["text"];

    if (isset($_SESSION["useruid"])) {
        $username = $_SESSION['useruid'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emtyInputForum($title, $text) !== false) {
            header("location: ../forumlist.php?error=emptyinput");
            exit();
        }

        createForum($conn, $username, $title, $text);
        
    }else{
        $username = $_SESSION['adminN'];
        
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';
        
        if(emtyInputForum($title, $text) !== false) {
            header("location: ../forumlist.php?error=emptyinput");
            exit();
        }
    
        createForum($conn, $username, $title, $text);
    }

}else{
    header("location: ../forumlist.php");
    exit();
}