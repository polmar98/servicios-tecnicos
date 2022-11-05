<?php
   if(!isset($_POST['$iditemser'])){
      header("Location:index.php");
   }
   $iditem=$_POST['iditemser'];
   $ubica=$_POST['ubica'];
   $serie=$_POST['serie'];
   $fase=$_POST['fase'];
   $modelo=$_POST['modelo'];
   $voltaje=$_POST['voltaje'];
   $ampera=$_POST['ampera'];
   $capacidad=$_POST['capacidad'];
   $presionA=$_POST['presionA'];
   $presionB=$_POST['presionB'];
   $compresion=$_POST['compresion'];
   $amc=$_POST['amc'];
   $amb=$_POST['amb'];
   $tsm=$_POST['tsm'];
   $infotecnico=$_POST['infotecnico'];
   $observa=$_POST['observa'];
   $idmarca=$_POST['idmarca'];
   $idtiposer=$_POST['idtiposer'];
   $idasunto=$_POST['idasunto'];
   $fechaser=$_POST['fechaser'];
   $tiempo=$_POST['tiempo'];

   include "Generales/database.php";
   $query1="update ser_itemservicio set marcaid='$idmarca',ite_ubicacion='$ubica',tiposervicio='$idtiposer',";
   $query1=$query1."conceptoid='$idasunto',ite_infotecnico='$infotecnico',ite_fechaservicio='$fechaser',ite_modelo='$modelo',";
   $query1=$query1."ite_serie='$serie',ite_fase='$fase',ite_voltaje='$voltaje',ite_amperaje='$ampera',ite_capacidad='$capacidad',";
   $query1=$query1."ite_presionalta='$presionA',ite_presionbaja='$presionB',ite_compresion='$compresion',ite_amc='$amc',";
   $query1=$query1."ite_amb='$amb',ite_tsm='$tsm',ite_observaciones='$observa',ite_tiempo='$tiempo' where id='$iditem' ";
   $result = mysqli_query($conexion, $query1);
   if(!$result){
      header("Location:index.php");
   } else{
      header("Location:servicios_tecnicos.php");
   }
   
?>