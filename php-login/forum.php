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
<div class="comments-container">        
<?php
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    require_once 'includes/forum.inc.php';

    while($row = mysqli_fetch_array($result1)) {
        echo"";
        echo  "
            <ul id='comments-list' class='comments-list'>
            <div class='comment-box'>
            <div class='comment-head'>";
        echo "<h6 class='comment-name by-author'>" . $row["useruid"] . "</h6>";;
        echo "<div class='comment-content'>"  . $row["comment"] .  "</div>";
        echo "</div>
        </div>
        </div></ul>";
} 
//$result->free();
//$conn->close();
?> 
    </div> 
    </section>

</body>
</html>