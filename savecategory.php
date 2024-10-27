<?php 
            session_start();
            include "db_connection1.php";
            
            $local_username = $_SESSION['email'];
            $maincategory = $_POST["maincategory"];
            $category = $_POST["category"];
            
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
            echo "Subcategoy duplicated, please use another one.";
            header("refresh:7; url=addcategory.php");
            exit();
          }else{
            // Verificación y lógica
            if ($categorycounter > 4 && $extendcounterfeature == 0) {
                echo "You have reached the 5 free subcategories registration limit. To continue adding more, please check our plans.";
                $_SESSION['message'] = 'Subcategories not saved Successfully';
                $_SESSION['message_type'] = 'No Success';
                header("refresh:7; url=addcategory.php");
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
                    
                    echo "Category Saved";
                    $_SESSION['message'] = 'Category Saved Successfully';
                    $_SESSION['message_type'] = 'Success';
                } else {
                    echo "Error en la inserción de la categoría: " . mysqli_error($conn);
                }
            }
          }  
?>