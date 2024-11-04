function copiarNumero() {
	var telefono = "3054293185"; // Reemplaza con el número real
	navigator.clipboard.writeText(telefono).then(function() {
		alert("Número copiado: " + telefono);
	}, function(err) {
		console.error('Error al copiar el número: ', err);
	});
}