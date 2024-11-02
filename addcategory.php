<!--  Developed by julián González Bucheli -->
<html>
<?php 
session_start();
include "headercategory.php";
include "db_connection1.php";
$local_username=$_SESSION['email'];
include "nobackpage.php"; 
include "SessionTimeOut.php";
?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4"> 
			<div class="card card-body">
			<div class="form-group">
			    <!--<label for="videolink" style="color: black;"><strong>Categories to filter your Favorite links</strong></label><br>-->
				<label for="videolink" style="color: black;"><strong>Adicionar Categorías y Subcategorías</strong></label><br>
					</div><br>
				<form class="" action="savecategory.php" method="POST">
				<br><br><br><br><br><br><br><br><br><br><br>
					<div class="form-group">
						<!--<label for="maincategory" style="color: black;"><strong>Category</strong></label><br>	
						<center><input id="maincategory" type="text" name="maincategory"  placeholder="Type Main Category" required ></center><br>-->
						<label for="maincategory" style="color: black;"><strong>Categoría</strong></label><br>	
						<center><input id="maincategory" type="text" name="maincategory"  placeholder="Digite la Categoría Principal" required ></center><br>
					</div><br>
					<div class="form-group">
						<!--<label for="subcategory" style="color: black;"><strong>Subcategory</strong></label><br>	
						<center><input id="category" type="text" name="category"  placeholder="Type Sub Category" required ></center><br>-->
						<label for="subcategory" style="color: black;"><strong>Subcategoría</strong></label><br>	
						<center><input id="category" type="text" name="category"  placeholder="Digite la SubCategoría" required ></center><br> 
						<!--<center><input type="submit" class="btn btn-success btn-block" name="add filter" value="Add Categories"></input></center>-->
						<center><input type="submit" class="btn btn-success btn-block" name="add filter" value="Adicionar Categoría"></input></center>
					</div>	
				</form>
				<!--<hr>
				<center><label for="useful" style="color: black;"><strong>Menu de Opciones</strong></label></center><br>	
				<hr>
				<form>
						<center><input type="submit" class="btn btn-success btn-block" name="Refresh" value="Refresh" formaction="addcategory.php"></input></center><br>
						<center><input type="submit" class="btn btn-success btn-block" name="cancel" value="Cancel" formaction="videolinkadminmodule.php"></input></center><br>
						<center><input type="submit" class="btn btn-success btn-block" name="logout" value="Logout" formaction="videotrackerauth.php"></input></center><br>
						<center><input type="submit" class="btn btn-success btn-block" name="Refresh" value="limpiar" formaction="addcategory.php"></input></center><br>
						<center><input type="submit" class="btn btn-success btn-block" name="cancel" value="Cancelar" formaction="videolinkadminmodule.php"></input></center><br>
						<center><input type="submit" class="btn btn-success btn-block" name="logout" value="Salir" formaction="videotrackerauth.php"></input></center><br>-->
				</form>
			</div>
		</div>
		
		<div class="col-md-8">
		 <?php include("search.php") ?>
		 <div class="card card-body">
		 <!--<label for="maincategory" style="color: black;"><strong>Current Categories</strong></label><br>-->
		 <label for="maincategory" style="color: black;"><strong>Categorías</strong></label><br>	
		  <table id="autosearch" class="display" font color="back">
				<thead>
				   <tr>
				      <!--<center><th>ID</th></center>
					  <center><th>Category</th></center> 
					  <center><th>Sub Category</th></center>-->
					  <center><th>ID</th></center>
					  <center><th>Categoría</th></center> 
					  <center><th>SubCategoría</th></center>
				   </tr>
			    </thead>
				<tbody>
					<?php 
					$query1 = "select * from videotips_viodetipscategory where username ='$local_username' order by id, maincategory, category asc";
					$result_categories = mysqli_query($conn,$query1);
					while($categories = mysqli_fetch_array($result_categories)) { ?>
					  <tr>
					     <td align="center" onclick="Display"><?php echo"<a href='editcategory.php?id={$categories['id']}'>{$categories['id']}"?></td>
						 <td align="center" onclick="Display"><?php echo $categories['maincategory']?></td>
						 <td align="center" onclick="Display"><?php echo $categories['category']?></td>
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
 