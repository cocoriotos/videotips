<!--  Developed by julián González Bucheli -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje Estilizado</title>
    <style>
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
            background-color: rgb(128,128,128);
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
    </style>
</head>
<body>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p>ALERTA: Su Usuario es incorrecto, por favor trate nuevamente, si no está registrado entonces seleccione la opción de requerir acceso.</p>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    // Abre el modal cuando se carga la página
    window.onload = openModal;
</script>

<?php
include("closetaskscon.php");
?>

</body>
</html>