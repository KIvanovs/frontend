<?php
require_once 'dbh.inc.php';

// $user=$_SESSION['useruid'];
// $sql= "SELECT usersName,UsersEmail,usersUid FROM users WHERE usersUid='$user'";
// $result = mysqli_query($conn, $sql);

if (isset($_SESSION["useruid"]) == true) { 
        $user=$_SESSION['useruid'];
        $sql= "SELECT usersName,UsersEmail,usersUid FROM users WHERE usersUid='$user'";
        $result = mysqli_query($conn, $sql);

} else {
    header("location: index.php");
}

?>