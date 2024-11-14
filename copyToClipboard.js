function ToClipboard(text) {
    // Usar la nueva API de clipboard
    navigator.clipboard.writeText(text)
        .then(() => {
            alert("¡Enlace copiado al portapapeles!");
        })
        .catch(err => {
            console.error("Error al copiar al portapapeles: ", err);
            alert("Hubo un error al copiar el enlace.");
        });
}

