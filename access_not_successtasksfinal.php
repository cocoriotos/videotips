<!--  Developed by julián González Bucheli -->
<!--<html lang="us"> 
		  
		  <script>
			/*alert("ALERT: Your Username is incorrect, please try again or select option butom to request access");*/
			alert("ALERTA: Su Usuario es incorrecto, por favor trate nuevamente o seleccione la opción de requerir acceso");
		  </script>
	<?php
	/*include("closetaskscon.php");*/
	?>
</html>-->


<!DOCTYPE html>
<html lang="es">
<head>
    <!--<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje Estilizado</title>-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--<style>
        body {
            font-family: Arial, sans-serif;
        }
        .modal {
            display: none; /* Oculto por defecto */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% desde la parte superior y centrado */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Ancho del modal */
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>-->
</head>
<body>

<!--<div id="myModal" class="modal">
    <div class="modal-content">-->
        <span onclick="openmessage"()"></span>
        
    <!--</div>
</div>-->



<script>
    function openmessage() {
         swal("Su Usuario es incorrecto, por favor trate nuevamente o seleccione la opción de requerir acceso"),
    }

    
</script>

<?php
include("closetaskscon.php");
?>

</body>
</html>
