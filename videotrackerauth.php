<!--  Developed by julián González Bucheli -->
<html lang="us"> <!-- Page language-->
	<?php /*include "nobackpage.php"; 
	include "SessionTimeOut.php";*/	
	$useraccesssucced = $_SESSION['useraccesssucced'];
	?>
	<head>	
		<script src="head.js" defer></script>	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></link>	  
	</head>
	<header>
			<HR id="HR"/>	<!-- Header title  --> <!-- -->
				<center><h1><font color="#E1EAF7">Biblioteca de Enlaces Útiles</font></h1></center>
			<HR/>	
	</header>	
	  <body id="bodyadminmodule">
		<form id="login" action="access_success_Tasks_final.php" method="POST" autocomplete="off"> <!-- Form to login into application with authentication in database and valid username -->
			    <center>
					<font color=lightblue id="form_title"><strong>Formulario de Autenticación</strong></font><br><br>
                	<i class="fas fa-sign-in-alt fa-5x" style="color: lightblue;"></i><br><br>
					<hr>
					<!--<img id="img_login" center SRC="login.gif"></img></br> <!-- Login Icon  -->
					<div class="inputdata1">
						<font id= "form_title" color="white"><strong>Email</strong></font><br><br>
						<input id="username1" type="text" name="email"  placeholder="Digite el email" required ><br> <!-- Login  --><br>
					</div >
					<div class="inputdata1">
						<font id= "form_title" color="white"><strong>Contraseña</strong></font><br><br>
						<input id="username1" type="password" name="password" placeholder="Digite su Constraseña" required ><br> <!-- Login PAM username  --><br>
					</div >
					<input id="loginbutton" type="submit" value="Ingresar">
					<br>
					<br>
					<br>
				</center>
		</form>	
		<form id="login" action="requestaccessfinal.php" method="POST" autocomplete="off"> <!-- Form to request access-->
			<center>
				<h6 id="access" align="center"><address><strong>Sin acceso?, Por favor solicitarlo acá</strong> </address></h6><br>
				<input id="requestaccess" type="submit" value="Solicitar Acceso"><br>
			</center>
		</form>
		<footer id="contact">	
					<hgroup>
					<HR id="HR"/>
							<h6 align="center"><address><strong>Web Admin:</strong> Julian Gonzalez Bucheli</address></h6>
							<h6 align="center"><address><strong>Email:</strong>cocoriotos@hotmail.com</address></h6>
							<h6 align="center"><address><strong>Phone:</strong>(+57) 305 429 31 85 </address></h6>
							<h6 align="center"><address><strong>Pereira - Colombia </strong></address></h6>
							<h6 align="center" datetime="<?php echo date('Y-m-d H:i'); ?>" pubdate> Fecha: <?php echo date('m/d/Y'); ?> Hora: <?php echo date('H:i'); ?></h6>
							<!--<h6 time align="center" datetime="2024/8/30" pubdate>Published on Date: 30/08/2024 - WEB Page available: 7*24</time></h6> <!-- Publication format layout-->
					<HR/>
					</hgroup>			
		</footer>
	</body>

	<?php 
	if ($useraccesssucced == 2){
		echo '
		<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
		
		<script>
			$(document).ready(function() {
				// Configurar la posición de las notificaciones a "top-center"
				alertify.set("notifier", "position", "top-center");
	
				// Mostrar el mensaje de éxito en la parte superior central inmediatamente
				alertify.notify("Su usuario o contraseña son incorrectos, por favor intentar nuevamente si está registrado de lo contrario solicite la opcióon de Solicitud de Acceso", "warning", 7);
			});
		</script>';   
	$_SESSION['useraccesssucced'] = 0;
	}
	?>
</html>