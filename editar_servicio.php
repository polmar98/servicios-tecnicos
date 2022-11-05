<?php
   include "Generales/cabecera.php";
   include "Generales/database.php";
   if(!isset($_GET['iditem'])){
      header("Location:index.php");
   }
   $iditem=$_GET['iditem'];
   $query1="select A.*,B.tip_detalles as equipo,C.mar_detalles as marca,E.ter_tercero as tecnico,F.con_detalles ";
   $query1=$query1."from ser_itemservicio A left join ser_tipoequipos B ";
   $query1=$query1."on B.id=A.tipoequipoid left join ser_marcas C on C.id=A.marcaid ";
   $query1=$query1."left join ser_tecnicos D on D.id=A.tecnicoid left join gnr_tercero E ";
   $query1=$query1."on E.id=D.terceroid left join ser_conceptos F on F.id=A.conceptoid where A.id='$iditem' ";
   $result = mysqli_query($conexion, $query1);
   $row = mysqli_fetch_array($result);
   $idsoli=$row['solicitudid'];
   $query2 = "select B.ter_tercero as cliente,A.* from ser_solicitudservicio A left join gnr_tercero B ";
   $query2 = $query2."on B.id=A.clienteid where A.id='$idsoli' ";
   $result2 = mysqli_query($conexion, $query2);
   $row2 = mysqli_fetch_array($result2);
   $query3="select * from ser_conceptos order by con_detalles";
   $result3 = mysqli_query($conexion, $query3);
   $query4="select * from ser_marcas order by mar_detalles";
   $result4 = mysqli_query($conexion, $query4);
   $query5="select * from ser_tiposervicio order by tip_detalles";
   $result5 = mysqli_query($conexion, $query5);  
