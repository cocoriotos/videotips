<!--  Developed by julián González Bucheli
bootstrapCDN https://getbootstrap.com and then download then CDN via jsDeliver and copy links -->
<html>
<?php 
	session_start();
	include "header.php";
	include "db_connection1.php";
	$local_username = $_SESSION['email'];
	$savedlink = $_SESSION['savedlink'];
	$duplicatedlink = $_SESSION['duplicatedlink'];
	$updatedlink = $_SESSION['updatedlink'];
	$deletedlink = $_SESSION['deletedlink'];
	$sessiontimeoutreached = $_SESSION['sessiontimeoutreached'];
	$copytoclipboard = $_SESSION['copytoclipboard'];
	
	
	include "SessionTimeOut.php";
?>

<head>	
	<script src="head.js" defer></script>	
	<script src="Linktoclipboard.js" defer></script>
	<link rel="stylesheet" href="style_sheet.css"/>
	<script src="Popper/popper.min.js"></script>
	<script src="plugins/sweetalert/sweetalert.min.js"></script>
	<script src="plugins/alertifyjs/alertify.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
	<!--Agregar los estilos de Alertify correctamente--> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
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
										<label for="videolink" class="col-form-label" style="color: black; text-align: center;"><strong>Enlace Útil</strong></label>
										<textarea name="videolink" rows="1" class="form-control" placeholder="Enlace Útil"></textarea>
									</div>

									<!-- Categoría -->
									<div class="form-group col-md-2">
										<label for="maincategory" class="col-form-label" style="color: black;"><strong>Categoría</strong></label>
										<select class="form-control" name="maincategory" ><?php 
											$SQLSELECT = "SELECT distinct(maincategory) FROM videotips_viodetipscategory WHERE username = '$local_username' ORDER BY maincategory ASC"; 
											$result_set = mysqli_query($conn, $SQLSELECT); 
											while ($rows = $result_set->fetch_assoc()) { 
												$maincategory = $rows['maincategory']; 
												echo "<option value='$maincategory'>$maincategory</option>";
											}
										?></select>
									</div>

									<!-- Subcategoría -->
									<div class="form-group col-md-2">
										<label for="category" class="col-form-label" style="color: black;"><strong>Subcategoría</strong></label>
										<select class="form-control" name="category"><?php 
											$SQLSELECT = "SELECT distinct(category) FROM videotips_viodetipscategory WHERE username = '$local_username' ORDER BY category ASC"; 
											$result_set = mysqli_query($conn, $SQLSELECT); 
											while ($rows = $result_set->fetch_assoc()) { 
												$category = $rows['category']; 
												echo "<option value='$category'>$category</option>";
											}
										?></select>
									</div>

									<!-- Descripción -->
									<div class="form-group col-md-4">
										<label for="description" class="col-form-label" style="color: black;"><strong>Descripción</strong></label>
										<textarea name="description" rows="1" class="form-control" placeholder="Descripción del Contenido del Enlace" required></textarea>
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
				<table id="autosearch" class="display">
						<thead id="tableswhite">
						<tr>
							<th>ID</th>
							<th>Enlace</th>
							<th>Previsualización</th>
							<th>Categoría</th>
							<th>Subcategoría</th>
							<th>Descripción</th>
							<th>Creación</th>
							<th>Copiar Enlace</th>
						</tr>
						</thead>
						<tbody>
							<?php 
							$query1 = "select * from videotips_videotips where active = 'Yes' and username ='$local_username' order by maincategory, category asc";
							$result_links = mysqli_query($conn,$query1);
							while($links = mysqli_fetch_array($result_links)) { ?>
							<tr>
								<td align="center"><?php echo"<a href='edit.php?id={$links['id']}'>{$links['id']}"?></td>
								<!--<td align="left"><a href="<?php /*echo $links['videolink'];*/ ?>" target="_blank"><?php /*echo $links['videolink'];*/ ?></a></td>-->
								<td><iframe width="360" height="115" src="<?php echo $links['videolink']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
								<td align="center"><?php echo $links['maincategory'] ?></td>
								<td align="center"><?php echo $links['category'] ?></td>
								<td align="left"><?php echo $links['description'] ?></td>
								<td align="center"><?php echo $links['creationdate'] ?></td>
								<td align="center"><button class="fas fa-copy" onclick="copyToClipboard('<?php echo $links['videolink']; ?>')"></button></td>
								<!--<td align="center"><button class="fas fa-copy" onclick="window.location.href='copyToClipboard.php?videolink=<?php /*echo urlencode($links['videolink']);*/ ?>';"></button></td>-->
							</tr>
							<?php }?>
						<tbody>
					</table>
				</div>
			</div>
			</div>
		</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>

<?php


if ($copytoclipboard == 1) {
    echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("¡Enlace copiado al portapapeles!", "success", 7);
        });
    </script>';
    $copytoclipboard = 0;
}

if ($savedlink == 1) {
    echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("Enlace Adicionado Exitosamente", "success", 7);
        });
    </script>';
    $_SESSION['savedlink'] = 0;
}

if ($savedlink == 2){
	echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("Hubo un problema al adicionar el enlace, intente nuevamente", "error", 7);
        });
	</script>';   
$_SESSION['savedlink'] = 0;
}


if ($duplicatedlink == 1){
	echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("Enlace duplicado, usar otro", "error", 7);
        });
	</script>';   
$_SESSION['duplicatedlink'] = 0;
}

if ($suscriptioninactive == 1){
	echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("Suscripción inactiva. Se sugiere renovalrla", "error", 7);
        });
	</script>';   
$_SESSION['suscriptioninactive'] = 0;
}

if ($sessiontimeoutreached  == 1){
	echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("La sesion no tiene actividad por 15 minutos, debe iniciar sesión nuevamente", "warning", 10);
        });
	</script>';   
	
}

if ($updatedlink == 1) {
    echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("Enlace Actualizado Exitosamente", "success", 7);
        });
    </script>';
    $_SESSION['updatedlink'] = 0;
}

if ($updatedlink == 2){
	echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("Hubo un problema al actualizar el enlace, intente nuevamente", "error", 7);
        });
	</script>';   
	$_SESSION['updatedlink'] = 0;
}


if ($deletedlink == 1) {
    echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("Enlace Borrado Exitosamente", "success", 7);
        });
    </script>';
    $_SESSION['deletedlink'] = 0;
}

if ($deletedlink == 2){
	echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("Hubo un problema al borrar el enlace, intente nuevamente", "error", 7);
        });
	</script>';   
$_SESSION['deletedlink'] = 0;
}

?>



 