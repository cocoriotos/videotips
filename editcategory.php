<?php include "headereditcategory.php";
include "db_connection1.php";
session_start();
$id = $_GET['id'];
$local_username=$_SESSION['email'];
$updatedcategory = $_SESSION['updatedcategory'];
$deletedcategory = $_SESSION['deletedcategory'];
$sessiontimeoutreached = $_SESSION['sessiontimeoutreached'];
/*include "nobackpage.php";*/
include "SessionTimeOut.php";
?>

<head>	
	<script src="head.js" defer></script>	  
</head>
<body id="bodyadminmodule">
<div class="container-fluid p-0" >
	<div class="row justify-content-start">
		<div class="col-md-12">
			 <?php 
					$query = "select * from videotips_viodetipscategory where id = '$id' and username='$local_username'";
					$result_link = mysqli_query($conn,$query);
					$link = mysqli_fetch_array($result_link);
			 ?>
			<div class="card card-body">
				<form text-align="center" action="updatecategory.php" method="POST"> 
					<center><label for="title" class="col-form-label" style="color: black; font-size: 28px;"><strong> Editar Categoría </strong></label></center>
						<center><div class="row">	
							<div class="form-group col-md-4">
								<label for="id" class="col-form-label" style="color: black;"><strong>Id</strong></label><br>	
								<input class="form-control" style="text-align: center;" type="text" name="id" class="form-control" placeholder="ID" autofocus value ="<?php echo $link['id'];?>"readonly></input><br>
							</div>
							<div class="form-group col-md-4">
								<label for="id" class="col-form-label" style="color: black;"><strong>Categoría</strong></label><br>	
								<input class="form-control" style="text-align: center;" type="text" name="maincategory" class="form-control" placeholder="Categoría" autofocus value ="<?php echo $link['maincategory'];?>"></input><br>
							</div>
							<div class="form-group col-md-4">
								<label for="videolink" class="col-form-label" style="color: black;"><strong>Subcategoría</strong></label><br>	
								<input class="form-control" style="text-align: center;" type="text" name="category" class="form-control" placeholder="Subcategoría" autofocus value ="<?php echo $link['category'];?>"></input><br>
							</div>
							</div></center>					
								<center><input type="submit" class="btn btn-success btn-block" name="update_category" value="Actualizar"></input>
								<input type="submit" class="btn btn-success btn-block" name="logout" value="Borrar" formaction="deletecategory.php"></input></center><br>
                 </form>
		    </div>
        </div>	
		
		<div class="col-md-12">
			<br>
			<div class="card card-body">
					<table class="table table-bordered" id="tableswhite">
					<center><label for="description" class="col-form-label" style="color: black; font-size: 28px;"><strong> Información de Categoría a Modificar </strong></label></center>	
						<thead>
							<tr>
								<th>ID</th>
								<th>Categoría</th>
								<th>Subcategoría</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$query1 = "select * from videotips_viodetipscategory where id = '$id' and username = '$local_username'";
							$result_link1 = mysqli_query($conn,$query1);
							while($link = mysqli_fetch_array($result_link1)) { ?>
							<tr>
								<td><?php echo $link['id'] ?></td>
								<td><?php echo $link['maincategory'] ?></td>
								<td><?php echo $link['category'] ?></td>
								</td>
							</tr>
							<?php }?>
							</tbody>
					</table>
			</div>	
		</div>
	</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>

<?php


if ($sessiontimeoutreached  == 1){
	echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("Detectada que la sesion no tiene actividad por más de 15 minutos, debe iniciar sesión nuevamente", "warning", 7);
        });
	</script>';   
}
?>
 










<?php include ("footer.php")?>