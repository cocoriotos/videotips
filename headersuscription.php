<!DOCTYPE html>
<?php
/*include "nobackpage.php";
include "SessionTimeOut.php";*/
$name = $_SESSION['name'];
?>
<htm lang="us"> 
<head>    
    <link rel="stylesheet" href="style_sheet_ops.css"/>
</head>
<header>
  <nav class="navbar navbar-dark bg-dark d-flex justify-content-center" id="welcome">
  <center><a id="welcome" class="navbar-brand"><span class="username-style"><?php echo $name; ?></span>, Biblioteca de Contenidos Útiles | Suscripción</a></center>
  </nav>

  <center><nav class="navbar navbar-dark bg-dark d-flex justify-content-center align-items-center">
	        <div class="text-center">
               <input id="headerfonts" type="button" class="btn btn-success btn-block" value="Cuenta Paypal: YSXRZMT2AAG4G"  style="color: white" onclick="copiarPaypal();">  
               <input id="headerfonts" type="button" class="btn btn-success btn-block" value="Ir a Paypal"  style="color: white" onclick="window.open('https://www.paypal.com/', '_blank');"></input>
               <input id="headerfonts" type="button" class="btn btn-success btn-block" value="Número Nequi: 3054293185" style="color: white" onclick="copiarNumero();">  
               <input id="headerfonts" type="button" class="btn btn-success btn-block" value="Ir a Nequi" style="color: white" onclick="window.open('https://clientes.nequi.com.co/recargas', '_blank');"></input>
               <a id="headerfonts" href="videolinkadminmodule.php" class="btn" style=" background-color: #FFD6D6; color: black; font-weight: bold;"><i class="fa fa-reply" aria-hidden="true"></i> Volver a la aplicación</a>
               <!--<a id="headerfonts" href="videotrackerauth.php" class="btn btn-danger" style="background-color: #FFD6D6 ; color: black; font-weight: bold;"><i class="fas fa-sign-out-alt"></i> Salir</a>-->
            </div>	
  </nav></center>
  

  <!-- BOOTSTRAP -->	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></link>
    <script src="https://kit.fontawesome.com/60f0db780e.js" crossorigin="anonymous"></script>
	</header>
    </html>