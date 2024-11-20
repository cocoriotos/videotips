<?php 
session_start();
$linktoclipboard = $_SESSION['linktoclipboard'];
?>

<script>
function copyToClipboard(text) {
    // Crear un elemento textarea temporal para almacenar el texto
    const tempTextarea = document.createElement("textarea");
    tempTextarea.value = text;
    document.body.appendChild(tempTextarea);
    // Seleccionar y copiar el texto
    tempTextarea.select();
    document.execCommand("copy");
    // Eliminar el elemento temporal
    document.body.removeChild(tempTextarea);
    /*alert("¡Enlace copiado al portapapeles!");*/
    //fetch('videolinkadminmodule.php', {
      //  method: 'GET', // o 'POST' si lo necesitas
        // Opcionalmente, puedes configurar otras opciones si es necesario (headers, etc.)
   // })
    //.catch(error => {
        // Si ocurre algún error, no se muestra nada, pero lo podrías manejar si lo necesitas
      //  console.error('Hubo un error al llamar el archivo PHP', error);
   // });
}
</script>
<?php
$_SESSION['linktoclipboard']=1;
//include("videolinkadminmodule.php");
?>