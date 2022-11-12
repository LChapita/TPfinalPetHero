<?php
require "Config/Config.php";
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
<<<<<<< HEAD

//echo "<img src=".$imagen.">";

//echo "<td><img src=".VIEWS_PATH. 'keepers/photos/golden.jpg'.">" ;
*/
=======
*/
//echo "<img src=".$imagen.">";

//echo "<td><img src=".VIEWS_PATH. 'keepers/photos/golden.jpg'.">" ;

>>>>>>> 66fdbbf9cfa9375778d30b72a69990e24ea97fca

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
<<<<<<< HEAD

=======
>>>>>>> 66fdbbf9cfa9375778d30b72a69990e24ea97fca
for ($i = $start; $i <= $finish; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
    array_push($fechasKeeper,$i);
}
for ($i = $reservStart; $i <= $reservFinish; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
    array_push($reservas, $i);
}

echo "<br>";
<<<<<<< HEAD
foreach($fechasKeeper as $value){
=======
/*foreach($fechasKeeper as $value){
>>>>>>> 66fdbbf9cfa9375778d30b72a69990e24ea97fca
    echo "<br>".$value;
}
echo "<br>";
foreach ($reservas as $value) {
    echo "<br>" . $value;
}
echo "<br>";
<<<<<<< HEAD


/*
$reservStart2= date("Y-m-d", strtotime("2022/11/02"));
$reservFinish2 = date("Y-m-d", strtotime("2022/11/04"));
$reservas2 = array();

for ($i = $reservStart2; $i <= $reservFinish2; $i = date("Y-m-d",strtotime($i . "+ 1 days")))
{
    array_push($reservas2, $i);
}

foreach ($reservas2 as $value) {
    echo "<br>" . $value;
}
echo "<br>";
foreach($reservas2 as $value)
{
    array_push($reservas,$value);
}
*/
sort($reservas);
/*
foreach ($reservas as $value) {
    echo "<br>" . $value;
}*/

$reservasKeepers=array_diff($fechasKeeper,$reservas); ///la mejor de todas
echo "<br>";

echo "<select name='fechas'>". "fechas disponibles";
foreach ($reservasKeepers as $value) {
    
    echo "<option value='" . $value."'>".$value."</option>";
}
echo "</select>";
/*
echo "<br>";
echo "<input type='date'";
echo "min='".print_r(array_values($reservas2))."'";
echo "max='" . print_r(array_values($reservas2)) . "'";
echo ">";
*/
/*
$textos = array("Hola", "Chau", "Bien", "Mal");

echo "Borrando la palabra 'Chau' dentro del array:<br>";
if (($clave = array_search("Chau", $textos)) !== false) {
    unset($textos[$clave]);
    print_r($textos);
}
var_dump($textos);
*/
//echo "<br>".$reservStart;
//echo $dateStart;
//echo $dateFinish;

=======
*/

$reservasKeepers=array();

foreach($fechasKeeper as $valueK){
    foreach($reservas as $valueR){
        if($valueK !=$valueR){
            array_push($reservasKeepers,);
        }
    }
}
//echo "<br>".$reservStart;
//echo $dateStart;
//echo $dateFinish;
>>>>>>> 66fdbbf9cfa9375778d30b72a69990e24ea97fca
?>