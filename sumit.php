<?php


//require "Config/Config.php";
/*
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
    ///validaciones de foto 


    $src = $carpeta . $name;
    move_uploaded_file($ruta_provicional, $src);
    $imagen ="fotos/" . $name;
}
*/
//echo "<img src=".$imagen.">";

//echo "<td><img src=".VIEWS_PATH. 'keepers/photos/golden.jpg'.">" ;

/*//
error_reporting(E_ALL ^ E_NOTICE);
$start = $_POST['start'];
$finish = $_POST['finish'];


echo "Date Start ".$start;
echo "<br>";
echo "Date Finish ".$finish;

$reservStart=date("Y-m-d", strtotime("2022/11/06"));
$reservFinish = date("Y-m-d", strtotime("2022/11/09"));

$fechasKeeper=array();
$reservas=array();
for ($i = $start; $i <= $finish; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
    array_push($fechasKeeper,$i);
}
for ($i = $reservStart; $i <= $reservFinish; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
    array_push($reservas, $i);
}

echo "<br>";
*/
/*foreach($fechasKeeper as $value){
    echo "<br>".$value;
}
echo "<br>";
foreach ($reservas as $value) {
    echo "<br>" . $value;
}
echo "<br>";
*/
/*
$reservasKeepers=array();

foreach($fechasKeeper as $valueK){
    foreach($reservas as $valueR){
        if($valueK !=$valueR){
            array_push($reservasKeepers,);
        }
    }
}
*/
//echo "<br>".$reservStart;
//echo $dateStart;
//echo $dateFinish;
?>