<!-- Developed by Julián González Bucheli -->
<html>
<?php 
    session_start();
    $local_username = $_SESSION['email'];
    $savedlink = $_SESSION['savedlink'];
    $duplicatedlink = $_SESSION['duplicatedlink'];
    $updatedlink = $_SESSION['updatedlink'];
    $deletedlink = $_SESSION['deletedlink'];
    $sessiontimeoutreached = $_SESSION['sessiontimeoutreached'];
    $copytoclipboard = $_SESSION['copytoclipboard'];
    $videoUrl = $_SESSION['videoUrl'];
    $embedUrl = $_SESSION['embedUrl'];
    $click = $_SESSION['click'];
    $name = $_SESSION['name'];
 
    include "header.php";
    include "db_connection1.php";
?>

<head>    
    <script src="head.js" defer></script>    
    <script src="Linktoclipboard.js" defer></script>
    <link rel="icon" href="SSCircleBackgroundWhite.ico" type="image/x-icon">
    <link rel="stylesheet" href="style_sheet_ops.css"/>
    <script src="Popper/popper.min.js"></script>
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/alertifyjs/alertify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
</head>

<body id="bodyadminmodule" style="padding: 0%;">
    <div class="container-fluid p-0">
        <div class="row justify-content-start" style="padding: 0%; width: 100%;">
            <div class="col-md-12"> 
                <div class="card card-body" id="card-body">
                    <form action="savelinks.php" method="POST">
                        <center><label for="title" class="col-form-label" style="color: black; font-size: 28px;"><strong> Adicionar Enlace </strong></label></center>
                        <div class="row justify-content-center">
                            <div class="form-group col-md-3">
                                <label for="videolink" class="col-form-label" style="color: black; text-align: center;"><strong>Enlace Útil</strong></label>
                                <textarea id="videolink" name="videolink" rows="1" class="form-control" placeholder="Enlace Útil" required></textarea>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="maincategory" class="col-form-label" style="color: black;"><strong>Categoría</strong></label>
                                <select class="form-control" name="maincategory" id="maincategory" onchange="getSubcategories(this.value)" required>
                                    <option value="" disabled selected>Seleccione una categoría</option>
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
                            <div class="form-group col-md-2">
                                <label for="category" class="col-form-label" style="color: black;"><strong>Subcategoría</strong></label>
                                <select class="form-control" name="category" id="category" required>
                                    <!-- Las subcategorías se cargarán aquí dinámicamente -->
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="category" class="col-form-label" style="color: black;"><strong>Contenido</strong></label>
                                <select class="form-control" name="proforpers" id="proforpers" required><?php 
                                    $SQLSELECT = "SELECT proforpers FROM videotips_proforpers"; 
                                    $result_set = mysqli_query($conn, $SQLSELECT); 
                                    while ($rows = $result_set->fetch_assoc()) { 
                                        $proforpers = $rows['proforpers']; 
                                        echo "<option value='$proforpers'>$proforpers</option>";
                                    }
                                ?></select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="description" class="col-form-label" style="color: black;"><strong>Descripción</strong></label>
                                <textarea id="description" name="description" rows="1" class="form-control" placeholder="Descripción del Contenido del Enlace" required></textarea>
                            </div>
                        </div>
                        <br>
                        <center><input id="save_link" type="submit" class="btn btn-success btn-block" name="save_link" value="Guardar" disabled></input></center>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <br>
                <?php include("search.php") ?>
                <div class="card card-body" div="card-body">
                    <center><label for="description" class="col-form-label" style="color: black; font-size: 28px;"><strong> Tus Enlaces Útiles </strong></label></center>
                    <table id="autosearch" class="display">
                        <thead id="tableswhite">
                            <tr>
                                <!--<th>ID</th>-->
                                <th>Enlace</th>
                                <th>Categoría</th>
                                <th>Subcategoría</th>
                                <th>Contenido</th>
                                <th>Descripción</th>
                                <th>Creación</th>
                                <th>Copiar Enlace</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query1 = "select * from videotips_videotips where active = 'Yes' and username ='$local_username' order by maincategory, category asc";
                            $result_links = mysqli_query($conn,$query1);                            
                            while($links = mysqli_fetch_array($result_links)) { ?>
                            <tr>
                                <!--<td align="center"><?php /*echo"<a href='edit.php?id={$links['id']}'>{$links['id']}"*/?></td>-->
                                <td id="tdlink" align="left"><a href="<?php echo $links['videolink']; ?>" target="_blank"><?php echo $links['videolink']; ?></a></td>
                                <td id="tdmaincategory" align="center"><?php echo $links['maincategory'] ?></td>
                                <td id="tdcategory" align="center"><?php echo $links['category'] ?></td>
                                <td id="tdproforpers" align="center"><?php echo $links['proforpers'] ?></td>
                                <td id="tddescription" align="left"><?php echo $links['content'] ?></td>
                                <td align="center"><?php echo $links['creationdate'] ?></td>
                                <td align="center"><button class="fas fa-copy color-dark-icon" title = "Copiar" onclick="copyToClipboard('<?php echo $links['videolink']; ?>')"></button></td>
                                <td><a href="edit.php?id=<?php echo $links['id']?>"class="btn btn-secondary" title="Modificar"><i class="fas fa-marker"></i></a>
						                        <!--<a href="videoadminmodule.php?id=<?php echo $links['id']?>"class="btn btn-danger" title="Borrar"><i class="far fa-trash-alt"></i></a></td>-->
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

<script>
function getSubcategories(maincategory) {
    if (maincategory == "") {
        document.getElementById("category").innerHTML = "<option value=''>Seleccione una subcategoría</option>";
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("category").innerHTML = this.responseText;
            checkForm(); // Verificar el estado del formulario después de cargar las subcategorías
        }
    };
    xhr.open("GET", "getSubcategories.php?maincategory=" + maincategory, true);
    xhr.send();
}

