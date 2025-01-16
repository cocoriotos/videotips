<!--  Developed by julián González Bucheli -->
<html lang="us">
	<?php /*include "nobackpage.php"; 
	include "SessionTimeOut.php";*/	
	date_default_timezone_set('America/Bogota');
	?>
	<head id="contact">	
		<link rel="icon" href="logo.ico" type="image/x-icon">
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
	<header id="contact">
			
				<center><h1><font color="#E1EAF7">Biblioteca de</font></h1></center>
			    <center><h1><font color="#E1EAF7">Contenidos Útiles</font></h1></center>
				<a id="ayuda" href="https://youtu.be/A3oGHvwQq54" target="_blank">Video Tutoriales.</a>
				<!--<a id="ayuda" href="/Manuals/UCLToolManualDelUsuario.pdf" target="_blank">Manual del Usuario</a>-->
	</header>	
	  <body id="bodyadminmodule">
	  <br><br><br><br>
		<form id="login" action="access_success_Tasks_final.php" method="POST" autocomplete="off"> 
			    <center>
					<font color=lightblue id="form_title"><strong>Formulario de Autenticación</strong></font><br><br>
                	<i class="fas fa-sign-in-alt fa-5x" style="color: lightblue;"></i><br><br>
					<hr>
					<div class="inputdata1">
						<font id= "form_title" color="white"><strong>Email</strong></font><br><br>
						<input id="username1" type="text" name="email"  placeholder="Digite el email"  ><br> <!-- Login  --><br>
					</div >
					<div class="inputdata1">
						<font id= "form_title" color="white"><strong>Contraseña</strong></font><br><br>
						<input id="username1" type="password" name="password" placeholder="Digite su Constraseña"  ><br> <!-- Login PAM username  --><br>
					</div >
					<input id="loginbutton" type="submit" value="Ingresar">
					<br>
					<br>
					<hr>
					<font id= "form_title" color="white"><strong>Olvidaste tu Contraseña?</strong></font><br>
					<input id="loginbutton" type="submit" value="Recuperar" formaction="recoverpassword.php"/>
					<br>
					
				</center>
		</form>	
		<form id="login" action="requestaccessfinal.php" method="POST" autocomplete="off"> 
			<center>
				<h6 id="access" align="center"><address><strong>Sin acceso?, Por favor solicitarlo acá</strong> </address></h6><br>
				<input id="requestaccess" type="submit" value="Solicitar Acceso"><br>
			</center>
		</form>
		<br>
		<br>

		<footer id="contact">	
					
					
					<h1 align="center" datetime="<?php echo date('Y-m-d H:i'); ?>" pubdate> Fecha: <?php echo date('m/d/Y');?></h1>
                    <h1 align="center"><address><strong> Alguna duda? contáctenos al Email: <u>adm@solicionespro.com</u></strong></address></h1>
							
		</footer>
	</body>
</html>