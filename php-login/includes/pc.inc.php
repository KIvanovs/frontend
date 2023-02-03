<?php  

include "dbh.inc.php";

$sql = "SELECT * FROM patchnotes ORDER BY pcId DESC";
$result = mysqli_query($conn, $sql);