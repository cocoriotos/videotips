<?php include "headereditcategory.php";
include "db_connection1.php";
session_start();
$id = $_GET['id'];
$local_username=$_SESSION['email'];
include "nobackpage.php";
include "SessionTimeOut.php";
?>

<head>	
		<script>
			// Cargar el contenido de header.html en el <head> al cargar la página
			fetch("head.html")
				.then(response => response.text())
				.then(data => {
					document.head.innerHTML += data;
				});
		</script>	  
	</head>
<body id="bodyadminmodule">

<div class="container p-4" >

	<div class="row">
		<div class="col-md-4">
		     		 
			 <?php 
					$query = "select * from videotips_viodetipscategory where id = '$id' and username='$local_username'";
					$result_link = mysqli_query($conn,$query);
					$link = mysqli_fetch_array($result_link);
			 ?>
			 			 
		  
			<div class="card card-body">
				<form action="updatecategory.php" method="POST"> 
				    <div class="form-group">
					    <label for="id" style="color: black;"><strong>Id</strong></label><br>	
						<input type="text" name="id" class="form-control" placeholder="ID" autofocus value ="<?php echo $link['id'];?>"readonly></input><br>
					</div>
				    <div class="form-group">
					<label for="id" style="color: black;"><strong>Categoría</strong></label><br>	
						<input type="text" name="maincategory" class="form-control" placeholder="Categoría" autofocus value ="<?php echo $link['maincategory'];?>"></input><br>
					</div>
					<div class="form-group">
						<label for="videolink" style="color: black;"><strong>Subcategoría</strong></label><br>	
						<input type="text" name="category" class="form-control" placeholder="Subcategoría" autofocus value ="<?php echo $link['category'];?>"></input><br>
					</div>
					<br><br>
					<!--<hr>
					<center><label for="useful" style="color: black;"><strong>Menu de Opciones</strong></label></center><br>
					<hr>-->
					<center><input type="submit" class="btn btn-success btn-block" name="update_category" value="Actualizar"></input></center><br>
					<center><input type="submit" class="btn btn-success btn-block" name="logout" value="Borrar" formaction="deletecategory.php"></input></center><br>
					<!--<center><input type="submit" class="btn btn-success btn-block" name="logout" value="Cancelar" formaction="addcategory.php"></input></center>-->
                 </form>
		    </div>
        </div>	
		
		<div class="col-md-8">
			<table class="table table-bordered" id="tableswhite">
				<thead>
				   <tr>
				       <th>ID</th>
				  	   <th>Categoría</th>
					  <th>Subcategoría</th>
				   </tr>
			    </thead>
				<tbody>
					<?php 
					$query1 = "select * from videotips_viodetipscategory where id = '$id' and username = '$local_username'";
					$result_link1 = mysqli_query($conn,$query1);
					while($link = mysqli_fetch_array($result_link1)) { ?>
					  <tr>
					    <td><?php echo $link['id'] ?></td>
					    <td><?php echo $link['maincategory'] ?></td>
						<td><?php echo $link['category'] ?></td>
						</td>
					  </tr>
					<?php }?>
				<tbody>
			</table>
		</div>
</div>
</body>

<?php include ("footer.php")?>