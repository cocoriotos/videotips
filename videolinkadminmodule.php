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
	<script src="head.js" defer></script>	
	<script src="toclipboard.js" defer></script>
	<link rel="stylesheet" href="style_sheet.css"/>
</head>
<body id="bodyadminmodule">
		<div  class="container-fluid p-0" >
			<div class="row justify-content-start">
				<div class="col-md-12"> 
					<div class="card card-body">
							<form action="savelinks.php" method="POST">
							<center><label for="title" class="col-form-label" style="color: black; font-size: 28px;"><strong> Adicionar Enlace </strong></label></center>
								<div class="row">
									<!-- Enlace Útil -->
									<div class="form-group col-md-3">
										<label for="videolink" class="col-form-label" style="color: black;"><strong>Enlace Útil</strong></label>
										<textarea name="videolink" rows="2" class="form-control" placeholder="Enlace Útil"></textarea>
									</div>

									<!-- Categoría -->
									<div class="form-group col-md-3">
										<label for="maincategory" class="col-form-label" style="color: black;"><strong>Categoría</strong></label>
										<select class="form-control" name="maincategory">
											<?php 
												$SQLSELECT = "SELECT distinct(maincategory) FROM videotips_viodetipscategory WHERE username = '$local_username' ORDER BY maincategory ASC"; 
												$result_set = mysqli_query($conn, $SQLSELECT); 
												while ($rows = $result_set->fetch_assoc()) { 
													$maincategory = $rows['maincategory']; 
													echo "<option value='$maincategory'>$maincategory</option>";
												}
											?>
										</select>
									</div>

									<!-- Subcategoría -->
									<div class="form-group col-md-3">
										<label for="category" class="col-form-label" style="color: black;"><strong>Subcategoría</strong></label>
										<select class="form-control" name="category">
											<?php 
												$SQLSELECT = "SELECT distinct(category) FROM videotips_viodetipscategory WHERE username = '$local_username' ORDER BY category ASC"; 
												$result_set = mysqli_query($conn, $SQLSELECT); 
												while ($rows = $result_set->fetch_assoc()) { 
													$category = $rows['category']; 
													echo "<option value='$category'>$category</option>";
												}
											?>
										</select>
									</div>

									<!-- Descripción -->
									<div class="form-group col-md-3">
										<label for="description" class="col-form-label" style="color: black;"><strong>Descripción</strong></label>
										<textarea name="description" rows="2" class="form-control" placeholder="Descripción del Contenido del Enlace"></textarea>
									</div>
								</div>

								<br>
								<center><input type="submit" class="btn btn-success btn-block" name="save_link" value="Guardar"></input></center>
							</form>
					</div>
				</div>
				<div class="col-md-12">
					<br>
				<?php include("search.php") ?>
				<div class="card card-body">
				<center><label for="description" class="col-form-label" style="color: black; font-size: 28px;"><strong> Tus Enlaces Útiles </strong></label></center>
				<table id="autosearch" class="display" font color="back">
						<thead id="tableswhite">
						<tr>
							<th>ID</th>
							<th>Enlace</th>
							<th>Categoría</th>
							<th>Subcategoría</th>
							<th>Descripción</th>
							<th>Creación</th>
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
								<td align="left"><a href="<?php echo $links['videolink']; ?>" target="_blank"><?php echo $links['videolink']; ?></td>
								<td align="center"><?php echo $links['maincategory'] ?></td>
								<td align="center"><?php echo $links['category'] ?></td>
								<td align="left"><?php echo $links['description'] ?></td>
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
 