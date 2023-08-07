<?php 

$hostname =     '127.0.0.1:3306';
$username ='root';
$password = 'emely430615';
$database = 'CITAS_MEDICAS';



try {
    $mbd = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
