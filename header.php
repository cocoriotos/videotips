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
  <center><a id="welcome"  class="navbar-brand"><span class="username-style"><?php echo $name; ?></span>, éstas en tu Biblioteca de Contenidos Útiles</a></center>
  </nav>
  <script src="copynumber.js"></script>
  <script src="copypaypal.js"></script>

  <nav class="navbar navbar-dark bg-dark d-flex justify-content-between align-items-center" >
    <div class="d-flex">
        <!--<a id="headerfonts" href="#" class="btn" style="background-color: #d0fff8; color: black; font-weight: bold; margin-right: 10px; margin-left: 20px;" onclick="copiarPaypal();"><i class="fab fa-paypal"></i> Cuenta Paypal: YSXRZMT2AAG4G</a>
        <a id="headerfonts" href="#" class="btn" style="background-color: #d0fff8; color: black; font-weight: bold; margin-right: 10px; margin-left: 20px;" onclick="copiarNumero();"><i class="fas fa-mobile-alt"></i> Número Nequi: 3054293185</a>-->
        <a id="headerfonts" href="suscriptionpayment.php" class="btn" style="background-color: #d0fff8; color: black; font-weight: bold;"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Suscribirse</a>
    </div>
    <div class="d-flex">
        <a id="headerfonts" href="videolinkadminmodule.php" class="btn" style="background-color: #FFF9CC; color: black; font-weight: bold; margin-left: 10px;"><i class="fas fa-broom"></i> Limpiar Formulario</a>
        <a id="headerfonts" href="addcategory.php" class="btn" style="background-color: #D6EEFF; color: black; font-weight: bold; margin-left: 10px;"><i class="fas fa-layer-group"></i> Categorías</a>
        <a id="headerfonts" href="videotrackerauth.php" class="btn btn-danger" style="background-color: #FFD6D6; color: black; font-weight: bold; margin-left: 10px; margin-right: 20px;"><i class="fas fa-sign-out-alt"></i> Salir</a>
      </div>
</nav>


  <!-- BOOTSTRAP -->	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></link>
    <script src="https://kit.fontawesome.com/60f0db780e.js" crossorigin="anonymous"></script>
	</header>
  <br>
    </html>