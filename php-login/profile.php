<?php
include_once 'header.php';
include_once 'includes/profile.inc.php';
?>
<link rel="stylesheet" href="css/profile.css">
<div class='double-background'>
<section> 
<?php
while($row = mysqli_fetch_array($result)) {
        echo"";
        echo "
            <div class='container'>
            <h1> Your profile </h1>
            <div class='comment__container opened' id='first-comment'>";
        echo"<div class='comment__card'>";
        echo"<h2>Your username:</h2>";
        echo "<h3 class='comment__title'>" . $row["usersName"] . "</h3>";
        echo"<h2>Your email:</h2>";
        echo "<p>"  . $row["UsersEmail"] .  "</p>";
        echo"<h2>Your ID:</h2>";
        echo "<p>"  . $row["usersUid"] .  "</p>";?>
        <?php echo "</div>
        </div>
        </div>";
} 
$result->free();
$conn->close();
?> 
            
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