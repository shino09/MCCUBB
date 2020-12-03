<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ficha Alumno</title>
<style>
 
 body {
  font: normal medium/1.4 sans-serif;
}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  padding: 0.25rem;
  text-align: left;
  border: 1px solid #ccc;
}
tbody tr:nth-child(odd) {
  background: #eee;
}


</style>
    
</head>
<body>

              <div style="text-align: right"><img src="images/logoubbface.png" width="120" /></div>



                  <h2 align="center" class="box-title">Ficha Alumno</h2>
               



<table class="table table-bordered table-striped">
    
    <tbody>


                  <?php foreach($alumno as $alu){ ?>

                        <?php if (($alu->id)==($id)) { ?>  

     
<tr>
 <th align="left"> Rut:  </th><td align="left" colspan="5" >    <?php echo $alu->id; ?>  </td>
          </tr>




   <tr>
     




  <th align="left">Nombre:  </th><td align="left" colspan="5">    <?php echo $alu->ALU_NOMBRES; ?> 
          

   <?php echo $alu->ALU_PATERNO; ?>  
          
 

    <?php echo $alu->ALU_MATERNO; ?>  
          </td>
          </tr>





  <tr>

 <th align="left">Año Ingreso:  </th><td align="left" colspan="5">  <?php echo $alu->ALU_ANOINGRESO; ?>  </td>
          </tr>





   <tr>
     
  

                                             
                                           <th align="left">Estado:  </th><td align="left" colspan="5">      <?php if ((0)==($alu->ALU_ESTADO))       
                                                     {echo "Vigente";  }

if ((1)==($alu->ALU_ESTADO))              
    {echo "Retiro Temporal";  }
  
 if ((2)==($alu->ALU_ESTADO))               

   { echo "Egresado"; }

 
  if ((3)==($alu->ALU_ESTADO)) 
    {echo "Titulado"; }

 
  if ((4)==($alu->ALU_ESTADO))               

   { echo "Perdida de carrera";  }
 
   if ((5)==($alu->ALU_ESTADO))                

   { echo "Tesis";  }

  ?>
      
  
  
</td>
          </tr>
  

   <tr>

 <th align="left">Titulo:  </th><td align="left" colspan="5"> <?php echo $alu->ALU_TITULO; ?>  
          
 
</td>
          </tr>


 <tr>


  <th align="left">Grado:  </th><td align="left" colspan="5">  <?php echo $alu->ALU_GRADO; ?>  </td>
          </tr>



 <tr>




<th align="left"> Universidad Egreso:  </th><td align="left" colspan="5"> 


                  <?php foreach($universidads as $uni){ ?>


<?php if (($uni->id)==($alu->UNIVERSIDAD_id)) { ?>               

  <?php echo $uni->UNI_NOMBRE; break; ?>

  <?php } ?>



  

  <?php } ?>


</td>
          </tr>

           <tr>

 <th align="left">Puntaje:  </th><td align="left" colspan="5">  <?php echo $alu->ALU_PUNTAJE; ?>  </td>
          </tr>



   <tr>

 <th align="left">Email:  </th><td align="left" colspan="5">  <?php echo $alu->ALU_EMAIL; ?>  </td>
          </tr>




 <tr>
 
 

<th align="left">Telefono:  </th><td align="left" colspan="5">   <?php echo $alu->ALU_TELEFONO; ?>  
          
 </td>
          </tr>





  

  

 
  





   
<?php $cont=0;?>

          <?php foreach($tesis as $tes){ ?>
 
<?php if (($tes->ALUMNO_id)==($alu->id)) { ?> 
<?php $cont=$cont+1;?>


 <tr>
 <th colspan="1" scope="col">   <?php if ($cont==1) { ?>   <?php echo "Tesis"  ?>:  
 <?php } ?> 

  </th>
      <td colspan="4" scope="col">
  <?php echo $tes->TES_NOMBRE;  ?>  
  </td>
      <td colspan="1" scope="col" style="font-size:11px">  
  <?php echo $tes->TES_ANO;  ?> -<?php echo $tes->TES_SEMESTRE;  ?>
</td>


    </tr>
  <?php } ?>



  <?php } ?> 
 




<?php $contguia=0;?>

          <?php foreach($tesis as $tes){ ?>
 
<?php if (($tes->ALUMNO_id)==($alu->id)) { ?> 
       <?php foreach($dirige as $dir){ ?>
 
<?php if (($tes->id)==($dir->id)) { ?> 


 <?php foreach($nucleo as $nuc){ ?>
 
<?php if (($nuc->id)==($dir->NUCLEO_id)) { ?> 
       <?php foreach($profesor as $pro){ ?>
 
<?php if (($nuc->id)==($pro->id)) { ?> 
<?php $contguia=$contguia+1;?>


 <tr>
 <th colspan="1" scope="col">  <?php if ($contguia==1) { ?>   <?php echo "Profesor Guia"  ?>:  
 <?php } ?>

  </th>
   <td colspan="1" scope="col">
  <?php echo $pro->PRO_NOMBRES;  ?>    <?php echo $pro->PRO_PATERNO;  ?>    <?php echo $pro->PRO_MATERNO;  ?>  


  </td>
      <td colspan="3" scope="col">
  <?php echo $tes->TES_NOMBRE;  ?>  
  </td>
      <td colspan="1" scope="col" style="font-size:11px">  
  <?php echo $tes->TES_ANO;  ?> -<?php echo $tes->TES_SEMESTRE;  ?>
</td>


    </tr>
  <?php } ?>



  <?php } ?> 


<?php } ?>

<?php } ?>


<?php } ?>



  <?php } ?> 
  <?php } ?> 

  <?php } ?> 










<?php $contcodirige=0;?>

          <?php foreach($tesis as $tes){ ?>
 
<?php if (($tes->ALUMNO_id)==($alu->id)) { ?> 
       <?php foreach($codirige as $codir){ ?>
 
<?php if (($tes->id)==($codir->id)) { ?> 


       <?php foreach($profesor as $pro){ ?>
 
<?php if (($codir->PROFESOR_id)==($pro->id)) { ?> 
<?php $contcodirige=$contcodirige+1;?>

 <tr>
 <th colspan="1" scope="col">  <?php if ($contcodirige==1) { ?>   <?php echo "Profesor Codirige"  ?>:  
 <?php } ?>

  </th>
   <td colspan="1" scope="col">
  <?php echo $pro->PRO_NOMBRES;  ?>    <?php echo $pro->PRO_PATERNO;  ?>    <?php echo $pro->PRO_MATERNO;  ?>  


  </td>
      <td colspan="3" scope="col">
  <?php echo $tes->TES_NOMBRE;  ?>  
  </td>
      <td colspan="1" scope="col" style="font-size:11px">  
  <?php echo $tes->TES_ANO;  ?> -<?php echo $tes->TES_SEMESTRE;  ?>
</td>


    </tr>
  <?php } ?>



  <?php } ?> 


<?php } ?>

<?php } ?>


<?php } ?>


  <?php } ?> 









<?php $contorienta=0;?>

  
       <?php foreach($orienta as $ori){ ?>
 
<?php if (($alu->id)==($ori->ALUMNO_id)) { ?> 


       <?php foreach($profesor as $pro){ ?>
 
<?php if (($ori->id)==($pro->id)) { ?> 
<?php $contorienta=$contorienta+1;?>

 <tr>
 <th colspan="1" scope="col"> <?php if ($contorienta==1) { ?>   <?php echo "Profesor Orienta"  ?>:  
 <?php } ?>

  </th>
   <td colspan="5" scope="col">
  <?php echo $pro->PRO_NOMBRES;  ?>    <?php echo $pro->PRO_PATERNO;  ?>    <?php echo $pro->PRO_MATERNO;  ?>  


  </td>
  


    </tr>
  <?php } ?>



  <?php } ?> 


<?php } ?>

<?php } ?>







  








<?php $contcongreso=0;?>

          <?php foreach($asiste as $asi){ ?>
 
<?php if (($asi->id)==($alu->id)) { ?> 
           <?php foreach($congreso as $con){ ?>
             <?php if (($asi->CONGRESO_id)==($con->id)) { ?> 
<?php $contcongreso=$contcongreso+1;?>


 <tr>
 <th colspan="1" scope="col">   <?php if ($contcongreso==1) { ?>   <?php echo "Congreso"  ?>:  
 <?php } ?> 

  </th>
      <td colspan="4" scope="col">
  <?php echo $con->CON_NOMBRE;  ?>  
  </td>
      <td colspan="1" scope="col" style="font-size:11px">  
  <?php echo $con->CON_ANO;  ?> 
</td>


    </tr>
  <?php } ?>
<?php } ?>

  <?php } ?> 


  <?php } ?> 




<?php $conttaller=0;?>

          <?php foreach($participa as $part){ ?>


<?php if (($part->id)==($alu->id)) { ?>  

                  <?php foreach($taller as $tall){ ?>
             <?php if (($part->TALLER_id)==($tall->id)) { ?>  
<?php $conttaller=$conttaller+1;?>


 <tr>
 <th colspan="1" scope="col">   <?php if ($conttaller==1) { ?>   <?php echo "Taller"  ?>:  
 <?php } ?> 

  </th>
      <td colspan="4" scope="col">
  <?php echo $tall->TAL_NOMBRE;  ?>  
  </td>
      <td colspan="1" scope="col" style="font-size:11px">  
  <?php echo $tall->TAL_ANO;  ?> 
</td>


    </tr>
  <?php } ?>
<?php } ?>

  <?php } ?> 


  <?php } ?> 

   


   


<?php $contsol=0;?>


   <?php foreach($presenta as $pre){ ?>


<?php if (($pre->id)==($alu->id)) { ?>  

                  <?php foreach($solicitud as $sol){ ?>
             <?php if (($pre->SOLICITUD_id)==($sol->id)) { ?>  

<?php $contsol=$contsol+1;?>

 <tr>
 <th colspan="1" scope="col">   <?php if ($contsol==1) { ?>   <?php echo "Solicitud"  ?>:  
 <?php } ?> 

  </th>
      <td colspan="4" scope="col">
  <?php echo $sol->SOL_NOMBRE;  ?>  
  </td>
      <td colspan="1" scope="col" style="font-size:11px">  
  <?php echo $sol->SOL_ANO;  ?>-<?php echo $sol->SOL_SEMESTRE;  ?> 

</td>


    </tr>

  <?php } ?>

  <?php } ?>
    <?php } ?>

  <?php } ?>




<?php $contrev=0;?>


 <?php foreach($publica as $pub){ ?>


<?php if (($pub->id)==($alu->id)) { ?>  

                  <?php foreach($revista as $rev){ ?>
             <?php if (($pub->REVISTA_id)==($rev->id)) { ?>  

<?php $contrev=$contrev+1;?>


 <tr>
 <th colspan="1" scope="col">   <?php if ($contrev==1) { ?>   <?php echo "Revista"  ?>:  
 <?php } ?> 

  </th>
      <td colspan="4" scope="col">
  <?php echo $rev->REV_NOMBRE;  ?>  
  </td>
      <td colspan="1" scope="col" style="font-size:11px">  
  <?php echo $rev->REV_ANO;  ?>

</td>


    </tr>

  <?php } ?>

  <?php } ?>
    <?php } ?>

  <?php } ?>





<?php $contben=0;?>

   <?php foreach($posee as $poo){ ?>


<?php if (($poo->id)==($alu->id)) { ?>  

                  <?php foreach($beneficio as $ben){ ?>
             <?php if (($poo->BENEFICIO_id)==($ben->id)) { ?>  

<?php $contben=$contben+1;?>

 <tr>
 <th colspan="1" scope="col">   <?php if ($contben==1) { ?>   <?php echo "Beneficio"  ?>:  
 <?php } ?> 

  </th>
      <td colspan="5" scope="col">
  <?php echo $ben->BEN_NOMBRE;  ?>  
  </td>
     


    </tr>

  <?php } ?>

  <?php } ?>
    <?php } ?>

  <?php } ?>


  
  <?php $conttra=0;?>

   <?php foreach($tiene as $tie){ ?>


<?php if (($tie->id)==($alu->id)) { ?>  

                  <?php foreach($trabajo as $tra){ ?>
             <?php if (($tie->TRABAJO_id)==($tra->id)) { ?>  

<?php $conttra=$conttra+1;?>

 <tr>
 <th colspan="1" scope="col">   <?php if ($conttra==1) { ?>   <?php echo "Trabajo"  ?>:  
 <?php } ?> 

  </th>
      <td colspan="4" scope="col">
  <?php echo $tra->TRA_NOMBRE;  ?>  
  </td>
      <td colspan="1" scope="col" style="font-size:11px">  
  <?php echo $tra->TRA_EMPRESA;  ?>

</td>


    </tr>

  <?php } ?>

  <?php } ?>
    <?php } ?>

  <?php } ?>
 </tbody>
     </table>
     <br>

                       <h4 align="right" class="box-title">Fecha : <?=  $date; ?></h4>




    <?php } ?>
        <?php } ?>




     
<!-- /.box -->

             


  

</body>
</html>     
