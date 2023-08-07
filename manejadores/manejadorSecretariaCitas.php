<?php
require("../librerias/dbconexion.php");
session_start();

/*
if(!isset($_SESSION["DATOS_USUARIO"])){
    header("location:".url()."login.php");
  }
  
*/


$query="SELECT C.ID AS ID,
C.FECHA,
C.HORA,
C.PACIENTE,
CONCAT(U.NOMBRE,' ',U.APELLIDO) AS NOMBRE_PACIENTE,
U.CORREO,
U.TELEFONO,
EC.NOMBRE AS NOMBRE_ESTADO,
EC.ID AS ID_ESTADO,
#(SELECT group_concat(CONCAT(ID,'|',NOMBRE)) FROM ESTADO_CITAS) AS LISTA_ESTADOS,
CONCAT(D.NOMBRE,' ',D.APELLIDO) AS DOCTOR,
E.NOMBRE AS ESPECIALIDAD
FROM CITAS AS C
JOIN ESTADO_CITAS AS EC ON C.ESTADO = EC.ID
JOIN DOCTOR AS D ON D.ID = C.DOCTOR
JOIN ESPECIALIDADES AS E ON E.ID = D.ESPECIALIDAD
JOIN USUARIO AS U ON C.PACIENTE=U.ID
;";

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