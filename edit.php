<?php include "header.php";
include "db_connection1.php";
session_start();
//include "sessions.php";/*10082014*/
/*$_SESSION['counter']=$_SESSION['counter']+1; $usernamer=$_POST['usernamer1'];*/
//$videolink = $_GET['videolink'];
$id = $_GET['id'];
/*$usernamer=$_POST['usernamer1'];/*$usernamer=$_POST['usernamer1'];*/
$_SESSION['counter']=$_SESSION['counter']+1;/*10072024*/
$usernamer=$_SESSION['usernamer'];/*10072024*/
print_r($usernamer);/*10072024*/
print_r($_SESSION['counter']);/*10072024*/
?>



<div class="container p-4">

	<div class="row">
		<div class="col-md-4">
		     		 
			 <?php 
					//$query = "select * from videotips_videotips where videolink = '$videolink'";
					$query = "select * from videotips_videotips where id = '$id' and username='$usernamer'";
					$result_link = mysqli_query($conn,$query);
					$link = mysqli_fetch_array($result_link);
			 ?>
			 			 
		  
			<div class="card card-body">
				<form action="updatelinks.php" method="POST"> 
					<div class="form-group">
					<label for="id" style="color: black;"><strong>Id</strong></label><br>	
						<input type="text" name="id" class="form-control" placeholder="ID" autofocus value ="<?php echo $link['id'];?>"></input><br>
					</div>
					<div class="form-group">
						<label for="videolink" style="color: black;"><strong>Video URL full link</strong></label><br>	
						<input type="text" name="videolink" class="form-control" placeholder="link" autofocus value ="<?php echo $link['videolink'];?>"></input><br>
					</div>
					<div class="form-group">
						<label for="maincategory" style="color: black;"><strong>Main Category</strong></label><br>
						<select name="maincategory" required><?php $query_options = "SELECT * FROM videotips_maincategory"; $result_options = mysqli_query($conn, $query_options); while ($option = mysqli_fetch_assoc($result_options)) { $selected = ($option['maincategory'] == $link['maincategory']) ? "selected" : ""; echo "<option value=\"{$option['maincategory']}\" $selected>{$option['maincategory']}</option>"; } ?></select><br><br>
					</div>
					<div class="form-group">
						<label for="category" style="color: black;"><strong>Second Category</strong></label><br>
						<select name="category" required><?php $query_options = "SELECT * FROM videotips_viodetipscategory"; $result_options = mysqli_query($conn, $query_options); while ($option = mysqli_fetch_assoc($result_options)) { $selected = ($option['category'] == $link['category']) ? "selected" : ""; echo "<option value=\"{$option['category']}\" $selected>{$option['category']}</option>"; } ?></select><br><br>
						<!--<select name= "category" required> <?php //$SQLSELECT = "SELECT * FROM videotips_viodetipscategory"; $result_set =  mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $category = $rows['category']; echo "<option value='$category'>$category</option>";} ?></select> <br><br>-->
					</div>
					<div class="form-group">
						<label for="description" style="color: black;"><strong>Description</strong></label><br>	
						<textarea name="description" rows="5" class="form-control" placeholder="Link Description"><?php echo $link['description']?></textarea><br>
					</div>
					<div class="form-group">
						<label for="useful" style="color: black;"><strong>Useful</strong></label><br>
						<select name="active" required><?php $query_options = "SELECT * FROM videotips_active"; $result_options = mysqli_query($conn, $query_options); while ($option = mysqli_fetch_assoc($result_options)) { $selected = ($option['active'] == $link['active']) ? "selected" : ""; echo "<option value=\"{$option['active']}\" $selected>{$option['active']}</option>"; } ?></select><br><br>
						<!--<select name= "active" required><?php //echo $SQLSELECT = "SELECT * FROM videotips_active order by active desc"; $result_set =  mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $active = $rows['active']; echo "<option value='$active'>$active</option>";} ?></select> <br><br>-->
					</div>
					<div class="form-group">
						<label for="username" style="color: black;"><strong>Username</strong></label><br>
						<select name="username" readonly><?php $query_options = "SELECT * FROM videotips_videotips"; $result_options = mysqli_query($conn, $query_options); while ($option = mysqli_fetch_assoc($result_options)) { $selected = ($option['username'] == $link['username']) ? "selected" : ""; echo "<option value=\"{$option['username']}\" $selected>{$option['username']}</option>"; } ?></select><br><br>
						<!--<select name= "active" required><?php //echo $SQLSELECT = "SELECT * FROM videotips_active order by active desc"; $result_set =  mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $active = $rows['active']; echo "<option value='$active'>$active</option>";} ?></select> <br><br>-->
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
					  <th>useful</th>
					  <th>Creation Date</th>
				   </tr>
			    </thead>
				<tbody>
					<?php 
					$query1 = "select * from videotips_videotips where active = 'Yes'  and id ='$id' and username = '$usernamer'";
					$result_link1 = mysqli_query($conn,$query1);
					while($link = mysqli_fetch_array($result_link1)) { ?>
					  <tr>
					    <td><?php echo $link['id'] ?></td>
						<td><?php echo $link['videolink'] ?></td>
						<td><?php echo $link['maincategory'] ?></td>
						<td><?php echo $link['category'] ?></td>
						<td><?php echo $link['description'] ?></td>
						<td><?php echo $link['active'] ?></td>
						<td><?php echo $link['creationdate'] ?></td>
						</td>
					  </tr>
					<?php }?>
				<tbody>
			</table>
		</div>
	</div>
</div>

<?php include ("footer.php")?>