?>
<div class="container p-2">
<div class="row">
     <div class="col-md-5">
        <table class="table table-striped table-sm ">
         <?php
         echo "<tr><td>Orden #</td><td>".$row['solicitudid']."</td></tr>";         
         echo "<tr><td>Item #</td><td>".$row['ite_indice']."</td></tr>";          
         echo "<tr><td>Fecha</td><td>".$row2['sol_fecha']."</td></tr> ";         
         echo "<tr><td>Cliente</td><td>".$row2['cliente']."</td></tr> ";         
         echo "<tr><td>Direccion</td><td>".$row2['sol_direccion']."</td></tr> ";         
         echo "<tr><td>Telefono</td><td>".$row2['sol_telefono']."</td></tr> ";         
         echo "<tr><td>Celular</td><td>".$row2['sol_celular']."</td></tr> ";         
         echo "<tr><td>Contacto</td><td>".$row2['sol_solicitante']."</td></tr>";         
         echo "<tr><td>Sede</td><td>".$row2['sol_sede']."</td></tr> ";  

         $vservicio=number_format($row['ite_valorservicio'],0,'.',','); 
         $vrepuestos=number_format($row['ite_repuestos'],0,'.',','); 
         $valo=$row['ite_valorservicio']+$row['ite_repuestos'];
         $vtotal=number_format($valo,0,'.',','); 
         
         echo "<tr><td>Valor Servicio</td><td>".$vservicio."</td></tr> ";   
         echo "<tr><td>Valor Repuestos</td><td>".$vrepuestos."</td></tr> ";   
         echo "<tr><td>Valor Total</td><td>".$vtotal."</td></tr> ";   
        ?>      
        </table>
    </div>
    <div class="col-md-7">
        <form action="actualiza_orden.php" method="POST">
         <?php
         echo '<input type="hidden" name="iditemser" value="'.$iditem.'">';
         echo '<table class="table table-striped table-sm ">';
         echo "<tr><td>Equipo</td><td>".$row['equipo']."</td></tr>";         
         echo "<tr><td>Marca</td>";
         echo '<td><select name="idmarca">';
             while($row4 = mysqli_fetch_array($result4)){
               $idmar = $row4['id'];
               $detam = $row4['mar_detalles'];
               if($idmar==$row['marcaid']) {
                  echo '<option value="'.$idmar.'" selected>'.$detam.'</option>';
               } else {
                  echo '<option value="'.$idmar.'">'.$detam.'</option>';
               }
             }
         echo '</select></td></tr>';        
         echo "<tr><td>Serie</td><td><input type='text' name='modelo' value='".$row['ite_modelo']."'></td></tr>";          
         echo "<tr><td>Tipo Servicio</td>"; 
         echo '<td><select name="idtiposer">';
         while($row5 = mysqli_fetch_array($result5)){
           $idtser = $row5['id'];
           $detats = $row5['tip_detalles'];
           if($idtser==$row['tiposervicio']) {
              echo '<option value="'.$idtser.'" selected>'.$detats.'</option>';
           } else {
              echo '<option value="'.$idtser.'">'.$detats.'</option>';
           }
         }
         echo '</select></td></tr>';                 
         
         echo "<tr><td>Asunto</td>";
         echo '<td><select name="idasunto">';
             while($row3 = mysqli_fetch_array($result3)){
               $idasu = $row3['id'];
               $deta = $row3['con_detalles'];
               if($idasu==$row['conceptoid']) {
                  echo '<option value="'.$idasu.'" selected>'.$deta.'</option>';
               } else {
                  echo '<option value="'.$idasu.'">'.$deta.'</option>';
               }
             }
         echo '</select></td></tr>';
         
         echo "<tr><td>Tecnico</td><td>".$row['tecnico']."</td></tr>";          
         echo "<tr><td>Fecha Servicio</td><td><input type='date' name='fechaser' value='".$row['ite_fechaservicio']."'></td></tr>";          
         echo "<tr><td>Ubicacion</td><td><input type='text' name='ubica' value='".$row['ite_ubicacion']."'></td></tr>";          
         echo "<tr><td>Serie</td><td><input type='text' name='serie' value='".$row['ite_serie']."'></td></tr>";          
         echo "<tr><td>Fase</td><td><input type='text' name='fase' value='".$row['ite_fase']."'></td></tr>";          
         echo "<tr><td>Voltaje</td><td><input type='text' name='voltaje' value='".$row['ite_voltaje']."'></td></tr>";          
         echo "<tr><td>Amperaje</td><td><input type='text' name='ampera' value='".$row['ite_amperaje']."'></td></tr>";          
         echo "<tr><td>Capacidad</td><td><input type='text' name='capacidad' value='".$row['ite_capacidad']."'></td></tr>";          
         echo "<tr><td>Presion Alta</td><td><input type='text' name='presionA' value='".$row['ite_presionalta']."'></td></tr>";          
         echo "<tr><td>Presion Baja</td><td><input type='text' name='presionB' value='".$row['ite_presionbaja']."'></td></tr>";          
         echo "<tr><td>Compresion</td><td><input type='text' name='compresion' value='".$row['ite_compresion']."'></td></tr>";          
         echo "<tr><td>Amp. Motor. Condensadora</td><td><input type='text' name='amc' value='".$row['ite_amc']."'></td></tr>";          
         echo "<tr><td>Amp. Motor Blower</td><td><input type='text' name='amb' value='".$row['ite_amb']."'></td></tr>";          
         echo "<tr><td>Temp. Salida Manejadora</td><td><input type='text' name='tsm' value='".$row['ite_tsm']."'></td></tr>";          
        
         $obse = $row['ite_observaciones'];
         $infotec = $row['ite_infotecnico'];
         echo "<tr><td>Informe Tecnico</td><td>";
         echo '<textarea name="infotecnico" class="md-textarea form-control" rows="3">'.$infotec.'</textarea></td></tr>';
         echo "<tr><td>Observaciones</td><td>";
         echo '<textarea name="observa" class="md-textarea form-control" rows="3">'.$obse.'</textarea></td></tr>';
         echo "<tr><td>Tiempo Total (Min)</td><td><input type='number' name='tiempo' value='".$row['ite_tiempo']."'></td></tr>";          
         echo '<tr><td colspan="2"><button type="submit" class="btn btn-primary">Guardar Cambios</button></td></tr>';
         echo '</table>'; 
        ?>        
        </form>
    </div>    
</div>
</div>
<?php
   include "Generales/piepagina.php";
?>