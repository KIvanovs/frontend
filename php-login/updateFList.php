<?php
include_once 'header.php';
include 'includes/updateFList.inc.php';
?>
<link rel="stylesheet" href="css/comment.css">
<div class='double-background'>
<section class='comment-form'> 
</head>
<body>
	<div class="container">
		<form action="includes/updateFList.inc.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Update</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="Title">Name of title</label>
		     <input type="text" 
		           class="form-control" 
		           id="Title" 
		           name="Title" 
		           value='<?=$row["title"] ?>' >

             <label for="text">text</label>
		     <input type="text" 
		           class="form-control" 
		           id="text" 
		           name="text" 
		           value='<?=$row["text"] ?>' >
		   </div>
		   <input type="text" 
		          name="forumId"
		          value='<?=$row["forumId"]?>'
		          hidden >
		   <button type="submit" 
		           class="btn btn-primary"
		           name="update">
				   Update</button>
			
	    </form>
	</div>
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