<?php
require("../librerias/dbconexion.php");
session_start();
/*
if(!isset($_SESSION["DATOS_USUARIO"])){
    header("location:".url()."login.php");
  }
  
*/
EXTRACT($_POST);

$query="SELECT C.ID,
C.FECHA,
C.HORA,
EC.NOMBRE AS ESTADO,
C.DOCTOR AS ID_DOCTOR,
CONCAT(D.NOMBRE,' ',D.APELLIDO) AS DOCTOR,
E.NOMBRE AS ESPECIALIDAD,
E.ID AS ID_ESPECIALIDAD
FROM CITAS AS C
JOIN ESTADO_CITAS AS EC ON C.ESTADO = EC.ID
JOIN DOCTOR AS D ON D.ID = C.DOCTOR
JOIN ESPECIALIDADES AS E ON E.ID = D.ESPECIALIDAD WHERE C.ID='$ID_CITA';";

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