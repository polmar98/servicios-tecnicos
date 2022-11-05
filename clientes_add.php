<?php
   include "Generales/database.php";

   if(isset($_POST['apellidos'])) {
      $apellidos = $_POST['apellidos'];
      $nombres = $_POST['nombres'];
      $nit = $_POST['documento'];
      $direccion = $_POST['direccion'];
      $telefono = $_POST['telefono'];
      $email = $_POST['email'];
      $nom2 = '';
      $ape2 = '';
      $razon = trim($apellidos).' '.trim($nombres);
      $razon = trim($razon);
      $ciudad = 126;
      $xid = $_POST['xid'];

      if($xid==0) {
         //buscamos si ya existe en la base de datos
         $query1="select * from gnr_tercero where ter_documento='$nit' ";
         $result = mysqli_query($conexion, $query1);
         $row=mysqli_fetch_row($result);
         if($row==0) {
            //no existe  insertamos entonces el nuevo registro
            $query2="insert into gnr_tercero (ter_documento,ter_nombre1,ter_apellido1,ter_tercero,ter_telefono,ter_direccion,";
            $query2=$query2."ter_email,ter_idciudad) values('$nit','$nombres','$apellidos','$razon','$telefono','$direccion','$email','$ciudad')";
            $result2 = mysqli_query($conexion, $query2);
            if(!$result2) {
               echo 'Se ha producido un error al intentar grabar';
            }else {
              echo 'Nuevo Registro Grabado';
            }  
         }
      }else {
         //actualizamos el registro seleccionado
         $query1="update gnr_tercero set ter_documento='$nit',ter_apellido1='$apellidos',ter_nombre1='$nombres',ter_apellido2='$ape2',ter_nombre2='$nom2',";
         $query1=$query1."ter_tercero='$razon',ter_direccion='$direccion',ter_telefono='$telefono',ter_email='$email' where id='$xid'";
         $result2 = mysqli_query($conexion, $query1);
         if(!$result2) {
            echo 'Se ha producido un error al intentar grabar';
         }else {
           echo 'Registro Modificado';
         }     
      }

   }
?>