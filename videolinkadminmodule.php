<!--  Developed by julián González Bucheli
bootstrapCDN https://getbootstrap.com and then download then CDN via jsDeliver and copy links -->
<html>
<?php 
session_start();
include "header.php";
include "db_connection1.php";
$local_username=$_SESSION['email'];
include "nobackpage.php";
include "SessionTimeOut.php";
?>
<head>	
	<script>
        // Cargar el contenido de header.html en el <head> al cargar la página
        fetch("head.html")
            .then(response => response.text())
            .then(data => {
                document.head.innerHTML += data;
            });
    </script>	
	<script src="toclipboard.js" defer></script>

</head>
<body id="bodyadminmodule">
		<div id="adminmodulecontainer" class="container p-4" >
			<div class="row">
				<div class="col-md-4"> 
					<div class="card card-body">
						<form class="" action="savelinks.php" method="POST"> 
						
							<div class="form-group">
								<label for="videolink" style="color: black;"><strong>Enlace Útil</strong></label><br>	
								<textarea name="videolink" rows="5" class="form-control" placeholder="Enlace Útil"></textarea> <br>
							</div>
							<div class="form-group">
								<label for="maincategory" style="color: black;"><strong>Categoría</strong></label><br>	
								<select name= "maincategory"> <?php $SQLSELECT = "SELECT distinct(maincategory) FROM videotips_viodetipscategory where username = '$local_username' order by maincategory asc "; $result_set = mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $maincategory = $rows['maincategory']; echo "<option value='$maincategory'>$maincategory</option>";} ?></select> <br><br>
							</div>
							<div class="form-group">
								<label for="category" style="color: black;"><strong>Subcategoría</strong></label><br>	
								<select name= "category"> <?php $SQLSELECT = "SELECT distinct(category) FROM videotips_viodetipscategory where username = '$local_username' order by category asc"; $result_set =  mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $category = $rows['category']; echo "<option value='$category'>$category</option>";} ?></select> <br><br>
							</div>
							<div class="form-group">
								<label for="description" style="color: black;"><strong>Descripción</strong></label><br>	
								<textarea name="description" rows="5" class="form-control" placeholder="Descripción del Contenido del Enlace"></textarea> <br>
							</div>
							<div class="form-group">
								<label for="useful" style="color: black;"><strong>Útil</strong></label><br>	
								<select name= "active"> <?php $SQLSELECT = "SELECT * FROM videotips_active order by active desc"; $result_set =  mysqli_query($conn, $SQLSELECT); while ($rows = $result_set ->fetch_assoc()) { $active = $rows['active']; echo "<option value='$active'>$active</option>";} ?></select> <br><br>
							</div>  	
							<center><input type="submit" class="btn btn-success btn-block" name="save_link" value="Guardar"></input></center><br><br>
							<!--<hr>
							<center><label for="useful" style="color: black;"><strong>Menu de Opciones</strong></label></center><br>	
							<hr>-->
							<!--<center><input type="submit" class="btn btn-success btn-block" name="logout" value="Limpiar" formaction="videolinkadminmodule.php"></input></center><br>
							<center><input type="submit" class="btn btn-success btn-block" name="logout" value="Categorías" formaction="addcategory.php"></input></center><br>
							<center><input type="submit" class="btn btn-success btn-block" name="logout" value="Salir" formaction="videotrackerauth.php"></input></center><br>-->
						</form>
					</div>
				</div>
				
				<div class="col-md-8">
				<?php include("search.php") ?>
				<div class="card card-body">
				<table id="autosearch" class="display" font color="back">
						<thead id="tableswhite">
						<tr>
							<th>ID</th>
							<th>Enlace</th>
							<th>Categoría</th>
							<th>Sub Categoría</th>
							<th>Descripción</th>
							<th>Útil</th>
							<th>Fecha de Creación</th>
							<th>Copiar Enlace</th>
						</tr>
						</thead>
						<tbody>
							<?php 
							$query1 = "select * from videotips_videotips where active = 'Yes' and username ='$local_username' order by maincategory, category asc";/*10112024*/
							$result_links = mysqli_query($conn,$query1);
							while($links = mysqli_fetch_array($result_links)) { ?>
							<tr>
								<td align="center" onclick="Display"><?php echo"<a href='edit.php?id={$links['id']}'>{$links['id']}"?></td>
								<td align="center"><a href="<?php echo $links['videolink']; ?>" target="_blank"><?php echo $links['videolink']; ?></td>
								<td align="center"><?php echo $links['maincategory'] ?></td>
								<td align="center"><?php echo $links['category'] ?></td>
								<td align="center"><?php echo $links['description'] ?></td>
								<td align="center"><?php echo $links['active'] ?></td>
								<td align="center"><?php echo $links['creationdate'] ?></td>
								<td align="center"></a><button class="fas fa-copy" onclick="copyToClipboard('<?php echo $links['videolink']; ?>')"></button></td>
								</td>
							</tr>
							<?php }?>
						<tbody>
					</table>
				</div>
			</div>
			</div>
		</div>
</body>



<?php include ("footer.php")?>
</html>
 