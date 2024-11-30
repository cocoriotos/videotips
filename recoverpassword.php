<!--  Developed by julián González Bucheli -->
<html lang="us">
	<?php /*include "nobackpage.php"; 
	include "SessionTimeOut.php";*/	
	date_default_timezone_set('America/Bogota');
	?>
	<head>	
		<script src="head.js" defer></script>	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></link>
		<link rel="stylesheet" href="style_sheet.css"/>
		<script src="Popper/popper.min.js"></script>
		<script src="plugins/sweetalert/sweetalert.min.js"></script>
		<script src="plugins/alertifyjs/alertify.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>	  
	</head>
	<header>
			<HR id="HR"/>
				<center><h1><font color="#E1EAF7">Biblioteca de Contenidos Útiles</font></h1></center>
			<HR/>	
	</header>	
	  <body id="bodyadminmodule">
	  <br><br><br><br><br><br><br><br><br><br><br><br><br>
		<form id="login" action=".php" method="POST" autocomplete="off"> 
			    <center>
					<font color=lightblue id="form_title"><strong>Recuperación de Contraseña</strong></font><br><br>
                	<i class="fas fa-sign-in-alt fa-5x" style="color: lightblue;"></i><br><br>
					<hr>
					<div class="inputdata1">
						<font id= "form_title" color="white"><strong>Digitar su Email registrado</strong></font><br><br>
						<input id="username1" type="text" name="email"  placeholder="Digite el email" required ><br> <!-- Login  --><br>
					</div >
					<input id="loginbutton" type="submit" value="Recuperar">
					<br>
					<br>
					<br>
					<br>
				</center>
		</form>	
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<footer id="contact">	
					<hgroup>
					<HR id="HR"/>
					<h6 align="center" datetime="<?php echo date('Y-m-d H:i'); ?>" pubdate> Fecha: <?php echo date('m/d/Y');?><address><strong> Alguna duda? contáctenos al Email: <u>adm@solicionespro.com</u></strong></address>  </h6>
					<HR/>
					</hgroup>			
		</footer>
	</body>
</html>