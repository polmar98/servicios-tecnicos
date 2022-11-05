<?php
   include "Generales/database.php";
   $query1="select B.*,A.id as idtecnico,A.tec_activo,A.tec_estado,A.tec_vinculacion from ser_tecnicos A ";
   $query1=$query1."left join gnr_tercero B on B.id=A.terceroid order by B.ter_tercero";
   $result = mysqli_query($conexion, $query1);
   $json = array();
   while($row = mysqli_fetch_array($result)) {
      $json[] = array(
         'id'=>$row['idtecnico'],
         'apellido1'=>$row['ter_apellido1'],
         'apellido2'=>$row['ter_apellido2'],
         'nombre1'=>$row['ter_nombre1'],
         'nombre2'=>$row['ter_nombre2'],
         'razon'=>$row['ter_tercero'],
         'documento'=>$row['ter_documento'],
         'direccion'=>$row['ter_direccion'],
         'telefono'=>$row['ter_telefono'],
         'email'=>$row['ter_email'],
         'activo'=>$row['tec_activo'],
         'estado'=>$row['tec_estado'],
         'vincula'=>$row['tec_vinculacion']
      );
   }
   $jsonstring = json_encode($json);
   echo $jsonstring;
?>   