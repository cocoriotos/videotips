<?php include "header.php";
include "db_connection1.php";
session_start();
$id = $_GET['id'];
$local_username=$_SESSION['email'];
?>



<div class="container p-4">

	<div class="row">
		<div class="col-md-4">
		     		 
			 <?php 
					$query = "select * from videotips_viodetipscategory where id = '$id' and username='$local_username'";
					$result_link = mysqli_query($conn,$query);
					$link = mysqli_fetch_array($result_link);
			 ?>
			 			 
		  
			<div class="card card-body">
				<center action="updatecategory.php" method="POST"> 
				<div class="form-group">
					<label for="id" style="color: black;"><strong>Id</strong></label><br>	
						<input type="text" name="id" class="form-control" placeholder="ID" autofocus value ="<?php echo $link['id'];?>"readonly></input><br>
					</div>
				    <div class="form-group">
					<label for="id" style="color: black;"><strong>Category</strong></label><br>	
						<input type="text" name="maincategory" class="form-control" placeholder="ID" autofocus value ="<?php echo $link['maincategory'];?>"></input><br>
					</div>
					<div class="form-group">
						<label for="videolink" style="color: black;"><strong>Sub Category</strong></label><br>	
						<input type="text" name="category" class="form-control" placeholder="link" autofocus value ="<?php echo $link['category'];?>"></input><br>
					</div>
					<center><input type="submit" class="btn btn-success btn-block" name="update_category" value="Update"></input></center><br><br><br>
					<center><input type="submit" class="btn btn-success btn-block" name="logout" value="Delete" formaction="deletecategory.php"></input></center><br><br><br>
					<center><input type="submit" class="btn btn-success btn-block" name="logout" value="Cancel" formaction="addcategory.php"></input></center>
				</c>
			</div>
		</div>
		
		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
				   <tr>
				       <th>ID</th>
				  	   <th>Category</th>
					  <th>Sub Category</th>
				   </tr>
			    </thead>
				<tbody>
					<?php 
					$query1 = "select * from videotips_viodetipscategory where id = '$id' and username = '$local_username'";
					$result_link1 = mysqli_query($conn,$query1);
					while($link = mysqli_fetch_array($result_link1)) { ?>
					  <tr>
					    <td><?php echo $link['id'] ?></td>
					    <td><?php echo $link['maincategory'] ?></td>
						<td><?php echo $link['category'] ?></td>
						</td>
					  </tr>
					<?php }?>
				<tbody>
			</table>
		</div>
	</div>
</div>

<?php include ("footer.php")?>