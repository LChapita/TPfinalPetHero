<?php
require "Config/Config.php";
var_dump($_FILES);

if (isset($_FILES["photo"])) {
    $file = $_FILES["photo"];
    $name = $file["name"];
    $tipo = $file["type"];
    $ruta_provicional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provicional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta ="fotos/";
    /*validaciones de foto */


    $src = $carpeta . $name;
    move_uploaded_file($ruta_provicional, $src);
    $imagen ="fotos/" . $name;
}

//echo "<img src=".$imagen.">";

echo "<td><img src=".VIEWS_PATH. 'keepers/photos/golden.jpg'.">" ;
?>