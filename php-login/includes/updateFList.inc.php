<?php 
// var_dump($_GET);
if (isset($_GET['forumId'])) {
    include "dbh.inc.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

    $id = validate($_GET['forumId']);
	$sql = "SELECT * FROM `forumlist` WHERE `forumId` ='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: UpdateFList.php");
    }


}else if(isset($_POST['update'])){
    include "dbh.inc.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
    $Title = validate($_POST["Title"]);
    $text = validate($_POST["text"]);
    $id = validate($_POST['forumId']);
    

	if (empty($Title) || empty ($text)) {
		header("Location: ../updateFList.php?error=Empty input");
	}else {
       $sql = "UPDATE `forumlist`
               SET `title`='$Title', `text`='$text'
               WHERE `forumId`=$id";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	 header("Location: ../forumlist.php?success=successfully updated");
       }else {
          header("Location: ../updateFList.php?id=$id&error=unknown error occurred");
       }
	}
}else {
	header("Location: forumlist.php");
}