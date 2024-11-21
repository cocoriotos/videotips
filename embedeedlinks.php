

<?php
session_start();
$videoUrl = $_SESSION['videoUrl'];
$embedUrl = $_SESSION['embedUrl'];

echo $embedUrl = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $videoUrl);

?>
