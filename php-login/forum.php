<?php
include_once 'header.php';
include 'includes/forum.inc.php';
?>
<link rel="stylesheet" href="css/comment.css">

    <section class='comment-form'>
    <div class='container'>

<?php
if (isset($_SESSION["useruid"])) {?>
    <form action='includes/forum.inc.php' 
            method='post'>
    <h1>Add comment</h1>
    <p>Please fill in this form to create a comment.</p>
    <input type='text' name='comment' placeholder='your comment...'>
    <input type="text" 
		          name="forumId"
		          value='<?=$row["forumId"]?>'
		          hidden >
    <button type='submit' name='submit'>Add comment</button>
    </form>
    <?php 
    
}
else if (isset($_SESSION["adminN"])) { ?>
    <form action='includes/forum.inc.php' method='post'>
    <h1>Add comment</h1>
    <p>Please fill in this form to create a comment.</p>
    <input type='text' name='comment' placeholder='your comment...'>
    <input type="text" 
		          name="forumId"
		          value='<?=$row["forumId"]?>'
		          hidden >        
    <button type='submit' name='submit'>Add comment</button>
    </form>
    <?php }
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
    require_once 'includes/forum.inc.php';

    while($row = mysqli_fetch_array($result2)) {
        echo"";
        echo "
            <div class='container'>
            <div class='comment__container opened' id='first-comment'>";
        echo"<div class='comment__card'>";
        echo "<h3 class='comment__title'>" . $row["useruid"] . "</h3>";
        echo "<h3 class='comment__title'>" . $row["comment"] . "</h3>";?>
        <?php if (isset($_SESSION["useruid"]) == true) { ?>
            <?php if ($_SESSION["useruid"] == $row["useruid"]) { ?>
                <a href="updateF.php?FcommentId=<?php echo $row["FcommentId"]; ?>" class="btn btn-success">Update</a>
                <a href="includes/deleteF.inc.php?FcommentId=<?php echo $row["FcommentId"]; ?>" class="btn btn-danger">Delete</a>				
            <?php }
            } else if (isset($_SESSION["adminN"]) == true) {?>
                <a href="includes/deleteF.inc.php?FcommentId=<?php echo $row["FcommentId"]; ?>" class="btn btn-danger">Delete</a>
                <?php if ($_SESSION["adminN"] == $row["useruid"]) { ?>
                <a href="updateF.php?FcommentId=<?php echo $row["FcommentId"]; ?>" class="btn btn-success">Update</a>
                				
            <?php }
            }
        echo "</div>
        </div>
        </div>";
} 
$result2->free();
$conn->close();
?> 
            
    </section>

</body>
</html>