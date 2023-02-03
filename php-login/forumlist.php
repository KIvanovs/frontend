<?php
include_once 'header.php';
?>
<link rel="stylesheet" href="css/comment.css">
<div class='double-background'>
<section class='comment-form'>
    <div class='container'>

<?php

if (isset($_SESSION["useruid"])) {
    echo"<form action='includes/forumlist.inc.php' method='post'>
    <h1>Add you question</h1>
    <p>Please fill in this form to create a comment.</p>
    <input type='text' name='title' placeholder='your title...'>
    <input type='text' name='text' placeholder='your text...'>
    <button type='submit' name='submit'>Add comment</button>
    </form>";
}
else if (isset($_SESSION["adminN"])) {
    echo"<form action='includes/forumlist.inc.php' method='post'>
    <h1>Add you question</h1>
    <p>Please fill in this form to create a comment.</p>
    <input type='text' name='title' placeholder='your title...'>
    <input type='text' name='text' placeholder='your text...'>
    <button type='submit' name='submit'>Add comment</button>
    </form>";
}
else{
    echo"<section class='comment-form'>
    <div class='container'>
    <h1>To add your question need to login</h1>
    </div>";
}
?>      
   
   
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill inputs</p>";
    } elseif ($_GET["error"] == "none") {
        echo "<p>question added!</p>";
    }
}   
?>
    </div>
</section>



</section>


    <section>
    
        
    <div class="comments-container">          
    <?php
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    require_once 'includes/test.inc.php';

    while($row = mysqli_fetch_array($forum)) {
        echo"";
        echo "
        <ul id='comments-list' class='comments-list'>
        <div class='comment-box'>
        <div class='comment-head'>";
        echo "<h6 class='comment-name by-author'>" . $row["useruid"] . "</h6>";?>
        <a href="forum.php?forumId=<?php echo $row["forumId"]; ?>" class="btn btn-success"><?php echo $row["title"]; ?></a>
        <?php echo "<p>"  . $row["text"] .  "</p>"; ?>
        <?php if (isset($_SESSION["useruid"]) == true) { ?>
        <?php if ($_SESSION["useruid"] == $row["useruid"]) { ?>
            <a href="updateFList.php?forumId=<?php echo $row["forumId"]; ?>" class="btn btn-success">Update</a>
            <a href="includes/deleteFList.inc.php?forumId=<?php echo $row["forumId"]; ?>" class="btn btn-danger">Delete</a>				
        <?php }
        } else if (isset($_SESSION["adminN"]) == true) {?>
            <a href="includes/deleteFList.inc.php?forumId=<?php echo $row["forumId"]; ?>" class="btn btn-danger">Delete</a>	
            <?php if ($_SESSION["adminN"] == $row["useruid"]) { ?>
            <a href="updateFList.php?forumId=<?php echo $row["forumId"]; ?>" class="btn btn-success">Update</a>
        <?php }
        }?>
        <?php echo "</div>
        </div>
        </div>";
} 
$result->free();
$conn->close();
?> 
            
            </div>       
    </section>
</div>
<div id="footer">
        <div class="fcontent">
            <div class="column">
            <img src="https://cdn.discordapp.com/attachments/757590961839669339/1062822979240726719/kdmk.png" alt="LogoRVT">
                <p>
                    <strong>KMDK</strong>
                    Is a Latvian workers cooperative based in RVT college.
                </p>
                <p>
                    We've been making games since 2021 and we're going to keep on upgrading our games on PC.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
