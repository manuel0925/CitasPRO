<?php
require("../librerias/dbconexion.php");
session_start();
/*
if(!isset($_SESSION["DATOS_USUARIO"])){
    header("location:".url()."login.php");
  }
  
*/
extract($_POST);

$query="SELECT C.ID,
CONCAT(U.NOMBRE,' ',U.APELLIDO) AS NOMBRE_PACIENTE,
YEAR(CURDATE())-YEAR(U.`FECHA_NACIMIENTO`) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(U.`FECHA_NACIMIENTO`,'%m-%d'), 0 , -1 ) AS EDAD_ACTUAL,
U.TELEFONO,
U.CORREO,
U.CEDULA,
C.ESTADO,
C.HORA,
C.FECHA,
EC.NOMBRE AS NOMBRE_ESTADO
FROM CITAS AS C
JOIN USUARIO AS U ON C.PACIENTE = U.ID
JOIN ESTADO_CITAS AS EC ON EC.ID = C.ESTADO
WHERE C.DOCTOR = '".$_SESSION['DATOS_USUARIO']['ID_DOCTOR']."' AND C.ESTADO = '3'";



$codigo;
$mensaje;

$reponse;

$resultado=$mbd->query($query);

if(!$resultado){
    echo $query ."<br>";
    die( "consulta invalida") ;
}else{
    $resultado=$resultado->fetchAll(PDO::FETCH_ASSOC);
    
    $datos['data']=$resultado;
    
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