function checkForm() {
    const videolink = document.getElementById("videolink").value.trim();
    const maincategory = document.getElementById("maincategory").value;
    const category = document.getElementById("category").value;
    const proforpers = document.getElementById("proforpers").value;
    const description = document.getElementById("description").value.trim();

    const saveButton = document.getElementById("save_link");

    if (videolink !== "" && !videolink.includes('""') &&
        maincategory !== "" && category !== "" &&
        proforpers !== "" && description !== "" && !description.includes('""')) {
        saveButton.disabled = false;
    } else {
        saveButton.disabled = true;
    }
}

document.getElementById("videolink").addEventListener("input", checkForm);
document.getElementById("maincategory").addEventListener("change", checkForm);
document.getElementById("category").addEventListener("change", checkForm);
document.getElementById("proforpers").addEventListener("change", checkForm);
document.getElementById("description").addEventListener("input", checkForm);

window.onload = function() {
    var maincategory = document.getElementById("maincategory").value;
    getSubcategories(maincategory);
};
</script>

<?php

if ($copytoclipboard == 1) {
    
	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Mensaje',
        text: '¡Enlace copiado al portapapeles!',
        icon: 'success',
        confirmButtonText: 'Aceptar',
        customClass: {
          popup: 'custom-swal-popup',
          title: 'custom-swal-title',
          content: 'custom-swal-content',
          confirmButton: 'custom-swal-confirm-button'
        },
        timer: 2000, // 2000 milisegundos = 2 segundos
        timerProgressBar: true, // Muestra una barra de progreso
        didOpen: () => {
          Swal.showLoading(); // Muestra un indicador de carga
        },
        willClose: () => {
        }
      });
    });
  </script>";
    $copytoclipboard = 0;
}

if ($savedlink == 1) {
    
	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Mensaje',
        text: '¡Enlace Adicionado Exitosamente!',
        icon: 'success',
        confirmButtonText: 'Aceptar',
        customClass: {
          popup: 'custom-swal-popup',
          title: 'custom-swal-title',
          content: 'custom-swal-content',
          confirmButton: 'custom-swal-confirm-button'
        },
        timer: 2000, // 2000 milisegundos = 2 segundos
        timerProgressBar: true, // Muestra una barra de progreso
        didOpen: () => {
          Swal.showLoading(); // Muestra un indicador de carga
        },
        willClose: () => {
        }
      });
    });
  </script>";
    $_SESSION['savedlink'] = 0;
}

if ($savedlink == 2){

	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Mensaje',
        text: 'Hubo un problema al adicionar el enlace, intente nuevamente',
        icon: 'error',
        confirmButtonText: 'Aceptar',
        customClass: {
          popup: 'custom-swal-popup',
          title: 'custom-swal-title',
          content: 'custom-swal-content',
          confirmButton: 'custom-swal-confirm-button'
        },
        timer: 3000, // 3000 milisegundos = 3 segundos
        timerProgressBar: true, // Muestra una barra de progreso
        didOpen: () => {
          Swal.showLoading(); // Muestra un indicador de carga
        },
        willClose: () => {
        }
      });
    });
  </script>";
$_SESSION['savedlink'] = 0;
}


if ($duplicatedlink == 1){

	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Mensaje',
        text: 'Este enlace ya lo Tenías guardado en tu Biblioteca',
        icon: 'error',
        confirmButtonText: 'Aceptar',
        customClass: {
          popup: 'custom-swal-popup',
          title: 'custom-swal-title',
          content: 'custom-swal-content',
          confirmButton: 'custom-swal-confirm-button'
        },
        timer: 3000, // 3000 milisegundos = 3 segundos
        timerProgressBar: true, // Muestra una barra de progreso
        didOpen: () => {
          Swal.showLoading(); // Muestra un indicador de carga
        },
        willClose: () => {
        }
      });
    });
  </script>"; 
