<h5 class="page-header">Profesor dirige Tesis
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($profesor as $PRO)

           
 <?php if (($NUCLEO_id)==($PRO->id)) { ?>   
      <tr>
                  
<th align="left"> RUT Profesor :</th>  <td align="left"><?php echo $PRO->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre Profesor:</th>  <td align="left"><?php echo $PRO->PRO_NOMBRES; ?> <?php echo $PRO->PRO_PATERNO; ?> <?php echo $PRO->PRO_MATERNO; ?></td>   
          </tr>



                  <tr>
        <th align="left">   Tesis id:</th>  <td align="left">


 <?php foreach($tesis as $tes2){ ?>


<?php if (($tes2->id)==($id)) { ?>  

                   
               
 <?php foreach($alumno as $alu){ ?>
             <?php if (($alu->id)==($tes2->ALUMNO_id)) { ?>  


          <?php echo $tes2->id;  ?> 
    <?php break; ?>




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>

           

</td>

</tr> 

         <tr>
        <th align="left">  Nombre Tesis:</th>  <td align="left">


 <?php foreach($tesis as $tes2){ ?>


<?php if (($tes2->id)==($id)) { ?>  

                   
               
 <?php foreach($alumno as $alu){ ?>
             <?php if (($alu->id)==($tes2->ALUMNO_id)) { ?>  


          <?php echo $tes2->TES_NOMBRE;  ?> 
    <?php break; ?>




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>

           

</td>

</tr> 

<tr>
        <th align="left">  RUT  Alumno:</th>  <td align="left">


 <?php foreach($tesis as $tes2){ ?>


<?php if (($tes2->id)==($id)) { ?>  

                   
               
 <?php foreach($alumno as $alu){ ?>
             <?php if (($alu->id)==($tes2->ALUMNO_id)) { ?>  

  <?php echo $alu->id;  ?>
   

    <?php break; ?>




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>

           

</td>

</tr>
<tr>
        <th align="left">  Nombre  Alumno:</th>  <td align="left">


 <?php foreach($tesis as $tes2){ ?>


<?php if (($tes2->id)==($id)) { ?>  

                   
               
 <?php foreach($alumno as $alu){ ?>
             <?php if (($alu->id)==($tes2->ALUMNO_id)) { ?>  

  <?php echo $alu->ALU_NOMBRES;  ?>
    <?php echo $alu->ALU_PATERNO;  ?> 
        <?php echo $alu->ALU_MATERNO;  ?> 

    <?php break; ?>




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>

           

</td>

</tr>
         
    <?php } ?>

        @endforeach



    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('dirige9/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>