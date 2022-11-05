<?php
   $server = "127.0.0.1";
   $user = "ingreso";
   $clave = "gghBP3JpG0";
   $puerto = "3310";
   $dbase = "servicios";
   $conexion = new mysqli($server, $user, $clave, $dbase, $puerto);
   $conexion->set_charset("utf8");
?>