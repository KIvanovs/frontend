<?php
include_once 'header.php';
?>
<link rel="stylesheet" href="css/pc.css">
<section class='comment-form'>
    <div class='container'>
<?php
            if (isset($_SESSION["adminN"])) {
                echo"
                <form action='includes/patchnotes.inc.php' method='post'>
                    <h1>Add patchnote</h1>
                    <p>Please fill in this form to create a patchnote.</p>
                <input type='text' name='PCname' placeholder='Name of patchnote'>
                <input type='text' name='Version' placeholder='Version'>
                <input type='text' name='comment' placeholder='Comment about it'>
                <button type='submit' name='submit'>Add patchnote</button>
                </form>
                ";

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
    require_once 'includes/pc.inc.php';

    while($row = mysqli_fetch_array($result)) {
        ?>
        
        <div class="containerNews">
            <div class="row">
                <div class="col-4">
                    <div class="outside ">
        <?php echo "<p class='headdingtitleouter'>" . $row["PCname"] . "</p>";?>
        <?php echo "<div class='recentnewstitleinner '>";?>
        <?php echo "<div class='innerTitleRecentNews'>"  . $row["Version"] .  "</div>";?>
        <?php echo "<div class='padding'>"  . $row["comment"] .  "</div>";?>
        
        <?php if (isset($_SESSION["adminN"])) { ?>
        <a href="updatePC.php?pcId=<?php echo $row["pcId"]; ?>">Update</a>
		<a href="includes/deletePC.inc.php?pcId=<?php echo $row["pcId"]; ?>">Delete</a>				
        <?php } ?>
        
        <?php echo "</div>
        </div>
    </div>
</div>
</div>";


} 
$result->free();
$conn->close();
?> 
            
    </section>
    
</body>
</html>