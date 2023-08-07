<?php
require("../librerias/librerias.php");
require("../librerias/dbconexion.php");
session_start();


  if(session_destroy()){

    echo json_encode(array("codigo"=>"0","mensaje"=>"cerrando sesion"));

   
  };



?>