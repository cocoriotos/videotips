<!--  Developed by julián González Bucheli -->
<html lang="us"> <!-- Page language-->
<?php
/*include "nobackpage.php";*/
include "SessionTimeOut.php";
?>

	<head>		
		<script src="head.js" defer></script>	  
	</head>
	<header>
		<HR id="HR"/>	<!-- Header title  --> <!-- -->
			<center><h1><font color="#E1EAF7">Biblioteca de Contenidos Útiles</font></h1></center>
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
			<br>
			
				<center><input name= "accept" type="checkbox" id="terms" onclick="toggleSubmitButton()" style="transform: scale(2); display: inline-block; margin-right: 10px;font-size: 20px; color: white"> <a style="font-size: 20px; display: inline-block; text-decoration: none; color: white;"> Acepto los </a>  <a href="TermsConditions.php" target="_blank" style="font-size: 20px; color:cyan; display: inline-block; text-decoration: none;">términos y condiciones</a></center><br><br>
            
              <!-- Botón de enviar, inicialmente deshabilitado -->
            <!--  <input id="loginbutton" type="submit" value="Seguir" disabled><br><br><br>	-->
			


			<center><input  id="loginbutton" type="submit" value="Enviar" disabled></center>
		</form>
		<form id="login" action="videotrackerauth.php" method="POST"> <!-- Form to send access email request login  application admin-->
			<center>
				<input id="cancelbutton" action="videotrackerauth.php" type="submit" value="Cancelar">
			</center>
		</form>

		<script>
		// Función para habilitar o deshabilitar el botón de enviar
		function toggleSubmitButton() {
			const submitButton = document.getElementById("loginbutton");
			const termsCheckbox = document.getElementById("terms");

			// Habilita el botón si el checkbox está marcado, de lo contrario lo deshabilita
			submitButton.disabled = !termsCheckbox.checked;
		}
		</script>

		<br><br><br><br><br><br><br><br><br><br><br><br>
		<footer id="contact">	
					<hgroup>
					<HR id="HR"/>
							<h6 align="center" datetime="<?php echo date('Y-m-d H:i'); ?>" pubdate> Fecha: <?php echo date('m/d/Y'); ?> Hora: <?php echo date('H:i'); ?></h6>
					<HR/>
					</hgroup>			
		</footer>
	</body>
</html>