<!DOCTYPE html>
<?php
/*include "nobackpage.php";
include "SessionTimeOut.php";*/
$name = $_SESSION['name'];
?>
<html lang="us">
<header>
  <nav class="navbar navbar-dark bg-dark d-flex justify-content-center" id="welcome">
  <center><a id="welcome" href="videolinkadminmodule.php" class="navbar-brand"><span class="username-style"><?php echo $name; ?></span>, éstas en tu Biblioteca de Contenidos Útiles</a></center>
  </nav>
  
  <nav class="navbar navbar-dark bg-dark d-flex justify-content-between align-items-center">
    <div class="d-flex"></div>          
            <div class="d-flex">
                <a id="headerfonts" href="addcategory.php" class="btn" style="background-color: #FFF9CC; color: black; font-weight: bold; margin-left: 10px;"><i class="fas fa-broom"></i> Limpiar Formulario</a>
                <a id="headerfonts" href="videolinkadminmodule.php" class="btn" style="background-color:rgb(214, 243, 255); color: black; font-weight: bold; margin-left: 10px;"><i class="fa fa-link"></i> Adicionar Enlace</a>
                <a id="headerfonts" href="videotrackerauth.php" class="btn btn-danger" style="background-color: #FFD6D6; color: black; font-weight: bold; margin-left: 10px; margin-right: 20px;"><i class="fas fa-sign-out-alt"></i> Salir</a>
            </div>   
    </nav>
  
  <!-- BOOTSTRAP -->	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></link>
    <script src="https://kit.fontawesome.com/60f0db780e.js" crossorigin="anonymous"></script>
	</header>
  </html>