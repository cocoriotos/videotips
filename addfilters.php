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
					</div><br>
					<div class="form-group">
						<label for="maincategory" style="color: black;"><strong>Current Main Categories</strong></label><br>	
						<center><input id="maincategory" type="text" name="maincategory"  placeholder="Type Main Category" required ></center><br> 
					</div><br>
					<div class="form-group">
						<label for="secondcategory" style="color: black;"><strong>Second Category</strong></label><br>	
						<center><input id="secondcategory" type="text" name="secondcategory"  placeholder="Type Sub Category" required ></center><br>
					</div>  	
					<input type="submit" class="btn btn-success btn-block" name="add filter" value="add filter"></input>
					<input type="submit" class="btn btn-success btn-block" name="logout" value="Logout" formaction="videotrackerauth.php"></input>
					<input type="submit" class="btn btn-success btn-block" name="Refresh" value="Refresh" formaction="addfilters.php"></input>
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
				      <center><th>Category</th></center>
					  <center><th>Sub Category</th></center>
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
 