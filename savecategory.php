<?php 
            session_start();
            include "db_connection1.php";

            $local_username = $_SESSION['email'];
            $maincategory = $_POST["maincategory"];
            $category = $_POST["category"];
            $savedcatalog = $_SESSION['savedcatalog'];
            
            // Uso de sentencias preparadas para obtener categorycounter
            $stmt = $conn->prepare("SELECT categorycounter FROM videotips_app_access_list WHERE username = ?");
            $stmt->bind_param("s", $local_username);
            $stmt->execute();
            $result = $stmt->get_result();
            $categorycounter = $result->fetch_assoc()['categorycounter'];
            
            // Similar para extendcounterfeature
            $stmt = $conn->prepare("SELECT extendcounterfeature FROM videotips_app_access_list WHERE username = ?");
            $stmt->bind_param("s", $local_username);
            $stmt->execute();
            $result = $stmt->get_result();
            $extendcounterfeature = $result->fetch_assoc()['extendcounterfeature'];
            
            // Consulta para verificar duplicidad
            $stmt = $conn->prepare("SELECT category FROM videotips_viodetipscategory WHERE category = ? AND username = ?");
            $stmt->bind_param("ss", $category, $local_username);
            $stmt->execute();
            $categoryresult = $stmt->get_result();
            
          if ($categoryresult->num_rows > 0){
            include("subcategoy_duplicated.php");
            header("refresh:0; url=addcategory.php");
            exit();
          }else{
            // Verificación y lógica
            if ($categorycounter > 4 && $extendcounterfeature == 0) {
              include("FreeSubcateryReached.php");
              header("refresh:0; url=addcategory.php");
                exit();
            }
            
            // Inserta la nueva categoría y maincategory si es posible
            if ($categorycounter <= 4 || ($categorycounter > 4 && $extendcounterfeature == 1)) {
                $stmt = $conn->prepare("INSERT INTO videotips_viodetipscategory (maincategory, category, username) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $maincategory, $category, $local_username);
                
                if ($stmt->execute()) {
                    $stmt = $conn->prepare("UPDATE videotips_app_access_list SET categorycounter = categorycounter + 1 WHERE username = ?");
                    $stmt->bind_param("s", $local_username);
                    $stmt->execute();
                    $_SESSION['savedcatalog']=1;
                    header("refresh:0; url=addcategory.php");
                    exit();

                } else {
                    $_SESSION['savedcatalog']=2;
                    header("refresh:0; url=addcategory.php");
                    exit();
                }
            }
          }  
?>