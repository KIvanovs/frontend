<?php
session_start();

if (isset($_POST["submit"])) {

    $PCname = $_POST["PCname"];
    $Version = $_POST["Version"];
    $comment = $_POST["comment"];

    if (isset($_SESSION["adminN"])) {
        $username = $_SESSION['adminN'];
        
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';
        
        if(emtyInputPCname($PCname) !== false) {
            header("location: ../patchnotes.php?error=emptyinput");
            exit();
        }
        if(emtyInputVersion($Version) !== false) {
            header("location: ../patchnotes.php?error=emptyinput");
            exit();
        }
        if(emtyInputComment($comment) !== false) {
            header("location: ../patchnotes.php?error=emptyinput");
            exit();
        }
    
        createPatchnote($conn, $username, $PCname, $Version, $comment);
        
    }

}else{
    header("location: ../patchnotes.php");
    exit();
}
