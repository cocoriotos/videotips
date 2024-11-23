

<?php
session_start();
$videoUrl = $_SESSION['videoUrl'];
$embedUrl = $_SESSION['embedUrl'];
$click = $_SESSION['click'];

if ($click===1){

echo $embedUrl = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $videoUrl);
$click = 0;
}else{
    echo "No Disponible";
    $click = 0;
}
?>
