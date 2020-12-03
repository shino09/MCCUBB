<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Listado de  Profesores</title>
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

         
     <?php $i=0; ?>


<?php $i++; ?>
 Pagina: <?php echo $i; ?>

  <div style="text-align: right"><img src="images/logoubbface.png" width="120" /></div>



                  <h2 align="center" class="box-title">Listado de Profesores</h2>

<table class="table table-bordered table-striped">
    
    <tbody>

       <tr>



       <th align="left">N°</th>
  <th align="left">Profesor:</th><th align="left">Tipo Profesor:  </th> <th align="left">Dirige:</th> <th align="left">Codirige:  </th> <th align="left">Evalua:  </th><th align="left">Orienta:  </th><th align="left">Universidad:  </th>

</tr>

  <?php $c=0; ?>


                  <?php foreach($profesor as $PRO){ ?>
                  

 
<?php $c++; ?>








   <tr>

    <td align="left" ><?php echo $c; ?></td>

<td align="left" >   <?php echo $PRO->PRO_NOMBRES; ?> 
          

   <?php echo $PRO->PRO_PATERNO; ?>  
          
 

    <?php echo $PRO->PRO_MATERNO; ?>  
           </td>

 
 


                 <td align="left" >


                  <?php foreach($nucleo as $nuc){ ?>
                    <?php if ((($nuc->id)==($PRO->id))) { ?>               



    <?php echo "Nucleo" ;?>

  <?php } ?>

  <?php } ?>
    <?php foreach($director as $dir){ ?>
      <?php if ((($dir->id)==($PRO->id))) { ?>               


 
    <?php echo "Director" ;?>

         
  <?php } ?>

  <?php } ?>
   <?php foreach($visitante as $vis){ ?>
    <?php if ((($vis->id)==($PRO->id))) { ?>               

 
    <?php echo "Visitante" ;?>

           
  <?php } ?>

  <?php } ?>

 <?php foreach($colaborador as $col){ ?>
<?php if ((($col->id)==($PRO->id))) { ?>               



 
    <?php echo "Colaborador" ;?>

          
  <?php } ?>

  <?php } ?>

           </td>


 


<td align="left">

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

 
<?php echo $contguia;?>- &nbsp;&nbsp; 

  <?php echo $alu->ALU_NOMBRES;  ?> &nbsp;&nbsp;     <?php echo $alu->ALU_PATERNO;  ?>  &nbsp;&nbsp;    <?php echo $alu->ALU_MATERNO;  ?>  &nbsp;&nbsp;  (


 
  <?php echo $tes2->TES_NOMBRE;  ?> ) &nbsp;&nbsp;  (
  

  <?php echo $tes2->TES_ANO;  ?>-<?php echo $tes2->TES_SEMESTRE;  ?> )
  <br>
 


<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
    <?php } ?>

  <?php } ?>

 

</td>

<td align="left">


 <?php $contcodirige=0;?>



                  <?php foreach($codirige as $cod){ ?>
             <?php if (($PRO->id)==($cod->PROFESOR_id)) { ?>  
            


            <?php foreach($tesis as $tes){ ?>
             <?php if (($cod->id)==($tes->id)) { ?>  

  
<?php foreach($alumno as $alu){ ?>

             <?php if (($alu->id)==($tes->ALUMNO_id)) { ?> 
 <?php $contcodirige=$contcodirige+1;?>

<?php echo $contcodirige;?>- &nbsp;&nbsp; 

  <?php echo $alu->ALU_NOMBRES;  ?>   &nbsp;&nbsp;   <?php echo $alu->ALU_PATERNO;  ?>  &nbsp;&nbsp;    <?php echo $alu->ALU_MATERNO;  ?>  &nbsp;&nbsp;  (


  
  <?php echo $tes->TES_NOMBRE;  ?>  )&nbsp;&nbsp;  (
  

  <?php echo $tes->TES_ANO;  ?>-<?php echo $tes->TES_SEMESTRE;  ?> )
  <br>
 

<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
 
 

 </td>
 
 <td align="left">

    
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





 

<?php echo $contevalua;?>- &nbsp;&nbsp; 

  <?php echo $alu2->ALU_NOMBRES;  ?> &nbsp;&nbsp;   <?php echo $alu2->ALU_PATERNO;  ?> &nbsp;&nbsp;   <?php echo $alu2->ALU_MATERNO;  ?>  &nbsp;&nbsp;  (

 
  <?php echo $tes3->TES_NOMBRE;  ?>  )&nbsp;&nbsp;  (
  <?php echo $tes3->TES_ANO;  ?> -<?php echo $tes3->TES_SEMESTRE;  ?>)
  <br>
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

  
 
</td>

 

<td align="left">
 <?php $contorienta=0;?>

    

                  <?php foreach($orienta as $ori){ ?>
             <?php if (($PRO->id)==($ori->id)) { ?>  
            
<?php foreach($alumno as $alu){ ?>

             <?php if (($alu->id)==($ori->ALUMNO_id)) { ?> 

          

 <?php $contorienta=$contorienta+1;?>



<?php echo $contorienta;?>- &nbsp;&nbsp; 
  <?php echo $alu->ALU_NOMBRES;  ?>  &nbsp;&nbsp;    <?php echo $alu->ALU_PATERNO;  ?>  &nbsp;&nbsp;    <?php echo $alu->ALU_MATERNO; break; ?>  
  <br>
 

 

  <?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
      

</td>


    <td align="left">


<?php $contvisitante=0;?>

           <?php foreach($visitante as $depa){ ?>


<?php if (($depa->id)==($PRO->id)) { ?>   
<?php $contvisitante=$contvisitante+1;?>



  <?php echo $depa->VIS_UNIVERSIDAD;  ?>  &nbsp;&nbsp;  (
  <?php echo $depa->VIS_PAIS; break;  ?> )
  <br>


  <?php } ?>




  <?php } ?> 

    <?php  if (($contvisitante==0))  { ?>

<?php echo "Universidad Del Bío-Bío"; ?> 

  <?php } ?>

</td>
</tr>

        <?php } ?>


     </table>

     <br>

                       <h4 align="right" class="box-title">Fecha : <?=  $date; ?></h4>



<div style="page-break-after:always;"></div>




     
<!-- /.box -->

             


  

</body>
</html>     
