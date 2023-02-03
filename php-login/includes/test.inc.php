<?php  

include "dbh.inc.php";

$sql = "SELECT * FROM commenttb ORDER BY commentId DESC";
$result = mysqli_query($conn, $sql);

$forumsql = "SELECT * FROM forumlist ORDER BY forumId DESC";
$forum = mysqli_query($conn, $forumsql);

