<!-- Developed by Julián González Bucheli -->
<html>
<?php 
    include "sessions.php";
    include "sessionvalidation.php";
    $local_username = $_SESSION['email'];
    $savedcategory = $_SESSION['savedcategory'];
    $duplicatedcategory = $_SESSION['duplicatedcategory'];
    $sessiontimeoutreached = $_SESSION['sessiontimeoutreached'];
    $updatedcategory = $_SESSION['updatedcategory'];
    $deletedcategory = $_SESSION['deletedcategory'];
    include "headercategory.php";
    include "db_connection1.php";
?>
<head>	
    <script src="head.js" defer></script>		
    <script src="categorytoclipboard.js" defer></script>  
    <link rel="stylesheet" href="style_sheet_ops.css"/>
</head>
<body id="bodyadminmodule" style="padding: 0%;">
    <div class="container-fluid p-0">
        <div class="row justify-content-start" style="padding: 0%; width: 100%;">
            <div class="col-md-12"> 
                <div class="card card-body">
                    <form action="savecategory.php" method="POST">
                        <center><label for="title" class="col-form-label" style="color: black; font-size: 28px;"><strong>Adicionar Categoría y Subcategoría</strong></label></center><br>
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4">
                                <label for="maincategory" class="col-form-label" style="color: black;"><strong>Categoría</strong></label><br>	
                                <input class="form-control" style="text-align: center;" id="maincategory" type="text" name="maincategory" placeholder="Digite la Categoría Principal" required><br>
                            </div><br>
                            <div class="form-group col-md-4">
                                <label for="category" class="col-form-label" style="color: black;"><strong>Subcategoría</strong></label><br>	
                                <input class="form-control" style="text-align: center;" id="category" type="text" name="category" placeholder="Digite la SubCategoría" required><br> 
                            </div>	
                        </div>
                        <center><input id="save_link" type="submit" class="btn btn-success btn-block" name="add filter" value="Adicionar Categoría"></center><br>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <br>
                <center><?php include("search.php") ?></center>
                <div class="card card-body">
                    <div class="grid-container">
                        <?php 
                            $query1 = "select * from videotips_viodetipscategory where username ='$local_username' order by id, maincategory, category asc";
                            $result_categories = mysqli_query($conn, $query1);
                            while($categories = mysqli_fetch_array($result_categories)) { 
                                $randomColor = getRandomLightColor();		  
                        ?>
                        <div class="grid-item" style="background-color: <?php echo $randomColor; ?>;">
                            <button class="grid-item-action-btn" style="color: black; font-size: 40px; font-weight: bold;" onclick="toggleActions(event, <?php echo $categories['id']; ?>)">...</button>	
                            <div class="grid-item-actions">
                                <div class="grid-item-action-menu" id="action-menu-<?php echo $categories['id']; ?>">
                                    <button style="background: white; color: green; font-size: 12px;" onclick="copyToClipboard('<?php echo $categories['maincategory']; ?>'); toggleActions(event, <?php echo $categories['id']; ?>);" class="btn btn-secondary">Copiar Categoría</button>
                                    <button style="background: white; color: green; font-size: 12px;" onclick="copyToClipboard('<?php echo $categories['category']; ?>'); toggleActions(event, <?php echo $categories['id']; ?>);" class="btn btn-secondary">Copiar Subcategoría</button>
                                    <button style="background: white; color: gray; font-size: 12px;" onclick="window.location.href = 'editcategory.php?id=<?php echo $categories['id']; ?>'" class="btn btn-secondary">Modificar</button>
                                    <button style="background: white; color: red; font-size: 12px;" onclick="confirmDelete(<?php echo $categories['id']; ?>)" class="btn btn-secondary">Borrar</button>
                                </div>
                            </div>
                            <div class="grid-item-header"></div>
                            <span class="grid-item-title" style="color: blue"><?php echo $categories['content']; ?></span>
                            <div class="grid-item-body">
                                <p><span class="p-title">Categoría:</span><span class="p-content"><?php echo $categories['maincategory']; ?></span></p>
                                <p><span class="p-title">Subcategoría:</span><span class="p-content"><?php echo $categories['category']; ?></span></p>
                            </div>
                        </div> 
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
<script>
    // Código JavaScript aquí
</script>
<?php
    // Código PHP aquí
?>
<?php 
    function getRandomLightColor() {
        $red = rand(200, 255);
        $green = rand(200, 255);
        $blue = rand(200, 255);
        return sprintf("#%02x%02x%02x", $red, $green, $blue);
    }
?>
</html>