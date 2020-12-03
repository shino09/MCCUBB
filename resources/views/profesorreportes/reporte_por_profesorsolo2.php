<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ficha Profesor</title>
<style>
 
 body {
  font: normal medium/1.4 sans-serif;
}
table {
  border-collapse: collapse;
  width: 100%;
  background-color: #f2f2f2;
}



th, td {
  padding: 0.25rem;
  text-align: left;
  border: 1px solid #ccc;
}

tr:nth-child(even) {
  background-color: white;
}



</style>
    
</head>
<body>

              <div style="text-align: right"><img src="images/logoubbface.png" width="150" /></div>



                  <h2 align="center" class="box-title">Ficha Profesor</h2>
               



<table class="table table-bordered table-striped">
    

                  <?php foreach($profesor as $PRO){ ?>

                        <?php if (($PRO->id)==($id)) { ?>  




  
  <tr>
 <th align="left" width="20%" > Rut:  </th><td align="left" colspan="5" >   <?php echo $PRO->id; ?>   </td>
          </tr>

     




   <tr>
 <th align="left" width="20%" >Nombre:  </th><td align="left" colspan="5" >   <?php echo $PRO->PRO_NOMBRES; ?> 
          

   <?php echo $PRO->PRO_PATERNO; ?>  
          
 

    <?php echo $PRO->PRO_MATERNO; ?>  
           </td>
          </tr>

 
 

 <tr>
 <th align="left">Telefono:  </th><td align="left" colspan="5" >  <?php echo $PRO->PRO_TELEFONO; ?>  
          
  </td>
          </tr>


  <tr>
 <th align="left">Titulo:  </th><td align="left" colspan="5" ><?php echo $PRO->PRO_TITULO; ?>  
          
 
 </td>
          </tr>

     
  

                            

  <tr>
 <th align="left">Email:  </th><td align="left" colspan="5" > <?php echo $PRO->PRO_EMAIL; ?>   </td>
          </tr>



   <tr>
 <th align="left">Grado:  </th><td align="left" colspan="5" > <?php echo $PRO->PRO_GRADO; ?>   </td>
          </tr>




      <tr>

 <th align="left">Departamento:  </th>

           <td align="left" colspan="5">
                  <?php foreach($departamento as $depa){ ?>


<?php if (($depa->id)==($PRO->DEPARTAMENTO_id)) { ?>               

    <?php echo $depa->DEP_NOMBRE; ?>

  <?php } ?>


  <?php } ?>
</td>

</tr>
      

                  <?php foreach($nucleo as $nuc){ ?>
                    <?php if ((($nuc->id)==($PRO->id))) { ?>               

 <tr>

 <th align="left">Tipo Profesor:  </th>

           <td align="left" colspan="5">
    <?php echo "Nucleo" ;?>

           </td>
           </tr>
  <?php } ?>

  <?php } ?>
    <?php foreach($director as $dir){ ?>
      <?php if ((($dir->id)==($PRO->id))) { ?>               

 <tr>

 <th align="left">Tipo Profesor:  </th>

           <td align="left" colspan="5">
    <?php echo "Director" ;?>

           </td>
           </tr>
  <?php } ?>

  <?php } ?>
   <?php foreach($visitante as $vis){ ?>
    <?php if ((($vis->id)==($PRO->id))) { ?>               

 <tr>

 <th align="left">Tipo Profesor:  </th>

           <td align="left" colspan="5">
    <?php echo "Visitante" ;?>

           </td>
           </tr>
  <?php } ?>

  <?php } ?>

 <?php foreach($colaborador as $col){ ?>
<?php if ((($col->id)==($PRO->id))) { ?>               



 <tr>

 <th align="left">Tipo Profesor:  </th>

           <td align="left" colspan="5">
    <?php echo "Colaborador" ;?>

           </td>
           </tr>
  <?php } ?>

  <?php } ?>





<?php $contvisitante=0;?>

           <?php foreach($visitante as $depa){ ?>


<?php if (($depa->id)==($PRO->id)) { ?>   
<?php $contvisitante=$contvisitante+1;?>


 <tr>
 <th colspan="1" scope="col" width="20%">   <?php if ($contvisitante==1) { ?>   <?php echo "Visitante Universidad"  ?>:  
 <?php } ?> 

  </th>
      <td colspan="4" scope="col" width="70%">
  <?php echo $depa->VIS_UNIVERSIDAD;  ?>  
  </td>
      <td colspan="1" scope="col" width="10%" >  
  <?php echo $depa->VIS_PAIS;  ?> 
</td>


    </tr>
  <?php } ?>



  <?php } ?> 



<?php $contorienta=0;?>

    

                  <?php foreach($orienta as $ori){ ?>
             <?php if (($PRO->id)==($ori->id)) { ?>  
            
<?php foreach($alumno as $alu){ ?>

             <?php if (($alu->id)==($ori->ALUMNO_id)) { ?> 

          

 <?php $contorienta=$contorienta+1;?>


  <tr>
 <th colspan="1" scope="col" width="20%">   <?php if ($contorienta==1) { ?>   <?php echo "Orienta Alumno"  ?>:  
 <?php } ?> 

  </th>
      <td colspan="5" scope="col" width="80%">
  <?php echo $alu->ALU_NOMBRES;  ?>    <?php echo $alu->ALU_PATERNO;  ?>    <?php echo $alu->ALU_MATERNO;  ?>  
 

 
</td>

    </tr>
  <?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
      



 <?php $contguia=0;?>

<?php foreach($nucleo as $nuc){ ?>
             <?php if (($nuc->id)==($PRO->id)) { ?>  

              <?php foreach($dirige as $dir){ ?>
             <?php if (($nuc->id)==($dir->NUCLEO_id)) { ?> 
 <?php foreach($tesis as $tes2){ ?>


<?php if (($tes2->id)==($dir->id)) { ?>  

                   
               
 <?php foreach($alumno as $alu){ ?>
             <?php if (($alu->id)==($tes2->ALUMNO_id)) { ?>  

  <?php $contguia=$contguia+1;?>

 <tr>
 <th colspan="1" scope="col" width="20%">   <?php if ($contguia==1) { ?>   <?php echo "Dirige Alumno"  ?>:  
 <?php } ?> 

  </th>
      <td colspan="1" scope="col" width="15%">
  <?php echo $alu->ALU_NOMBRES;  ?>    <?php echo $alu->ALU_PATERNO;  ?>    <?php echo $alu->ALU_MATERNO;  ?>  


  </td>
  <td colspan="3" scope="col" width="55%">
  <?php echo $tes2->TES_NOMBRE;  ?>  
  </td>
  

      <td colspan="1" scope="col" width="10%" style="font-size:12px">  
  <?php echo $tes2->TES_ANO;  ?>-<?php echo $tes2->TES_SEMESTRE;  ?> 
 
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



                  <?php foreach($codirige as $cod){ ?>
             <?php if (($PRO->id)==($cod->PROFESOR_id)) { ?>  
            


            <?php foreach($tesis as $tes){ ?>
             <?php if (($cod->id)==($tes->id)) { ?>  

  
<?php foreach($alumno as $alu){ ?>

             <?php if (($alu->id)==($tes->ALUMNO_id)) { ?> 
 <?php $contcodirige=$contcodirige+1;?>


 <tr>
 <th colspan="1" scope="col" width="20%">   <?php if ($contcodirige==1) { ?>   <?php echo "Codirige Alumno"  ?>:  
 <?php } ?> 

  </th>
      <td colspan="1" scope="col" width="15%">
  <?php echo $alu->ALU_NOMBRES;  ?>    <?php echo $alu->ALU_PATERNO;  ?>    <?php echo $alu->ALU_MATERNO;  ?>  


  </td>
  <td colspan="3" scope="col" width="55%">
  <?php echo $tes->TES_NOMBRE;  ?>  
  </td>
  

      <td colspan="1" scope="col" width="10%" style="font-size:12px">  
  <?php echo $tes->TES_ANO;  ?>-<?php echo $tes->TES_SEMESTRE;  ?> 
 
</td>


    </tr>
<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
 
 
 
 
 
    
 <?php $contevalua=0;?>


                  <?php foreach($conforman as $con){ ?>
             <?php if (($PRO->id)==($con->id)) { ?>  
            


            <?php foreach($tribunal as $tri){ ?>
             <?php if (($tri->id)==($con->TRIBUNAL_id)) { ?>  

      <?php foreach($evalua as $eva){ ?>
             <?php if (($tri->id)==($eva->TRIBUNAL_id)) { ?>  
            


            <?php foreach($tesis as $tes3){ ?>
             <?php if (($tes3->id)==($eva->id)) { ?> 




<?php foreach($alumno as $alu2){ ?>
             <?php if (($alu2->id)==($tes3->ALUMNO_id)) { ?>


  <?php $contevalua=$contevalua+1;?>





   <?php if ($contevalua==1) { ?><tr> <th colspan="1" scope="col" > <?php echo "Evalua Tesis"  ?>:    </th>  <td colspan="1" scope="col"  >
  <?php echo $alu2->ALU_NOMBRES;  ?>  <?php echo $alu2->ALU_PATERNO;  ?>  <?php echo $alu2->ALU_MATERNO;  ?>  

  </td>
      <td colspan="3" scope="col"  >
  <?php echo $tes3->TES_NOMBRE;  ?>  
  </td>
      <td colspan="1" scope="col" style="font-size:12px">  
  <?php echo $tes3->TES_ANO;  ?> -<?php echo $tes3->TES_SEMESTRE;  ?>
</td> </tr>

 <?php } ?>



  <?php if ($contevalua>1) { ?> <tr> <th colspan="1" scope="col" >   </th>  
<td colspan="1" scope="col" >
  <?php echo $alu2->ALU_NOMBRES;  ?>  <?php echo $alu2->ALU_PATERNO;  ?>  <?php echo $alu2->ALU_MATERNO;  ?>  

  </td>
      <td colspan="3" scope="col" >
  <?php echo $tes3->TES_NOMBRE;  ?>  
  </td>
      <td colspan="1" scope="col"  style="font-size:12px">  
  <?php echo $tes3->TES_ANO;  ?> -<?php echo $tes3->TES_SEMESTRE;  ?>
</td> </tr>
 <?php } ?>



 

              <?php }  ?> 

  <?php } ?>
<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>

  <?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
  
 

     </table>

     <br>

                       <h4 align="right" class="box-title">Fecha : <?=  $date; ?></h4>




    <?php } ?>

    <?php } ?>


     
<!-- /.box -->

             


  

</body>
</html>     
