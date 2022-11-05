<?php
   include "Generales/database.php";
   session_start();
   $usutecnico = $_SESSION['usutecnicoid'];
   $administrador = $_SESSION['administrador'];
   
   $query1="select B.id as norden,A.ite_indice as nitem,A.id as iditem,B.sol_fecha as fecha,C.ter_tercero as cliente,";
   $query1=$query1."D.tip_detalles as equipo,E.ter_tercero as tecnico,A.ite_estado as idestado ";
   $query1=$query1."from ser_itemservicio A left join ser_solicitudservicio B on B.id=A.solicitudid ";
   $query1=$query1."left join gnr_tercero C on C.id=B.clienteid left join ser_tecnicos F on F.id=A.tecnicoid ";
   $query1=$query1."left join gnr_tercero E on E.id=F.terceroid left join ser_tipoequipos D on D.id=A.tipoequipoid ";
   if($administrador==1){
      $query1=$query1."where A.ite_anulado=0 order by B.sol_fecha desc";
   } else {
      $query1=$query1."where A.ite_anulado=0 and A.tecnicoid='$usutecnico' order by B.sol_fecha desc";
   }
   $result = mysqli_query($conexion, $query1);
   $json = array();
   while($row = mysqli_fetch_array($result)) {
      $ides=$row['idestado'];
      $estado="Pendiente";
      $tecnico=$row['tecnico'];
      if(is_null($row['tecnico'])) $tecnico="";
      if($ides==1) $estado="Pendiente";
      if($ides==2) $estado="Asignado";
      if($ides==3) $estado="Cerrado";

      $json[] = array(
         'id'=>$row['iditem'],
         'cliente'=>$row['cliente'],
         'tecnico'=>$tecnico,
         'equipo'=>$row['equipo'],
         'orden'=>$row['norden'],
         'nitem'=>$row['nitem'],
         'idestado'=>$row['idestado'],
         'fecha'=>$row['fecha'],
         'nestado'=>$estado
       );
   }
   $jsonstring = json_encode($json);
   echo $jsonstring;
?>   