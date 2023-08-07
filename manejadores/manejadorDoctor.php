<?php
require("../librerias/dbconexion.php");
session_start();
/*
if(!isset($_SESSION["DATOS_USUARIO"])){
    header("location:".url()."login.php");
  }
  
*/
extract($_POST);

$query="SELECT D.ID,CONCAT(D.NOMBRE,' ',D.APELLIDO) AS DOCTOR,D.ESPECIALIDAD AS ESPECIALIDAD FROM DOCTOR AS D
WHERE ESPECIALIDAD = '$especialidad'";

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