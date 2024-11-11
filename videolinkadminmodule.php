<!--  Developed by julián González Bucheli
bootstrapCDN https://getbootstrap.com and then download then CDN via jsDeliver and copy links -->
<html>
<?php 
session_start();
include "header.php";
include "db_connection1.php";
$local_username=$_SESSION['email'];
include "nobackpage.php";
/*include "SessionTimeOut.php";*/
?>
<head>	
	<script src="head.js" defer></script>	
	<script src="toclipboard.js" defer></script>
	<link rel="stylesheet" href="style_sheet.css"/>
</head>
<body id="bodyadminmodule">
    <div class="container-fluid p-0">
        <div class="row justify-content-start">
            <div class="col-md-12"> <!-- Cambié esto a col-md-12 para que ocupe el ancho completo -->
                <div class="card card-body">
                    <form class="" action="savelinks.php" method="POST">
                    
                        <div class="form-group row"> <!-- Usamos row aquí -->
                            <label for="videolink" class="col-form-label col-md-2" style="color: black;"><strong>Enlace Útil</strong></label>
                            <div class="col-md-10"> <!-- Espacio para el campo -->
                                <textarea name="videolink" rows="5" class="form-control" placeholder="Enlace Útil"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="maincategory" class="col-form-label col-md-2" style="color: black;"><strong>Categoría</strong></label>
                            <div class="col-md-4"> <!-- Cambié el ancho de la columna para las categorías -->
                                <select class="form-control" name="maincategory">
                                    <?php 
                                    $SQLSELECT = "SELECT distinct(maincategory) FROM videotips_viodetipscategory where username = '$local_username' order by maincategory asc";
                                    $result_set = mysqli_query($conn, $SQLSELECT);
                                    while ($rows = $result_set->fetch_assoc()) { 
                                        $maincategory = $rows['maincategory']; 
                                        echo "<option value='$maincategory'>$maincategory</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-form-label col-md-2" style="color: black;"><strong>Subcategoría</strong></label>
                            <div class="col-md-4">
                                <select class="form-control" name="category">
                                    <?php 
                                    $SQLSELECT = "SELECT distinct(category) FROM videotips_viodetipscategory where username = '$local_username' order by category asc";
                                    $result_set =  mysqli_query($conn, $SQLSELECT);
                                    while ($rows = $result_set->fetch_assoc()) { 
                                        $category = $rows['category']; 
                                        echo "<option value='$category'>$category</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-form-label col-md-2" style="color: black;"><strong>Descripción</strong></label>
                            <div class="col-md-10">
                                <textarea name="description" rows="5" class="form-control" placeholder="Descripción del Contenido del Enlace"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-left">
                                <input type="submit" class="btn btn-success" name="save_link" value="Guardar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <?php include("search.php") ?>
                <div class="card card-body">
                    <table id="autosearch" class="display" font color="back">
                        <thead id="tableswhite">
                            <tr>
                                <th>ID</th>
                                <th>Enlace</th>
                                <th>Categoría</th>
                                <th>Subcategoría</th>
                                <th>Descripción</th>
                                <th>Creación</th>
                                <th>Copiar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query1 = "select * from videotips_videotips where active = 'Yes' and username ='$local_username' order by maincategory, category asc";
                            $result_links = mysqli_query($conn,$query1);
                            while($links = mysqli_fetch_array($result_links)) { ?>
                            <tr>
                                <td align="center" onclick="Display"><?php echo"<a href='edit.php?id={$links['id']}'>{$links['id']}"?></td>
                                <td align="center"><a href="<?php echo $links['videolink']; ?>" target="_blank"><?php echo $links['videolink']; ?></a></td>
                                <td align="center"><?php echo $links['maincategory'] ?></td>
                                <td align="center"><?php echo $links['category'] ?></td>
                                <td align="center"><?php echo $links['description'] ?></td>
                                <td align="center"><?php echo $links['creationdate'] ?></td>
                                <td align="center"><button class="fas fa-copy" onclick="copyToClipboard('<?php echo $links['videolink']; ?>')"></button></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>




<?php include ("footer.php")?>
</html>
 