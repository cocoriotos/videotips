<?php include "headeredit.php";
include "db_connection1.php";
session_start();
$id = $_GET['id'];
$local_username=$_SESSION['email'];
include "nobackpage.php"; 
/*include "SessionTimeOut.php";*/
?>

<head>	
	<script src="head.js" defer></script>
	<link rel="stylesheet" href="style_sheet.css"/>
</head>

<body id="bodyadminmodule">
<div class="container-fluid p-0">
	<div class="row justify-content-start">
			<div class="col-md-12">
			<div class="card card-body">
			 <?php 
					$query = "select * from videotips_videotips where id = '$id' and username='$local_username'";
					$result_link = mysqli_query($conn,$query);
					$link = mysqli_fetch_array($result_link);
			 ?>
		  	<form  text-align="center"  action="updatelinks.php" method="POST"> 
				<center><label for="title" class="col-form-label" style="color: black; font-size: 28px;"><strong> Editar Enlace </strong></label></center>
					<center><div class="row">
									<div class="form-group col-md-3.5">
										<label for="id" class="col-form-label" style="color: black;"><strong>Id</strong></label><br>	
										<input style="text-align: center;" type="text" name="id" class="form-control" placeholder="ID" autofocus value ="<?php echo $link['id'];?>" readonly></input><br>
									</div>
									<div class="form-group col-md-3.5">
										<label for="videolink" class="col-form-label" style="color: black;"><strong>Enlace o URL</strong></label><br>	
										<input type="text" name="videolink" class="form-control" placeholder="Enlace" autofocus value ="<?php echo $link['videolink'];?>"readonly></input><br>
									</div>
									<div class="form-group col-md-3.5">
										<label for="maincategory" class="col-form-label" style="color: black;"><strong>Categoría</strong></label><br>
										<select class="form-control" name="maincategory" required><?php $query_options = "SELECT distinct(maincategory) FROM videotips_maincategory where username = '$local_username' order by maincategory asc"; $result_options = mysqli_query($conn, $query_options); while ($option = mysqli_fetch_assoc($result_options)) { $selected = ($option['maincategory'] == $link['maincategory']) ? "selected" : ""; echo "<option value=\"{$option['maincategory']}\" $selected>{$option['maincategory']}</option>"; } ?></select><br><br>
									</div>
									<div class="form-group col-md-3.5">
										<label for="category" class="col-form-label" style="color: black;"><strong>Subcategoría</strong></label><br>
										<select class="form-control" name="category" required><?php $query_options = "SELECT distinct(category) FROM videotips_viodetipscategory where username = '$local_username' order by category asc"; $result_options = mysqli_query($conn, $query_options); while ($option = mysqli_fetch_assoc($result_options)) { $selected = ($option['category'] == $link['category']) ? "selected" : ""; echo "<option value=\"{$option['category']}\" $selected>{$option['category']}</option>"; } ?></select><br><br>
									</div>
									<div class="form-group col-md-3.5">
										<label for="description" class="col-form-label" style="color: black;"><strong>Descripción</strong></label><br>	
										<textarea name="description" rows="2" class="form-control" placeholder="Descripción del Contenido"><?php echo $link['description']?></textarea><br>
									</div>						
					</div></center>
							<center><input type="submit" class="btn btn-success btn-block" name="update_link" value="Actualizar"></input>
							<input type="submit" class="btn btn-success btn-block" name="logout" value="Borrar" formaction="delete.php"></input></center><br>
				</form>
			</div>
		</div>
		<br>
		<div class="col-md-12">
			<br>
			<div class="card card-body">
				<table class="table table-bordered"id="tableswhite">
				<center><label for="description" class="col-form-label" style="color: black; font-size: 28px;"><strong> Información de Enlace a Modificar </strong></label></center>
					<thead>
					<tr>
						<th>ID</th>
						<th>Enlace o URL</th>
						<th>Categoría</th>
						<th>Subcategoría</th>
						<th>Descripción</th>
						<th>Fecha de Creación</th>
					</tr>
					</thead>
					<tbody>
						<?php 
						$query1 = "select * from videotips_videotips where active = 'Yes'  and id ='$id' and username = '$local_username'";
						$result_link1 = mysqli_query($conn,$query1);
						while($link = mysqli_fetch_array($result_link1)) { ?>
						<tr>
							<td align="center"><?php echo $link['id'] ?></td>
							<td align="left"><?php echo $link['videolink'] ?></td>
							<td align="center"><?php echo $link['maincategory'] ?></td>
							<td align="center"><?php echo $link['category'] ?></td>
							<td align="left"><?php echo $link['description'] ?></td>
							<td align="center"><?php echo $link['creationdate'] ?></td>
							</td>
						</tr>
						<?php }?>
						</tbody>
				</table>
			</div>	
		</div>
	</div>
</div>
</body>
<?php include ("footer.php")?>