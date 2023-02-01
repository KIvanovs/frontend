<?php
include "dbh.inc.php";
if(isset($_GET['pcId'])) {
   $id = $_GET['pcId'];
   $delete = "DELETE FROM `patchnotes` WHERE `pcId` ='$id'";
   $result = mysqli_query($conn, $delete);
   if ($result) {
      header("Location: ../patchnotes.php?success=successfully deleted");
   } else {
      header("Location: ../patchnotes.php?error=unknown error occurred");
   }
}else {
   header("Location: ../patchnotes.php?error=smth gone wrong");
}