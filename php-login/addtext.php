<?php
include_once 'header.php';
?>

<section class="addingtext">
    <h2>Add text</h2>
    <div class="text-form-form">
        <form action="includes/addtext.inc.php" method="post">
            <input type="text" name="addedtext" placeholder="text...">
            <button type="submit" name="submit">Addtext</button>
        </form>
    </div>
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill inputs</p>";
            }
            elseif ($_GET["error"] == "none"){
                echo "<p>Text added</p>";
            }
        }
    ?>
</section>