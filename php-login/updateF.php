<?php
include_once 'header.php';
include 'includes/updateF.inc.php';
?>

</head>
<body>
	<div class="container">
		<form action="includes/updateF.inc.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Update</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
            <label for="comment">Comment</label>
		     <input type="text" 
		           class="form-control" 
		           id="comment" 
		           name="comment" 
		           value='<?=$row["comment"] ?>' >
		   </div>
		   <input type="text" 
		          name="FcommentId"
		          value='<?=$row["FcommentId"]?>'
		          hidden >
		   <button type="submit" 
		           class="btn btn-primary"
		           name="update">
				   Update</button>
			
	    </form>
	</div>
</body>
</html>