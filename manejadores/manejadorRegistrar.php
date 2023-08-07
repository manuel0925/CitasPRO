<?php
require("../librerias/dbconexion.php");
session_start();
/*
if(!isset($_SESSION["DATOS_USUARIO"])){
    header("location:".url()."login.php");
}
*/

extract($_POST);
$pass=base64_decode($pass);


/*
echo "<pre>";
//echo $query;
print_r($pass);
echo "</pre>";

die();
*/

/*

<pre>Array
(
    [pass] => MTIzNDU2
    [email] => M@GMAIL.CONM
    [nombre] => ASS
    [apellido] => DD
    [cedula] => 00000000000
    [telefono] => 0000000000
    [fecha] => 2021-04-04
)
</pre>{"codigo":0,"mensaje":"cita modificado con exito"}

*/


$queryEMAIL = "SELECT U.CORREO
FROM USUARIO AS U
where CORREO ='$email'";

$resultadoCorreo = $mbd->query($queryEMAIL);

if (!$resultadoCorreo) {
    echo $query . "<br>";
    die("consulta correo invalida");
} else {

    $resultadoCorreo = $resultadoCorreo->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultadoCorreo) > 0) {
        $codigo = 2;



        $mensaje = 'correo ya se encuentra registrado';

        $response = ["mensaje" => 'correo ya se encuentra registrado', 'codigo' => 2];

        echo json_encode($response);
        return;
    }
}

$pass = password_hash(trim($pass), PASSWORD_BCRYPT);

$fecha=date("Y-m-d", strtotime($fecha) );

$query = "INSERT INTO `USUARIO`
(
`NOMBRE`,
`APELLIDO`,
`FECHA_NACIMIENTO`,
`CORREO`,
`CEDULA`,
`PASS`,
`TELEFONO`,
`PERFILES`)
VALUES
(
'$nombre',
'$apellido',
'$fecha',
'$email',
'$cedula',
'$pass',
'$telefono',
'4');";

$codigo;
$mensaje;

$reponse;

$resultado = $mbd->query($query);

if (!$resultado) {
    echo $query . "<br>";
    die("consulta invalida");
} else {
    $codigo = 0;
    $mensaje = "usuario agregador con exito modificado con exito";
    $response = ["codigo" => $codigo, "mensaje" => $mensaje];
}











//$test=["dd"=>"sdsd","dds"=>"sdsd256"];

echo json_encode($response);
