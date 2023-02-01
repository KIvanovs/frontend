<?php
include_once 'header.php';
?>
<link rel="stylesheet" href="css/comment.css">
<section class='comment-form'>
    <div class='container'>

<?php
if (isset($_SESSION["useruid"])) {
    echo"<form action='includes/comment.inc.php' method='post'>
    <h1>Add comment</h1>
    <p>Please fill in this form to create a comment.</p>
    <input type='text' name='comment' placeholder='your comment...'>
    <button type='submit' name='submit'>Add comment</button>
    </form>";
}
else if (isset($_SESSION["adminN"])) {
    echo"<form action='includes/comment.inc.php' method='post'>
    <h1>Add comment</h1>
    <p>Please fill in this form to create a comment.</p>
    <input type='text' name='comment' placeholder='your comment...'>
    <button type='submit' name='submit'>Add comment</button>
    </form>";
}
else{
    echo"<section class='comment-form'>
    <div class='container'>
    <h1>To add comment need to login</h1>
    </div>";
}
?>      
   
   
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill inputs</p>";
    } elseif ($_GET["error"] == "none") {
        echo "<p>comment added!</p>";
    }
}   
?>
    </div>
</section>


    <section>     
    <?php
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    require_once 'includes/test.inc.php';

    while($row = mysqli_fetch_array($result)) {
        echo"";
        echo "
            <div class='container'>
            <div class='comment__container opened' id='first-comment'>";
        echo"<div class='comment__card'>";
        echo "<h3 class='comment__title'>" . $row["usersUid"] . "</h3>";
        echo "<p>"  . $row["comment"] .  "</p>";?>
        <?php if (isset($_SESSION["useruid"]) == true) { ?>
        <?php if ($_SESSION["useruid"] == $row["usersUid"]) { ?>
            <a href="update.php?commentId=<?php echo $row["commentId"]; ?>" class="btn btn-success">Update</a>
            <a href="includes/delete.inc.php?commentId=<?php echo $row["commentId"]; ?>" class="btn btn-danger">Delete</a>				
        <?php }
        } else if (isset($_SESSION["adminN"]) == true) {
            if ($_SESSION["adminN"] == $row["usersUid"]) { ?>
            <a href="update.php?commentId=<?php echo $row["commentId"]; ?>" class="btn btn-success">Update</a>
            <a href="includes/delete.inc.php?commentId=<?php echo $row["commentId"]; ?>" class="btn btn-danger">Delete</a>				
        <?php }
        }?>
        <?php echo "</div>
        </div>
        </div>";
} 
$result->free();
$conn->close();
?> 
            
    </section>
    
</body>
</html>
