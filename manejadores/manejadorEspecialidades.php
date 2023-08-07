<?php
require("../librerias/dbconexion.php");
session_start();
/*
if(!isset($_SESSION["DATOS_USUARIO"])){
    header("location:".url()."login.php");
  }
  
*/


$query="SELECT E.ID,E.NOMBRE FROM ESPECIALIDADES AS E;";

$codigo;
$mensaje;

$reponse;

$resultado=$mbd->query($query);

if(!$resultado){
    echo $query ."<br>";
    die( "consulta invalida") ;
}else{
    $resultado=$resultado->fetchAll(PDO::FETCH_ASSOC);
    
    $datos=$resultado;
    
}










/*

echo "<pre>";
echo $query;
print_r($_SESSION);
echo "</pre>";

*/
//$test=["dd"=>"sdsd","dds"=>"sdsd256"];
 
echo json_encode($datos);

?>