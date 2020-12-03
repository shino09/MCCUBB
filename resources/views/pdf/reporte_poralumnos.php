<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Listado de Alumnos</title>
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


<?php $i=0; ?>


<?php $i++; ?>
 Pagina: <?php echo $i; ?>

  <div style="text-align: right"><img src="images/logoubbface.png" width="120" /></div>



                  <h2 align="center" class="box-title">Listado de  Alumnos</h2>

<table class="table table-bordered table-striped">
    
    <tbody>

       <tr>



       <th align="left">N°</th>
  <th align="left">Alumno:</th><th align="left">Congresos:  </th> <th align="left">Talleres:</th>  <th align="left">Solicitudes:  </th><th align="left">Revistas:  </th><th align="left">Beneficios:  </th><th align="left">Trabajos:  </th>

</tr>

  <?php $c=0; ?>

                  <?php foreach($alumno as $alu){ ?>


<?php $c++; ?>




     <tr>

 <td align="left" ><?php echo $c; ?></td>



<td align="left">    <?php echo $alu->ALU_NOMBRES; ?> 
          

   <?php echo $alu->ALU_PATERNO; ?>  
          
 

    <?php echo $alu->ALU_MATERNO; ?>  
          </td>






 


<td align="left">


<?php $contcongreso=0;?>

          <?php foreach($asiste as $asi){ ?>
 
<?php if (($asi->id)==($alu->id)) { ?> 
           <?php foreach($congreso as $con){ ?>
             <?php if (($asi->CONGRESO_id)==($con->id)) { ?> 
<?php $contcongreso=$contcongreso+1;?>


 <?php echo $contcongreso;?>-&nbsp;&nbsp;  
<?php echo $con->CON_NOMBRE;  ?>&nbsp;&nbsp;  (
<?php echo $con->CON_ANO;  ?> )
<br>


  <?php } ?>
<?php } ?>

  <?php } ?> 


  <?php } ?> 

</td>



<td align="left"> 


<?php $conttaller=0;?>

          <?php foreach($participa as $part){ ?>


<?php if (($part->id)==($alu->id)) { ?>  

                  <?php foreach($taller as $tall){ ?>
    

             <?php if (($part->TALLER_id)==($tall->id)) { ?>  
              

<?php $conttaller=$conttaller+1;?>

 <?php echo $conttaller;?>- &nbsp;&nbsp;  <?php echo $tall->TAL_NOMBRE;  ?> &nbsp;&nbsp;  (
  <?php echo $tall->TAL_ANO;  ?> )

  

  <?php } ?>
<?php } ?>

  <?php } ?> 


  <?php } ?> 

   
</td>



<td align="left"> 

   


<?php $contsol=0;?>


   <?php foreach($presenta as $pre){ ?>


<?php if (($pre->id)==($alu->id)) { ?>  

                  <?php foreach($solicitud as $sol){ ?>
             <?php if (($pre->SOLICITUD_id)==($sol->id)) { ?>  

<?php $contsol=$contsol+1;?>


 <?php echo $contsol;?>- &nbsp;&nbsp;<?php echo $sol->SOL_NOMBRE;  ?>&nbsp;&nbsp;  (

  <?php echo $sol->SOL_ANO;  ?>-<?php echo $sol->SOL_SEMESTRE;  ?> )
<br>




  <?php } ?>

  <?php } ?>
    <?php } ?>

  <?php } ?>


</td>



<td align="left"> 

<?php $contrev=0;?>


 <?php foreach($publica as $pub){ ?>


<?php if (($pub->id)==($alu->id)) { ?>  

                  <?php foreach($revista as $rev){ ?>
             <?php if (($pub->REVISTA_id)==($rev->id)) { ?>  

<?php $contrev=$contrev+1;?>



 <?php echo $contrev;?>- &nbsp;&nbsp;<?php echo $rev->REV_NOMBRE;  ?>  &nbsp;&nbsp; (

  <?php echo $rev->REV_ANO;  ?>)
<br>




  <?php } ?>

  <?php } ?>
    <?php } ?>

  <?php } ?>



</td>



<td align="left"> 

<?php $contben=0;?>

   <?php foreach($posee as $poo){ ?>


<?php if (($poo->id)==($alu->id)) { ?>  

                  <?php foreach($beneficio as $ben){ ?>
             <?php if (($poo->BENEFICIO_id)==($ben->id)) { ?>  

<?php $contben=$contben+1;?>

 <?php echo $contben;?>- &nbsp;&nbsp;<?php echo $ben->BEN_NOMBRE;  ?> &nbsp;&nbsp; 
<br> 
     



  <?php } ?>

  <?php } ?>
    <?php } ?>

  <?php } ?>


  </td>



<td align="left"> 
  <?php $conttra=0;?>

   <?php foreach($tiene as $tie){ ?>


<?php if (($tie->id)==($alu->id)) { ?>  

                  <?php foreach($trabajo as $tra){ ?>
             <?php if (($tie->TRABAJO_id)==($tra->id)) { ?>  

<?php $conttra=$conttra+1;?>

  <?php echo $conttra;?>- &nbsp;&nbsp;<?php echo $tra->TRA_NOMBRE;  ?>  &nbsp;&nbsp;(
 
  <?php echo $tra->TRA_EMPRESA;  ?>)
<br>



  <?php } ?>

  <?php } ?>
    <?php } ?>

  <?php } ?>

    <?php } ?>
    </td>




        </tr>     
 </tbody>
     </table>
<br>
                       <h4 align="right" class="box-title">Fecha : <?=  $date; ?></h4>



<div style="page-break-after:always;"></div>




     
<!-- /.box -->

             


  

</body>
</html>     
