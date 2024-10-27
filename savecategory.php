<?php 
session_start();
include "db_connection1.php";

$local_username = $_SESSION['email'];
$maincategory = $_POST["maincategory"];
$category = $_POST["category"];
/*
// Consulta para obtener el categorycounter oldFine
$query = "SELECT categorycounter FROM videotips_app_access_list WHERE username = $local_username";
$categorycounter= $conn ->query($query);

// Consulta para obtener el extendcounterfeature
$query4 = "SELECT extendcounterfeature FROM videotips_app_access_list WHERE username = $local_username";
$extendcounterfeature= $conn ->query($query4);

// Consulta para identificar si hay dupliidad de subcategiría
$query6 = "SELECT category FROM videotips_viodetipscategory WHERE category = $category and username = $local_username";
$categoryresult= $conn ->query($query6);


  
// Verificación y lógica basada en el valor de categorycounter
if ($categorycounter > 4 && $extendcounterfeature === 0) {
                echo "You have reached the 5 free subcategories registration limit. To continue adding more, please check our plans.";
                $_SESSION['message'] = 'Subcategories not saved Successfully';
                $_SESSION['message_type'] = 'No Success';
                header("refresh:7; url=addcategory.php");
                exit(); // Importante para detener la ejecución después de redirigir
}

if ($categorycounter <= 4) || $categorycounter > 4 && $extendcounterfeature === 1))  {
                // Inserta la nueva categoría y maincategory
                $query1 = "INSERT INTO videotips_viodetipscategory (maincategory, category, username) VALUES ($maincategory, $category, $local_username)";
                $resultado1= $conn ->query($query1);

                $query2 = "INSERT INTO videotips_maincategory (maincategory, username) VALUES ($maincategory, $local_username)";
                $resultado2= $conn ->query($query2);
                echo "";
                // Si la primera inserción fue exitosa, actualiza el categorycounter
               if ($resultado1) {
                    $query3 = "UPDATE videotips_app_access_list SET categorycounter = categorycounter + 1 WHERE username = $local_username";
                    $resultado20= $conn ->query($query3);
                    
                    echo "Category Saved";
                    $_SESSION['message'] = 'Category Saved Successfully';
                    $_SESSION['message_type'] = 'Success';
                    header("refresh:7; url=addcategory.php");
                    exit(); // Importante para detener la ejecución después de redirigir
                }else{
                  echo "Otro error";
                  header("refresh:7; url=addcategory.php");
                }
            }
            echo "Otro error";
            header("refresh:7; url=addcategory.php");        

            <?php */
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
            
            header("refresh:7; url=addcategory.php");
            exit();
?>