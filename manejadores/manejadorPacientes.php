<?php
require("../librerias/dbconexion.php");
session_start();

/*
if(!isset($_SESSION["DATOS_USUARIO"])){
    header("location:".url()."login.php");
  }
  
*/


$query="SELECT C.ID,
C.FECHA,
C.HORA,
EC.NOMBRE AS ESTADO,
CONCAT(D.NOMBRE,' ',D.APELLIDO) AS DOCTOR,
E.NOMBRE AS ESPECIALIDAD
FROM CITAS AS C
JOIN ESTADO_CITAS AS EC ON C.ESTADO = EC.ID
JOIN DOCTOR AS D ON D.ID = C.DOCTOR
JOIN ESPECIALIDADES AS E ON E.ID = D.ESPECIALIDAD
where C.PACIENTE ='".$_SESSION['DATOS_USUARIO']['ID']."' and C.ESTADO <> '4' and C.ESTADO  <> '5';";

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