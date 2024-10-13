<!--  Developed by julián González Bucheli
bootstrapCDN https://getbootstrap.com and then download then CDN via jsDeliver and copy links -->
<html>
<?php 
session_start();
include "header.php";
include "db_connection1.php";
$local_username=$_SESSION['username'];
?>



<label for="videolink" style="color: black;"><strong>Video URL full link</strong></label>
<textarea name="videolink" rows="1" class="form-control" placeholder="Video URL full link"></textarea>
<label for="maincategory" style="color: black;"><strong>Category</strong></label>
<select name= "maincategory" > <?php $SQLSELECT = "SELECT * FROM videotips_maincategory order by maincategory asc"; $result_set = mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $maincategory = $rows['maincategory']; echo "<option value='$maincategory'>$maincategory</option>";} ?></select>
<label for="category" style="color: black;"><strong>Subcategory</strong></label>	
<select name= "category" > <?php $SQLSELECT = "SELECT * FROM videotips_viodetipscategory order by category asc"; $result_set =  mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $category = $rows['category']; echo "<option value='$category'>$category</option>";} ?></select>
<label for="useful" style="color: black;"><strong>Useful</strong></label>
<label name= "active" readonly"" <?php $SQLSELECT = "SELECT * FROM videotips_active order by active desc"; $result_set =  mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $active = $rows['active']; echo "<option value='$active'>$active</option>";} ?></label>




<div class="container p-4">
	<div class="row">
		<div class="col-md-4"> 
			<div class="card card-body">
				<form class="" action="savelinks.php" method="POST"> 
				
					<div class="form-group">
						<label for="videolink" style="color: black;"><strong>Video URL full link</strong></label><br>	
						<textarea name="videolink" rows="5" class="form-control" placeholder="Video URL full link"></textarea> <br>
					</div>
					<div class="form-group">
						<label for="maincategory" style="color: black;"><strong>Category</strong></label><br>	
						<select name= "maincategory" required> <?php $SQLSELECT = "SELECT * FROM videotips_maincategory order by maincategory asc"; $result_set = mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $maincategory = $rows['maincategory']; echo "<option value='$maincategory'>$maincategory</option>";} ?></select> <br><br>
					</div>
					<div class="form-group">
						<label for="category" style="color: black;"><strong>Subcategory</strong></label><br>	
						<select name= "category" required> <?php $SQLSELECT = "SELECT * FROM videotips_viodetipscategory order by category asc"; $result_set =  mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $category = $rows['category']; echo "<option value='$category'>$category</option>";} ?></select> <br><br>
					</div>
	                 <div class="form-group">
					 	<label for="description" style="color: black;"><strong>Description</strong></label><br>	
						<textarea name="description" rows="5" class="form-control" placeholder="Video tip Description"></textarea> <br>
					</div>
					<div class="form-group">
					 	<label for="useful" style="color: black;"><strong>Useful</strong></label><br>	
						 <select name= "active" required> <?php $SQLSELECT = "SELECT * FROM videotips_active order by active desc"; $result_set =  mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $active = $rows['active']; echo "<option value='$active'>$active</option>";} ?></select> <br><br>
					</div>  	
					<br>
					<input type="submit" class="btn btn-success btn-block" name="save_link" value="Save Link"></input></center>
					<input type="submit" class="btn btn-success btn-block" name="logout" value="Logout" formaction="videotrackerauth.php"></input>
					<input type="submit" class="btn btn-success btn-block" name="logout" value="Refresh" formaction="videolinkadminmodule.php"></input>
					<input type="submit" class="btn btn-success btn-block" name="logout" value="Categories" formaction="addcategory.php"></input></center>
				</form>
			</div>
		</div>
		
		<div class="col-md-8">
		 <?php include("search.php") ?>
		 <div class="card card-body">
		  <table id="autosearch" class="display" font color="back">
				<thead>
				   <tr>
				      <th>ID</th>
					  <th>Video Link</th>
					  <th>Category</th>
					  <th>Sub Category</th>
					  <th>Description</th>
					  <th>Active</th>
					  <th>Creation Date</th>
				   </tr>
			    </thead>
				<tbody>
					<?php 
					$query1 = "select * from videotips_videotips where active = 'Yes' and username ='$local_username' order by maincategory, category asc";/*10112024*/
					$result_links = mysqli_query($conn,$query1);
					while($links = mysqli_fetch_array($result_links)) { ?>
					  <tr>
						<td align="center" onclick="Display"><?php echo"<a href='edit.php?id={$links['id']}'>{$links['id']}"?></td>
						<td align="center"><a href="<?php echo $links['videolink']; ?>" target="_blank"><?php echo $links['videolink']; ?></a></td>
						<td align="center"><?php echo $links['maincategory'] ?></td>
						<td align="center"><?php echo $links['category'] ?></td>
						<td align="center"><?php echo $links['description'] ?></td>
						<td align="center"><?php echo $links['active'] ?></td>
						<td align="center"><?php echo $links['creationdate'] ?></td>
						</td>
					  </tr>
					<?php }?>
				<tbody>
			</table>
		   </div>
	   </div>
    </div>
</div>
<?php include ("footer.php")?>
</html>
 