<!--  Developed by julián González Bucheli -->
<html lang="us"> <!-- Page language-->
<?php
include "nobackpage.php";
include "session_finished.php";
include "SessionTimeOut.php";
?>

	<head>	
		<script>
			// Cargar el contenido de header.html en el <head> al cargar la página
			fetch("head.html")
				.then(response => response.text())
				.then(data => {
					document.head.innerHTML += data;
				});
		</script>	  
	</head>
	<header>
		<HR id="HR"/>	<!-- Header title  --> <!-- -->
			<center><h1><font color="#E1EAF7">Herramienta de Enlaces Útiles</font></h1></center>
		<HR/>
	</header>
	<body id="bodyadminmodule">		
	  		<form id="login" action="accessemailFinal.php" method="POST" autocomplete="off"> <!-- Form to send access email request login  application admin-->
			<center><font color=lightblue id="form_title"><strong>Formulario de Solicitud de Acceso</strong></center></font><br>	
			  <div class="inputdata">
		        <font color="white" id="form_title1"><strong>Nombre</strong></font><!-- Requester information for access  -->
				<input id="username" type="text" name="Name" placeholder="Digite su Nombre" required><br> 
				<font color="white"id="form_title1"><strong>Apellido</strong></font>
				<input id="username" type="text" name="LastName" placeholder="Digite su Apellido" required><br>
				<font color="white" id="form_title1"><strong>Email</strong></font>
				<input id="username" type="text" name="Email" placeholder="Digite su Correo" required><br>
				<font color="white" id="form_title1"><strong>País</strong></font>
				<input id="username" type="text" name="Country" placeholder="País de Residencia" required><br>
				<font color="white" id="form_title1"><strong>Ciudad</strong></font>
				<input id="username" type="text" name="City" placeholder="Ciudad de Residencia" required><br>	
				<font id= "form_title1" color="white"><strong>Contraseña</strong></font>
				<input id="username" type="password" name="password1" placeholder="Digite su Contraseña" required ><br>
			</div>
			<center><input id="requestaccess" type="submit" value="Enviar"></center>
		</form>
		<form id="login" action="videotrackerauth.php" method="POST"> <!-- Form to send access email request login  application admin-->
			<center>
				<input id="cancelbutton" action="videotrackerauth.php" type="submit" value="Cancelar">
			</center>
		</form>
		<footer id="contact">
				<hgroup>
					<h6 align="center"><address><strong>Web Admin:</strong> Julian Gonzalez Bucheli</address></h6>
					<h6 align="center"><address><strong>Email:</strong>cocoriotos@hotmail.com</address></h6>
					<h6 align="center"><address><strong>Teléfono:</strong>(+57) 305 429 31 85</address></h6>
					<h6 align="center"><address><strong>Pereira - Colombia </strong></address></h6>
					<h6 align="center" datetime="<?php echo date('Y-m-d H:i'); ?>" pubdate> Fecha: <?php echo date('m/d/Y'); ?> Hora: <?php echo date('H:i'); ?></h6>
					<!--<h6 time align="center" datetime="2021/4/1" pubdate>Published on Date: 10/27/2024</time></h6> <!-- Publication format layout-->-->
				</hgroup>
		</footer>
	</body>
</html>