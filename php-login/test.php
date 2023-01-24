<?php
include_once 'header.php';
include "includes/dbh.inc.php";
include 'includes/test.inc.php';
?>


<?php
            if (isset($_SESSION["adminN"])) {
              echo "
            <body>
			<div class='container'>
				<div class='box'>
					<h4 class='display-4 text-center'>Comments</h4><br>
					<table class='table table-striped'>
					  <thead>
						<tr>
						  <th scope='col'>#</th>
						  <th scope='col'>Username</th>
						  <th scope='col'>Comment</th>
						  <th scope='col'>Action</th>
						</tr>
					  </thead>";
						$i=0;
						while($row = mysqli_fetch_array($result)) {
						?>
						
						<td><?php echo $row["commentId"]; ?></td>
						<td><?php echo $row["usersUid"]; ?></td>
						<td><?php echo $row["comment"]; ?></td>
						<td>
							<a href="update.php?commentId=<?php echo $row["commentId"]; ?>" class="btn btn-success">Update</a>
							<a href="includes/delete.inc.php?commentId=<?php echo $row["commentId"]; ?>" class="btn btn-danger">Delete</a>				
						</td>
						</tr>
						
						<?php
						$i++;
						}


					} else{
						header("location:index.php");
					  }
					  
				?>
					</table>	  
				</div>
			</div>
		</body>
		</html>

              
            