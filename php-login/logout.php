<?php
    session_start();
    if (isset($_SESSION["useruid"])) {
        unset($_SESSION["useruid"]);
    }
    else{
        unset($_SESSION["adminN"]);
    }
    header("location:index.php");
?>