<?php 

if (isset($_GET['forumId'])) {
    
    include "dbh.inc.php";
    
    $id = $_GET['forumId'];
	$sql = "SELECT * FROM forumlist WHERE `forumId` ='$id'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
        
    	header("Location: forum.php");
    }

    $sql = "SELECT * FROM forumlist WHERE `forumId` ='$id'";
    $result = mysqli_query($conn, $sql);


    $sql1 = "SELECT * FROM forumscomments WHERE `forumId` ='$id'";
    $result1 = mysqli_query($conn, $sql1);



}else if (isset($_POST["submit"])) {
    
    session_start();
    include "dbh.inc.php";
    
    $comment = $_POST['comment'];
    $id = $_POST['forumId'];
    
    if (isset($_SESSION["useruid"])) {
        $username = $_SESSION['useruid'];
        include 'dbh.inc.php';
        include 'functions.inc.php';
        
        
        if(emtyInputComment($comment) !== false) {
            header("location: ../forum.php?error=emptyinput");
            exit();
        }

        createFComment($conn, $username, $comment, $id);
        
    }else{
        $username = $_SESSION['adminN'];
        
        include 'dbh.inc.php';
        include 'functions.inc.php';
        
        if(emtyInputComment($comment) !== false) {
            header("location: ../forum.php?error=emptyinput");
            exit();
        }
    
        createFComment($conn, $username, $comment, $id);
    }

}else{
    header("location: forumlist.php");
    exit();
}
