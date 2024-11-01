<!--  Developed by julián González Bucheli -->
<!--<html lang="us"> <!-- Page language-->
		  <!--<script>
			alert("ALERTa: Su usuario o contraseña son incorrectos, por favor intentar nuevamente si está registrado de lo contrario solicite la opcióon de request access");
		  </script>--!
	<?php
	/*include("closetaskscon.php");
	/*include("dailytaskstracker.php");*/
	?>
</html>-->

<!-- Developed by Julián González Bucheli -->
<!DOCTYPE html>
<html lang="us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0; /* Color de fondo */
        }
        .message {
            padding: 20px;
            border: 2px solid red; /* Borde rojo */
            background-color: #fff; /* Fondo blanco */
            color: red; /* Color del texto */
            font-size: 18px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
    <script>
        alert("ALERTA: Su usuario o contraseña son incorrectos, por favor intente nuevamente. Si está registrado, de lo contrario solicite la opción de request access.");
    </script>
</head>
<body>
    <div class="message">
        ALERTA: Su usuario o contraseña son incorrectos. Por favor intente nuevamente.
    </div>
    <?php
    include("closetaskscon.php");
    /*include("dailytaskstracker.php");*/
    ?>
</body>
</html>
