<?php
require("../librerias/dbconexion.php");

/*
if(isset($_SESSION["DATOS_USUARIO"])){
    header("location:".url()."login.php");
  }
  */
extract($_POST);

$codigo;
$mensaje;

$reponse;


$query = "SELECT U.ID,
  U.FECHA_NACIMIENTO AS NACIMIENTO,
  YEAR(CURDATE())-YEAR(U.FECHA_NACIMIENTO) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(U.FECHA_NACIMIENTO,'%m-%d'), 0 , -1 ) AS EDAD_ACTUAL,
  U.CORREO AS CORREO,
  U.PASS AS PASS,
  U.PERFILES AS ID_PERFIL,
  CONCAT(U.NOMBRE,' ',U.APELLIDO) AS NOMBRE,
  P.NOMBRE AS NOMBRE_PERFIL,
  U.ID_DOCTOR
  FROM USUARIO AS U
  JOIN PERFILES AS P ON U.PERFILES = P.ID
  where CORREO ='$email'";

$resultado = $mbd->query($query);

if (!$resultado) {
    echo $query . "<br>";
    die("consulta invalida");
} else {
    $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
}


if (password_verify(base64_decode($pass), $resultado[0]["PASS"]) and count($resultado) > 0 ) {
    $codigo = 0;
    session_start();

    foreach ($resultado[0] as $key => $value) {
        $_SESSION["DATOS_USUARIO"][$key] = $value;
    }
    $mensaje = 'usuario logueado con exito';

    $response = ["mensaje" => 'usuario logueado con exito', 'codigo' => 0, "nombre_perfil" => $_SESSION["DATOS_USUARIO"]["NOMBRE_PERFIL"], "id_perfil" => $_SESSION["DATOS_USUARIO"]["ID_PERFIL"]];
}else {
    $response = ["mensaje" => 'usuario o contraña erronea', 'codigo' => 13];
}



echo json_encode($response);
