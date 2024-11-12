<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
/*include "nobackpage.php";*/
include "db_connection1.php";
include "headersuscription.php";
$local_username=$_SESSION['email'];
/*include "SessionTimeOut.php";*/
?>
<header>
    <script src="copynumber.js"></script>
</header>  	
<body id="bodyadminmodule">
          <br><br>
  <div class="container">
      <div class="column-wrap clearfix">
            <div class="col-xs-12">
                <hr>
            </div>
      <center><div class="col-xs-12 col-sm-4 column-custom-wrap">
                <div class="column-custom">
                    <h3 align="center" style="padding-bottom: 5px">Condiciones y Beneficioes de Uso de la Aplicación</h3>
                    <!--<p> Video paso a paso del uso de la aplicación. Click Aquí</p><br>-->
                    <br>
                    <center><p style="color: blue; font-weight: bold; font-size: 24px;"> Ventajas </p></center>
                    <p> Gracias por haber usado gratuitamente por 7 días la biblioteca de Enlaces útiles la cuál te ayuda a: </p><br>
                    <p> 1. Crear gratuitamente hasta 5 Subcategoorías para organizar tus enlaces</p>  
                    <p> 2. Etiquetar con una breve descripción del contenido para que puedas hacer las búsquedas más facilmente</p>
                    <p> 3. Tener todos tus enlaces importantes indistinto de cual plataforma sea y que la búsqueda la haces en un solo sitio</p>
                    <p> 4. La búsqueda de un enlaces en cualquier histórico o favoritos en las aplicaciones, que normalmente toma mucho tiempo encontrarla, la harás en segundos porque las tendrás en un solo lugar y con un motor de búsqueda efectivo</p>
                    <p> 5. Abrir el enlace directamente para ver los contenidos</p>
                    <p> 6. Copiar los Enlaces guardados para compartirlos</p>
					          <br>
                    <center><p style="color: blue; font-weight: bold; font-size: 24px;"> Condiciones </p></center>
                    <p> Para tener en cuenta: </p><br>
                    <p> 1. No incluir información sensitiva ni personales. No nos hacemos responsables del salvaguardar o uso de su información</p>
                    <p> 2. Tratamiento de los datos bajo la modalidad de Abeas Data</p>
                    <p> 3. El valor de la Suscripción es de $60.000 Pesos Colombianos COP Anuales</p>
                    <p> 4. El valor de la habilitación de Subcategorías más allá de 5 es vitalicia. $15.000 Pesos Colombianos COP</p>
                    <br>
                    <center><p style="color: blue; font-weight: bold; font-size: 24px;"> Forma de Pago de Suscripción y Subcategorías</p></center>
                    <p> 1. Pago de los montos por Nequi al número +57 305 4293185.</p> 
                    <p> 2. Tomar una imagen por cada uno de los pagos realizados y convertirlas a formato PDF</p>
                    <p> 3. Al realizar el o los pagos llenar el formulario por cada tipo de producto adquirido incluyendo el nombre de usuario con el que se registró que es su cuenta de correo.</p>
                    <p> 4. En el formulario al registrar los pagos indicar por separado si es de suscripción o de subcategorías</p>
                    <p> 5. El pago de categorías solo debe hacerse si tiene una suscripción activa para que sea efectivo</p>
                    <p> 6. Si tiene alguna duda, enviar correo al adminitrador: cocoriotos@hotmail.com" o WhatsApp: +57 3054293185</p>
				        </div>
          </div>
          </center>
          <hr>
          <!--<form id="login" action="suscriptionpaymentevidence.php" method="POST" autocomplete="off"> <!-- Form to login into application with authentication in database and valid username -->
              <!--<center>
                  <font color=lightblue id="form_title"><strong>Formulario de Evidencia de Pago de Productos</strong></font><br><br>
                          <img id="img_login" center SRC="login.gif"></img></br> <!-- Login Icon  -->
                  <!--<div class="inputdata1">
                    <font id= "form_title" color="white"><strong>Email</strong></font><br><br>
                    <input id="username1" type="text" name="email"  placeholder="Digite el email" required ><br> <!-- Login  --><br>
                  <!--</div >
                  <div class="inputdata1">
                    <font id= "form_title" color="white"><strong>Producto adquirido</strong></font><br><br>
                    <input id="username1" type="text" name="product" placeholder="Seleccione su producto" required ><br> <!-- Login PAM username  --><br>
                  <!--</div >
                  <div class="inputdata1">
                    <font id= "form_title" color="white"><strong>Cargar imagen en formato PDF</strong></font><br><br>
                    <input id="username1" type="text" name="product" placeholder="Cargar el documento de evidencia" required ><br> <!-- Login PAM username  --><br>
                  <!--</div >
                  <input id="loginbutton" type="submit" value="Enviar">
                  <br>
                  <br>
                  <br>
				      </center>
		      </form>-->
      </div>    
  </div>

  <table id="autosearch" class="display" font color="back">
						<thead id="tableswhite">
						<tr>
							<th>Usuario</th>
							<th>Total Sub Categorías</th>
							<th>Fecha Actual</th>
							<th>Fecha de último Pago</th>
							<th>Fecha de Solicitud de acceso a la plataforma </th>
							<th>Fecha de Creación</th>
							<th>Servicio a Pagar</th>
              <th>Descargar</th>
						</tr>
						</thead>
						<tbody>
							<?php 
							/* voy aquí*/$query1 = "select * from videotips_suscription_payments where active = 'Yes' and username ='$local_username' order by maincategory, category asc";/*10112024*/
							$result_links = mysqli_query($conn,$query1);
							while($links = mysqli_fetch_array($result_links)) { ?>
							<tr>
								<td align="center" onclick="Display"><?php echo"<a href='edit.php?id={$links['id']}'>{$links['id']}"?></td>
								<td align="center"><a href="<?php echo $links['videolink']; ?>" target="_blank"><?php echo $links['videolink']; ?></td>
								<td align="center"><?php echo $links['maincategory'] ?></td>
								<td align="center"><?php echo $links['category'] ?></td>
								<td align="center"><?php echo $links['description'] ?></td>
								<td align="center"><?php echo $links['creationdate'] ?></td>
								<td align="center"></a><button class="fas fa-copy" onclick="copyToClipboard('<?php echo $links['videolink']; ?>')"></button></td>
								</td>
							</tr>
							<?php }?>
						<tbody>
					</table>


</body>