<!--  Developed by julián González Bucheli -->
<html lang="us"> <!-- Page language-->
	<head>
	<script src="Popper/popper.min.js"></script>
	<script src="plugins/sweetalert/sweetalert.min.js"></script>
	<script src="plugins/alertifyjs/alertify.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- CSS 
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>-->
		  <script>
			/*alert("Enlace Salvado Exitosamente");
			alertify.success('Success message');

			alertify.set('notifier','position', 'top-center');
			alertify.success('Current position : ' + alertify.get('notifier','position'));

			alertify.set('notifier','position', 'Adicnonado Exitosamente');
			alertify.success('Registro : ' + alertify.get('notifier','position'));*/
            $("#btnlinkadded").click(function(){
			alertify.notify('Elance Adicionado Satisfactoriamente', 'success' , 5, function(){ console.log('por consola');});
			
			/*alertify.set('notifier','position', 'top-center');
			alertify.success('Elance Adicionado Satisfactoriamente');*/
			})
		  </script>
	</head>
</html>

