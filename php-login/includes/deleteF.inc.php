<?php
include "dbh.inc.php";
if(isset($_GET['FcommentId'])) {
   $id = $_GET['FcommentId'];
   $delete = "DELETE FROM `forumscomments` WHERE `FcommentId` ='$id'";
   $result = mysqli_query($conn, $delete);
   if ($result) {
      header("Location: ../forum.php?forumId=$id?success=successfully deleted");
   } else {
      header("Location: ../forum.php?forumId=$id?error=unknown error occurred");
   }
}else {
   header("Location: ../forum.php?forumId=$id?error=smth gone wrong");
}