$_SESSION['duplicatedlink'] = 0;
}

if ($suscriptioninactive == 1){
	
	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Mensaje',
        text: 'Has alcanzado el límite de 15 días de uso gratuito y/o tu Suscripción está vencida. Te invitamos a renovarla por medio nuestros canales de Nequi  para Colombia o Paypayl para Internacional',
        icon: 'error',
        confirmButtonText: 'Aceptar',
        customClass: {
          popup: 'custom-swal-popup',
          title: 'custom-swal-title',
          content: 'custom-swal-content',
          confirmButton: 'custom-swal-confirm-button'
        },
        timer: 3000, // 3000 milisegundos = 3 segundos
        timerProgressBar: true, // Muestra una barra de progreso
        didOpen: () => {
          Swal.showLoading(); // Muestra un indicador de carga
        },
        willClose: () => {
        }
      });
    });
  </script>";
$_SESSION['suscriptioninactive'] = 0;
}

if ($sessiontimeoutreached  == 1){
	
	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Mensaje',
        text: 'La sesion no tiene actividad por 15 minutos, debe iniciar sesión nuevamente',
        icon: 'error',
        confirmButtonText: 'Aceptar',
        customClass: {
          popup: 'custom-swal-popup',
          title: 'custom-swal-title',
          content: 'custom-swal-content',
          confirmButton: 'custom-swal-confirm-button'
        },
        timer: 3000, // 3000 milisegundos = 3 segundos
        timerProgressBar: true, // Muestra una barra de progreso
        didOpen: () => {
          Swal.showLoading(); // Muestra un indicador de carga
        },
        willClose: () => {
        }
      });
    });
  </script>";
}

if ($updatedlink == 1) {
    
	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Mensaje',
        text: 'Enlace Actualizado Exitosamente',
        icon: 'success',
        confirmButtonText: 'Aceptar',
        customClass: {
          popup: 'custom-swal-popup',
          title: 'custom-swal-title',
          content: 'custom-swal-content',
          confirmButton: 'custom-swal-confirm-button'
        },
        timer: 3000, // 3000 milisegundos = 3 segundos
        timerProgressBar: true, // Muestra una barra de progreso
        didOpen: () => {
          Swal.showLoading(); // Muestra un indicador de carga
        },
        willClose: () => {
        }
      });
    });
 	 </script>";   
    $_SESSION['updatedlink'] = 0;
}

if ($updatedlink == 2){
	
	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Mensaje',
        text: 'Hubo un problema al actualizar el enlace, intente nuevamente',
        icon: 'error',
        confirmButtonText: 'Aceptar',
        customClass: {
          popup: 'custom-swal-popup',
          title: 'custom-swal-title',
          content: 'custom-swal-content',
          confirmButton: 'custom-swal-confirm-button'
        },
        timer: 3000, // 3000 milisegundos = 3 segundos
        timerProgressBar: true, // Muestra una barra de progreso
        didOpen: () => {
          Swal.showLoading(); // Muestra un indicador de carga
        },
        willClose: () => {
        }
      });
    });
 	 </script>";   
	$_SESSION['updatedlink'] = 0;
}


if ($deletedlink == 1) {
    
	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Mensaje',
        text: 'Enlace Borrado Exitosamente',
        icon: 'success',
        confirmButtonText: 'Aceptar',
        customClass: {
          popup: 'custom-swal-popup',
          title: 'custom-swal-title',
          content: 'custom-swal-content',
          confirmButton: 'custom-swal-confirm-button'
        },
        timer: 2000, // 2000 milisegundos = 2 segundos
        timerProgressBar: true, // Muestra una barra de progreso
        didOpen: () => {
          Swal.showLoading(); // Muestra un indicador de carga
        },
        willClose: () => {
        }
      });
    });
 	 </script>";   
    $_SESSION['deletedlink'] = 0;
}

if ($deletedlink == 2){
	
	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Mensaje',
        text: 'Hubo un problema al borrar el enlace, intente nuevamente',
        icon: 'error',
        confirmButtonText: 'Aceptar',
        customClass: {
          popup: 'custom-swal-popup',
          title: 'custom-swal-title',
          content: 'custom-swal-content',
          confirmButton: 'custom-swal-confirm-button'
        },
        timer: 3000, // 3000 milisegundos = 3 segundos
        timerProgressBar: true, // Muestra una barra de progreso
        didOpen: () => {
          Swal.showLoading(); // Muestra un indicador de carga
        },
        willClose: () => {
        }
      });
    });
 	 </script>";   
$_SESSION['deletedlink'] = 0;
}
?>