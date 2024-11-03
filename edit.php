<?php include "headeredit.php";
include "db_connection1.php";
session_start();
$id = $_GET['id'];
$local_username=$_SESSION['email'];
include "nobackpage.php"; 
include "SessionTimeOut.php";
?>

<head>	
	<script src="head.js" defer></script>
</head>

<body id="bodyadminmodule">

<div class="container p-4">

	<div class="row">
    
			<div class="col-md-4">
		     		 
			 <?php 
					$query = "select * from videotips_videotips where id = '$id' and username='$local_username'";
					$result_link = mysqli_query($conn,$query);
					$link = mysqli_fetch_array($result_link);
			 ?>
			          
		  	<div class="card card-body">
				<form action="updatelinks.php" method="POST"> 
					<div class="form-group">
					<label for="id" style="color: black;"><strong>Id</strong></label><br>	
						<input type="text" name="id" class="form-control" placeholder="ID" autofocus value ="<?php echo $link['id'];?>" readonly></input><br>
					</div>
					<div class="form-group">
						<label for="videolink" style="color: black;"><strong>Enlace o URL</strong></label><br>	
						<input type="text" name="videolink" class="form-control" placeholder="Enlace" autofocus value ="<?php echo $link['videolink'];?>"readonly></input><br>
					</div>
					<div class="form-group">
						<label for="maincategory" style="color: black;"><strong>Categoría</strong></label><br>
						<select name="maincategory" required><?php $query_options = "SELECT distinct(maincategory) FROM videotips_maincategory where username = '$local_username' order by maincategory asc"; $result_options = mysqli_query($conn, $query_options); while ($option = mysqli_fetch_assoc($result_options)) { $selected = ($option['maincategory'] == $link['maincategory']) ? "selected" : ""; echo "<option value=\"{$option['maincategory']}\" $selected>{$option['maincategory']}</option>"; } ?></select><br><br>
					</div>
					<div class="form-group">
						<label for="category" style="color: black;"><strong>Subcategoría</strong></label><br>
						<select name="category" required><?php $query_options = "SELECT distinct(category) FROM videotips_viodetipscategory where username = '$local_username' order by category asc"; $result_options = mysqli_query($conn, $query_options); while ($option = mysqli_fetch_assoc($result_options)) { $selected = ($option['category'] == $link['category']) ? "selected" : ""; echo "<option value=\"{$option['category']}\" $selected>{$option['category']}</option>"; } ?></select><br><br>
					</div>
					<div class="form-group">
						<label for="description" style="color: black;"><strong>Descripción</strong></label><br>	
						<textarea name="description" rows="5" class="form-control" placeholder="Descripción del Contenido"><?php echo $link['description']?></textarea><br>
					</div>
					<center><input type="submit" class="btn btn-success btn-block" name="update_link" value="Actualizar"></input></center><br>
					<!--<hr>
					<center><label for="useful" style="color: black;"><strong>Menu de Opciones</strong></label></center><br>	
					<hr>-->
					<center><input type="submit" class="btn btn-success btn-block" name="logout" value="Borrar" formaction="delete.php"></input></center><br>
					<!--<center><input type="submit" class="btn btn-success btn-block" name="logout" value="Cancelar" formaction="videolinkadminmodule.php"></input></center>-->
				</form>
			</div>
		</div>
		
		<div class="col-md-8">
			<table class="table table-bordered"id="tableswhite" >
				<thead>
				   <tr>
	                  <th>ID</th>
					  <th>Enlace o URL</th>
					  <th>Categoría</th>
					  <th>Subcategoría</th>
					  <th>Descripción</th>
					  <th>Útil</th>
					  <th>Fecha de Creación</th>
				   </tr>
			    </thead>
				<tbody>
					<?php 
					$query1 = "select * from videotips_videotips where active = 'Yes'  and id ='$id' and username = '$local_username'";
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
</body>
<?php include ("footer.php")?>