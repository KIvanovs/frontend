<?php 
// var_dump($_GET);
if (isset($_GET['pcId'])) {
    include "dbh.inc.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

    $id = validate($_GET['pcId']);
	$sql = "SELECT * FROM `patchnotes` WHERE `pcId` ='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: updatePC.php");
    }


}else if(isset($_POST['update'])){
    include "dbh.inc.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
    $PCname = validate($_POST["PCname"]);
    $Version = validate($_POST["Version"]);
	$comment = validate($_POST['comment']);
    $id = validate($_POST['pcId']);
    

	if (empty($PCname) || empty ($Version) || empty ($comment)) {
		header("Location: ../updatePC.php?error=Empty input");
	}else {
       $sql = "UPDATE `patchnotes`
               SET `comment`='$comment', `PCname`='$PCname',`Version`='$Version'
               WHERE `pcId`=$id";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	 header("Location: ../patchnotes.php?success=successfully updated");
       }else {
          header("Location: ../updatePC.php?id=$id&error=unknown error occurred");
       }
	}
}else {
	header("Location: patchnotess.php");
}