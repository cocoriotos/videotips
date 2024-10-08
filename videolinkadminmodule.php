<!--  Developed by julián González Bucheli
bootstrapCDN https://getbootstrap.com and then download then CDN via jsDeliver and copy links -->
<?php include "header.php";
include "db_connection1.php";
session_start();
/**include "sessions.php";*/
$_SESSION['counter']=$_SESSION['counter']+1;
$usernamer=$_SESSION['usernamer'];
print_r($usernamer);/*10072024*/
print_r($_SESSION['counter']);/*10072024*/
?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4">
		     <?php if (isset($_SESSION['message'])) { ?>
              <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php session_unset(); } ?>	  
			<div class="card card-body">
				<form class="" action="savelinks.php" method="POST"> 
				
					<div class="form-group">
						<label for="videolink" style="color: black;"><strong>Video URL full link</strong></label><br>	
						<textarea name="videolink" rows="5" class="form-control" placeholder="Video URL full link"></textarea> <br>
					</div>
					<div class="form-group">
						<label for="maincategory" style="color: black;"><strong>Main Category</strong></label><br>	
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
					$query1 = "select * from videotips_videotips where active = 'Yes' and username ='$usernamer' order by maincategory, category asc";
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
						<!--<td align="center"><a href="edit.php?videolink=<?php //echo $links['videolink']?>></a>
						    <a href="delete.php?videolink=<?php //echo $links['videolink']?>></a>
						<td align="center"><a href="edit.php?videolink=<?php //echo $links['videolink']?>"class="btn btn-secondary"><i class="fas fa-marker"></i></a>
						    <a href="delete.php?videolink=<?php //echo $links['videolink']?>"class="btn btn-danger"><i class="far fa-trash-alt"></i></a>-->
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

 