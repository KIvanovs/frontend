<?php 
// var_dump($_GET);
if (isset($_GET['FcommentId'])) {
    include "dbh.inc.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

    $id = validate($_GET['FcommentId']);
	$sql = "SELECT * FROM `forumscomments` WHERE `FcommentId` ='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: UpdateF.php");
    }


}else if(isset($_POST['update'])){
    include "dbh.inc.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
    $comment = validate($_POST["comment"]);
    $id = validate($_POST['FcommentId']);
    

	if (empty($comment)) {
		header("Location: ../updateF.php?error=Empty input");
	}else {
       $sql = "UPDATE `forumscomments`
               SET `comment`='$comment'
               WHERE `FcommentId`=$id";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	 header("Location: ../forum.php?forumId=$id?success=successfully updated");
       }else {
          header("Location: ../updateF.php?id=$id&error=unknown error occurred");
       }
	}
}else {
	header("Location: forum.php");
}