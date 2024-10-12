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
			<div class="form-group">
				<label for="videolink" style="color: black;"><strong>SubCategory to filter your Favorite links</strong></label><br>
					</div><br>
				<form class="" action="savesubcategory.php" method="POST"> 
					<div class="form-group">
						<label for="subcategory" style="color: black;"><strong>Sub Categories</strong></label><br>	
						<center><input id="category" type="text" name="category"  placeholder="Type Sub Category" required ></center><br> 
						<center><input type="submit" class="btn btn-success btn-block" name="add filter" value="Add Sub Category"></input></center><br><br>
						<input type="submit" class="btn btn-success btn-block" name="logout" value="Logout" formaction="videotrackerauth.php"></input>
					<input type="submit" class="btn btn-success btn-block" name="Refresh" value="Refresh" formaction="addsubcategory.php"></input>
					<input type="submit" class="btn btn-success btn-block" name="cancel" value="Cancel" formaction="videolinkadminmodule.php"></input>
					</div>
				</form>
			</div>
		</div>
		
		<div class="col-md-8">
		 <?php include("search.php") ?>
		 <div class="card card-body">
		 <label for="ategory" style="color: black;"><strong>Current Sub Categories</strong></label><br>	
		  <table id="autosearch" class="display" font color="back">
				<thead>
				   <tr>
				      <center><th>Sub Category</th></center>
				   </tr>
			    </thead>
				<tbody>
					<?php 
					$query1 = "select distinct(category) from videotips_viodetipscategory where username ='$local_username' order by category asc";
					$result_categories = mysqli_query($conn,$query1);
					while($categories = mysqli_fetch_array($result_categories)) { ?>
					  <tr>
					     <td align="center" onclick="Display"><?php echo"<a href='categiries.php?id={$categories['category']}'>{$categories['category']}"?></td>
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
 