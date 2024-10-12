<!--  Developed by julián González Bucheli -->
<html>
<?php 
session_start();
include "header.php";
include "db_connection1.php";
$local_username=$_SESSION['username'];
?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4"> 
			<div class="card card-body">
				<form class="" action="savenewfilters.php" method="POST"> 
				
					<div class="form-group">
						<label for="videolink" style="color: black;"><strong>Add new Category to filter your Favorite links</strong></label><br>
					</div>
					<div class="form-group">
						<label for="maincategory" style="color: black;"><strong>Current Main Categories</strong></label><br>	
						<select name= "maincategory" required> <?php $SQLSELECT = "SELECT * FROM videotips_maincategory order by maincategory asc"; $result_set = mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $maincategory = $rows['maincategory']; echo "<option value='$maincategory'>$maincategory</option>";} ?></select> <br><br>

					</div>
					<div class="form-group">
						<label for="secondcategory" style="color: black;"><strong>Second Category</strong></label><br>	
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
					<input type="submit" class="btn btn-success btn-block" name="save_link" value="Save Link"></input>
					<input type="submit" class="btn btn-success btn-block" name="logout" value="Logout" formaction="videotrackerauth.php"></input>
					<input type="submit" class="btn btn-success btn-block" name="logout" value="Refresh" formaction="videolinkadminmodule.php"></input>
					<input type="submit" class="btn btn-success btn-block" name="logout" value="filters" formaction="addfilters.php"></input>
				</form>
			</div>
		</div>
		
		<div class="col-md-8">
		 <?php include("search.php") ?>
		 <div class="card card-body">
		 <label for="maincategory" style="color: black;"><strong>Current Main Categories</strong></label><br>	
		  <table id="autosearch" class="display" font color="back">
				<thead>
				   <tr>
				      <th>Category</th>
					  <th>Sub Category</th>
				   </tr>
			    </thead>
				<tbody>
					<?php 
					$query1 = "select * from videotips_viodetipscategory where username ='$local_username' order by maincategory, category asc";
					$result_categories = mysqli_query($conn,$query1);
					while($categories = mysqli_fetch_array($result_categories)) { ?>
					  <tr>
						<td align="center" onclick="Display"><?php echo"<a href='subcategiries.php?id={$categories['category']}'>{$categories['category']}"?></td>
						<td align="center" onclick="Display"><?php echo"<a href='categiries.php?id={$categories['maincategory']}'>{$categories['maincategory']}"?></td>
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
 