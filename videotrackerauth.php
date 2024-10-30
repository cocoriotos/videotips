<!--  Developed by julián González Bucheli -->
<html lang="us"> <!-- Page language-->
	<?php include "nobackpage.php"; include "SessionTimeOut.php";?>
	<head>	
		  <meta charset="iso-8559-1"/>
		  <meta name="Description" content="Herramienta de Enlaces Utiles"/> 
		  <meta name="keywords" content="Herramienta de Enlaces Utiles"/>
		  <title>Herramienta de Enlaces Utiles</title>  <!-- page tab title-->
		  <link rel="stylesheet" href="style_sheet.css"/> <!-- styles framework, template and Fonts-->
		  <?php 
		?>
	</head>
	<header>
		<HR id="HR"/>	<!-- Header title  --> <!-- -->
			<center><h1><font id="form_title1" color="#E1EAF7">Herramienta de Enlaces Útiles</font></h1></center>
		<HR/>
	</header>	
	  <body>
		<form id="login" action="access_success_Tasks_final.php" method="POST" autocomplete="off"> <!-- Form to login into application with authentication in database and valid username -->
			    <center><font color=lightblue id="form_title1"><strong>Formulario de Autenticación</strong></font></center><br>	
                <center><img id="img_login" center SRC="login.gif"></img></center></br> <!-- Login Icon  -->
				<div class="inputdata1">
					<center><font id= "form_title1" color="white"><strong>Email</strong></font></center><br>
					<center><input id="username" type="text" name="email"  placeholder="Digite el email" required ></center><br> <!-- Login  -->
				<br>
				</div >
				<div class="inputdata1">
					<center><font id= "form_title" color="white"><strong>Contraseña</strong></font></center><br>
					<center><input id="username" type="password" name="password" placeholder="Digite su Constraseña" required ></center><br> <!-- Login PAM username  -->
				<br>
				</div >
				<center><input id="loginbutton" type="submit" value="Ingresar"></center>
				<br>
				<br>
				<br>	
		</form>	
		<form id="login" action="requestaccessfinal.php" method="POST" autocomplete="off"> <!-- Form to request access-->
			<center>
				<h6 id="access" align="center"><address><strong>Sin acceso?, Por favor solicitarlo acá</strong> </address></h6><br>
				<input id="requestaccess" type="submit" value="Solicitar Acceso"><br>
			</center>
		</form>
        <form id="login1" action="/default1.php" method="POST" autocomplete="off"> 
			    <center><input id="loginbutton" type="submit" value="Salir de la página"></center>
				<br>
				<br>
				<br>	
		</form>			
		
				<footer id="contact">
				<hgroup>
					<h6 align="center"><address><strong>Web Admin:</strong> Julian Gonzalez Bucheli</address></h6>
					<h6 align="center"><address><strong>Email:</strong>cocoriotos@hotmail.com</address></h6>
					<h6 align="center"><address><strong>Phone:</strong>(+57) 305 429 31 85 </address></h6>
					<h6 align="center"><address><strong>Pereira - Colombia </strong></address></h6>
					<h6 align="center" datetime="<?php echo date('Y-m-d H:i'); ?>" pubdate> Fecha: <?php echo date('m/d/Y'); ?> Hora: <?php echo date('H:i'); ?></h6>
					<!--<h6 time align="center" datetime="2024/8/30" pubdate>Published on Date: 30/08/2024 - WEB Page available: 7*24</time></h6> <!-- Publication format layout-->
				</hgroup>
		</footer>
	</body>
</html>