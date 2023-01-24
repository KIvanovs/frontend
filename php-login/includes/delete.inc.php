<?php
include "dbh.inc.php";

// var_dump($_GET);
if(isset($_GET['commentId'])) {
   $id = $_GET['commentId'];
   $delete = "DELETE FROM `commenttb` WHERE `commentId` ='$id'";
   $result = mysqli_query($conn, $delete);
   if ($result) {
      header("Location: ../test.php?success=successfully deleted");
   } else {
      header("Location: ../test.php?error=unknown error occurred");
   }
}else {
   header("Location: ../test.php?error=smth gone wrong");
}





