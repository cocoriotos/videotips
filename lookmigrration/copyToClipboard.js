function copyToClipboard(text, menuId) {
  // Copiar el texto al portapapeles
  navigator.clipboard
    .writeText(text)
    .then(function () {
      console.log("Enlace copiado al portapapeles: " + text);
    })
    .catch(function (error) {
      console.error("Error al copiar el enlace: ", error);
    });

  // Ocultar el menú de acciones
  var actionMenu = document.getElementById(menuId);
  if (actionMenu) {
    actionMenu.classList.remove("show"); // Ocultar el menú
  }
}
