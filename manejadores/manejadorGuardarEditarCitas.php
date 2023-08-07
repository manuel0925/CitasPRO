<?php
require("../librerias/dbconexion.php");
session_start();
/*
if(!isset($_SESSION["DATOS_USUARIO"])){
    header("location:".url()."login.php");
  }
  */

  
EXTRACT($_POST);
  $fecha=date("Y-m-d", strtotime($fecha) );
  
$query="UPDATE `CITAS`
SET
`DOCTOR` = '$doctor',
`FECHA` = '$fecha',
`HORA` = '$hora',
`ESTADO` ='$estado'
WHERE `ID` = '$id';";

$codigo;
$mensaje;

$reponse;

$resultado=$mbd->query($query);

if(!$resultado){
    echo $query ."<br>";
    die( "consulta invalida") ;
}else{
    $resultado=$resultado->fetchAll(PDO::FETCH_ASSOC);
    
    $codigo= 0;
    $mensaje="cita modificado con exito";
    $response=["codigo"=>$codigo,"mensaje"=>$mensaje];

    
}










/*

echo "<pre>";
echo $query;
print_r($_SESSION);
echo "</pre>";

*/
//$test=["dd"=>"sdsd","dds"=>"sdsd256"];
 
echo json_encode($response);

?>