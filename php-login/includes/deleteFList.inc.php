<?php
include "dbh.inc.php";
if(isset($_GET['forumId'])) {
   $id = $_GET['forumId'];
   $delete = "DELETE FROM `forumlist` WHERE `forumId` ='$id'";
   $result = mysqli_query($conn, $delete);
   if ($result) {
      header("Location: ../forumlist.php?success=successfully deleted");
   } else {
      header("Location: ../forumlist.php?error=unknown error occurred");
   }
}else {
   header("Location: ../forumlist.php?error=smth gone wrong");
}