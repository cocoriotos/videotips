<!--  Developed by julián González Bucheli -->
<html>
<?php 
session_start();
include "headercategory.php";
include "db_connection1.php";
$local_username=$_SESSION['email'];
include "nobackpage.php"; 
/*include "SessionTimeOut.php";*/
?>
<head>	
		<script src="head.js" defer></script>		
		<script src="categorytoclipboard.js" defer></script>  
</head>

<body id="bodyadminmodule">
<div class="container-fluid p-0">
	<div class="row justify-content-start">
		<div class="col-md-12"> 
			<div class="card card-body">
			<center><form action="savecategory.php" method="POST">
					<center><label for="title" class="col-form-label" style="color: black; font-size: 28px;"><strong>Adicionar Categoría y Subcategoría</strong></label></center><br>
						<div class="row">
								<div class="form-group col-md-4">
									<label for="maincategory" class="col-form-label" style="color: black;"><strong>Categoría</strong></label><br>	
									<input class="form-control" style="text-align: center;" id="maincategory" type="text" name="maincategory"  placeholder="Digite la Categoría Principal" required ><br>
								</div><br>
								<div class="form-group col-md-4">
									<label for="category" class="col-form-label" style="color: black;"><strong>Subcategoría</strong></label><br>	
									<input  class="form-control" style="text-align: center;" id="category" type="text" name="category"  placeholder="Digite la SubCategoría" required ></input><br> 
								</div>	
						</div>
								<center><input type="submit" class="btn btn-success btn-block" name="add filter" value="Adicionar Categoría"></input></center><br>
				</form></center>
			</div>
		</div>
		
		<div class="col-md-12">
		<br>
		 <?php include("search.php") ?>
		 <div class="card card-body">
		 <!--<label for="maincategory" style="color: black;"><strong>Current Categories</strong></label><br>-->
		  <table id="autosearch" class="display" font color="back">
		  <center><label for="maincategory" style="color: black; font-size: 28px;"><strong>Tus Categorías</strong></label></center><br>
				<thead id="tableswhite">
				   <tr>
					  <th>ID</th>
					  <th>Categoría</th>
					  <th>SubCategoría</th>
					  <th>Copiar Categoría</th>
					  <th>Copiar Subcategoría</th>
				   </tr>
			    </thead>
				<tbody>
					<?php 
					$query1 = "select * from videotips_viodetipscategory where username ='$local_username' order by id, maincategory, category asc";
					$result_categories = mysqli_query($conn,$query1);
					while($categories = mysqli_fetch_array($result_categories)) { ?>
					  <tr>
					     <td align="center" onclick="Display"><?php echo"<a href='editcategory.php?id={$categories['id']}'>{$categories['id']}"?></td>
						 <td align="center" onclick="Display"><?php echo $categories['maincategory']?></td>
						 <td align="center" onclick="Display"><?php echo $categories['category']?></td>
						 <td align="center"></a><button class="fas fa-copy" onclick="copyToClipboard('<?php echo $categories['maincategory']; ?>')"></button></td>
						 <td align="center"></a><button class="fas fa-copy" onclick="copyToClipboard('<?php echo $categories['category']; ?>')"></button></td>
					 	 </td>
					  </tr>
					<?php }?>
				<tbody>
			</table>
		   </div>
	   </div>
    </div>
</div>
</body>
<?php include ("footer.php")?>
</html>
 