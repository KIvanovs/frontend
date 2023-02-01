<?php
include_once 'header.php';
include 'includes/updatePC.inc.php';
?>

</head>
<body>
	<div class="container">
		<form action="includes/updatePC.inc.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Update</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="PCname">Name of patchnote</label>
		     <input type="text" 
		           class="form-control" 
		           id="PCname" 
		           name="PCname" 
		           value='<?=$row["PCname"] ?>' >

             <label for="Version">Version</label>
		     <input type="text" 
		           class="form-control" 
		           id="Version" 
		           name="Version" 
		           value='<?=$row["Version"] ?>' >

             <label for="comment">Comment</label>
		     <input type="text" 
		           class="form-control" 
		           id="comment" 
		           name="comment" 
		           value='<?=$row["comment"] ?>' >
		   </div>
		   <input type="text" 
		          name="pcId"
		          value='<?=$row["pcId"]?>'
		          hidden >
		   <button type="submit" 
		           class="btn btn-primary"
		           name="update">
				   Update</button>
			
	    </form>
	</div>
</body>
</html>