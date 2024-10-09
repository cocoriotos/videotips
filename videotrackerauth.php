<!--  Developed by julián González Bucheli -->
<html lang="us"> <!-- Page language-->
	<head>	
		  <meta charset="iso-8559-1"/>
		  <meta name="Description" content="Video links Tool"/> 
		  <meta name="keywords" content="Video links Tool"/>
		  <title>Video links Tool - Julian Gonzalez Bucheli</title>  <!-- page tab title-->
		  <link rel="stylesheet" href="style_sheet.css"/> <!-- styles framework, template and Fonts-->
		  <?php 
           include "closetaskscon.php";
		?>
	</head>
	<header>
		<HR id="HR"/>	<!-- Header title  --> <!-- -->
			<center><h1><font id="form_title" color="#E1EAF7">Video links Tool</font></h1></center>
		<HR/>
	</header>	
	  <body>
		<form id="login" action="access_success_Tasks_final.php" method="POST" autocomplete="off"> <!-- Form to login into application with authentication in database and valid username -->
			    <center><font color=lightblue id="form_title"><strong>Authentication Form</strong></font></center><br>	
                <center><img id="img_login" center SRC="login.gif"></img></center></br> <!-- Login Icon  -->
				<div class="inputdata1">
					<center><font id= "form_title" color="white"><strong>Username</strong></font></center><br>
					<center><input id="username1" type="text" name="username"  placeholder="lastname, name" required ></center><br> <!-- Login PAM username  -->
				<br>
				</div >
				<div class="inputdata1">
					<center><font id= "form_title" color="white"><strong>Password</strong></font></center><br>
					<center><input id="username1" type="password" name="password" placeholder="Type your Password" required ></center><br> <!-- Login PAM username  -->
				<br>
				</div >
				<center><input id="loginbutton" type="submit" value="Sign In"></center>
				<br>
				<br>
				<br>	
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
					<h6 time align="center" datetime="2024/8/30" pubdate>Published on Date: 30/08/2024 - WEB Page available: 7*24</time></h6> <!-- Publication format layout-->
				</hgroup>
		</footer>
	</body>
</html>