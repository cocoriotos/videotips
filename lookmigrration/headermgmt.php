<!DOCTYPE html>
<?php
/*include "nobackpage.php";
include "SessionTimeOut.php";*/
$name = $_SESSION['name'];
?>
<head>    
    <link rel="stylesheet" href="style_sheet_ops.css"/>
</head>
<html lang="us"> 
  <header>
  <nav class="navbar navbar-dark bg-dark d-flex justify-content-center" id="welcome" >
    <center><a id="welcome"  class="navbar-brand"><span class="username-style"><?php echo $name; ?></span>. Administración de Operaciones, Usuarios y Suscripciones</a></center>
    <div class="d-flex">
    <a id="headerfonts" href="videotrackerauth.php" class="btn btn-danger" style="background-color: #FFD6D6; color: black; font-weight: bold; margin-left: 10px; margin-right: 20px;"><i class="fas fa-sign-out-alt"></i> Salir</a>
    </div>  
  </nav>



  <!-- BOOTSTRAP -->	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></link>
    <script src="https://kit.fontawesome.com/60f0db780e.js" crossorigin="anonymous"></script>
	</header>
  <br>
    </html>