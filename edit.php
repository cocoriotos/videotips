<?php include "header.php";
include "db_connection1.php";
include "sessions.php";
$_SESSION['counter']=$_SESSION['counter']+1; 
//$videolink = $_GET['videolink'];
$id = $_GET['id'];
//print_r($videolink);
?>



<div class="container p-4">

	<div class="row">
		<div class="col-md-4">
		     		 
			 <?php 
					//$query = "select * from videotips_videotips where videolink = '$videolink'";
					$query = "select * from videotips_videotips where id = '$id'";
					$result_link = mysqli_query($conn,$query);
					$link = mysqli_fetch_array($result_link);
			 ?>
			 			 
		  
			<div class="card card-body">
				<form action="updatelinks.php" method="POST"> 
					<div class="form-group">
						<input type="text" name="id" class="form-control" placeholder="ID" autofocus value ="<?php echo $link['id'];?>"></input><br>
					</div>
					<div class="form-group">
						<input type="text" name="videolink" class="form-control" placeholder="link" autofocus value ="<?php echo $link['videolink'];?>"></input><br>
					</div>
					<div class="form-group">
						<select name= "maincategory" required>  <?php echo $SQLSELECT = "SELECT * FROM videotips_maincategory order by maincategory asc"; $result_set = mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $maincategory = $rows['maincategory']; echo "<option value='$maincategory'>$maincategory</option>";} ?></select> <br><br>
					</div>
					<div class="form-group">
						<select name= "category" required> <?php $SQLSELECT = "SELECT * FROM videotips_viodetipscategory"; $result_set =  mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $category = $rows['category']; echo "<option value='$category'>$category</option>";} ?></select> <br><br>
					</div>
					<div class="form-group">
						<textarea name="description" rows="5" class="form-control" placeholder="Link Description"><?php echo $link['description']?></textarea><br>
					</div>
					<div class="form-group">
						<select name= "active" required><?php echo $SQLSELECT = "SELECT * FROM videotips_active order by active desc"; $result_set =  mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $active = $rows['active']; echo "<option value='$active'>$active</option>";} ?></select> <br><br>
					</div>
					<input type="submit" class="btn btn-success btn-block" name="update_link" value="Update Link"></input>
					<input type="submit" class="btn btn-success btn-block" name="logout" value="Delete" formaction="delete.php"></input>
					<input type="submit" class="btn btn-success btn-block" name="logout" value="Cancel" formaction="videolinkadminmodule.php"></input>
				</form>
			</div>
		</div>
		
		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
				   <tr>
	                  <th>ID</th>
					  <th>Video Link</th>
					  <th>Category</th>
					  <th>Sub Category</th>
					  <th>Description</th>
					  <th>Active</th>
				   </tr>
			    </thead>
				<tbody>
					<?php 
					$query1 = "select * from videotips_videotips where active = 'Yes'  and id ='$id'";
					$result_link1 = mysqli_query($conn,$query1);
					while($link = mysqli_fetch_array($result_link1)) { ?>
					  <tr>
					    <td><?php echo $link['id'] ?></td>
						<td><?php echo $link['videolink'] ?></td>
						<td><?php echo $link['maincategory'] ?></td>
						<td><?php echo $link['category'] ?></td>
						<td><?php echo $link['description'] ?></td>
						<td><?php echo $link['active'] ?></td>
						</td>
					  </tr>
					<?php }?>
				<tbody>
			</table>
		</div>
	</div>
</div>

<?php include ("footer.php")?>