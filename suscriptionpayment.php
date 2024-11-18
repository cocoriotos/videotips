<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
/*include "nobackpage.php";*/
include "db_connection1.php";
include "headersuscription.php";
$local_username=$_SESSION['email'];
$suscriptiondue = $_SESSION['suscriptiondue'];
include "SessionTimeOut.php";
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
      <center><div class="col-xs-12 col-sm-12 column-custom-wrap">
                <div class="column-custom">
                    <h3 align="center" style="padding-bottom: 5px">Condiciones y Beneficioes de Uso de la Aplicación</h3>
                    <!--<p> Video paso a paso del uso de la aplicación. Click Aquí</p><br>-->
                    <br>
                    <center><p style="color: blue; font-weight: bold; font-size: 24px;"> Ventajas </p></center>
                    <p> Gracias por haber usado la herramienta o la versión gratuita de 7 días la biblioteca de Enlaces útiles la cuál te ayuda a: </p><br>
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
                    <p> 2. Tratamiento de los datos bajo la modalidad de Habeas Data</p>
                    <p> 3. No nos responsabilizamos por información que incite a la violencia física, psicológica, delitos informáticos o cualquier manifestación delictiva</p>
                    <p> 4. El valor de la Suscripción es de $60.000 Pesos Colombianos COP Anuales</p>
                    <p> 5. El valor de la habilitación de Subcategorías más allá de 5 es vitalicia. $15.000 Pesos Colombianos COP</p>
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
      </div>    
  </div>

  <div class="col-md-12">
					<br>
				<?php include("search.php") ?>
				<div class="card card-body">
				<center><label for="description" class="col-form-label" style="color: black; font-size: 28px;"><strong> Resúmen de tu estado de cuenta </strong></label></center>

              <table id="autosearch" class="display" font color="back">
                  <thead id="tableswhite">
                  <tr>
                    <th >Usuario</th>
                    <th align="center">Total SubCategorías</th>
                    <th>Fecha Actual</th>
                    <th>Fecha de último Pago</th>
                    <th>Fecha de Solicitud de acceso a la plataforma </th>
                    <th>Servicio a Pagar</th>
                    <th>Descargar Documento</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $query1 = "select * from videotips_suscription_payments where active = '1' and username ='$local_username'";
                    $result_links = mysqli_query($conn,$query1);
                    while($links = mysqli_fetch_array($result_links)) { ?>
                    <tr>
                      <td align="center"><?php echo $links['username']?></td>
                      <td align="center"><?php echo $links['categoriescounts'] ?></td>
                      <td align="center"><?php echo $links['currentdate'] ?></td>
                      <td align="center"><?php echo $links['lastpaymentdate'] ?></td>
                      <td align="center"><?php echo $links['suscriptiondate'] ?></td>
                      <td align="center"><?php echo $links['ServicePayed'] ?></td>
                      <td align="center"><?php echo $links['filepath'] ?></td>
                      </td>
                    </tr>
                    <?php }?>
                  <tbody>
                </table>
                <br>
                <center><input type="submit" class="btn btn-success btn-block" name="save_link" value="Agregar Constancia de Pago"></input></center>
        </div>
  </div>
</body>

<?php
if ($suscriptiondue == 1) {
    echo '
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <script>
        $(document).ready(function() {
            // Configurar la posición de las notificaciones a "top-center"
            alertify.set("notifier", "position", "top-center");

            // Mostrar el mensaje de éxito en la parte superior central inmediatamente
            alertify.notify("Ha alcanzado el límite de 7 días de Suscripción gratis. Será redirigido a la opción de pago para la reactivación de la suscripción", "warning", 10);
        });
    </script>';
    $_SESSION['suscriptiondue'] = 0;
}
?>
</html>