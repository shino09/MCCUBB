<h5 class="page-header">Profesor que dirige Tesis
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($profesor as $PRO)

           
 <?php if (($id)==($PRO->id)) { ?>   


  <tr>
        <th align="left">  RUT  Alumno Tesista:</th>  <td align="left">


 <?php foreach($tesis as $tes2){ ?>


<?php if (($tes2->id)==($PROFESOR_id)) { ?>  

                   
               
 <?php foreach($alumno as $alu){ ?>
             <?php if (($alu->id)==($tes2->ALUMNO_id)) { ?>  


        <?php echo $alu->id; break; ?> 





<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>

           

</td>

</tr>


<tr>
        <th align="left">  Nombre  Alumno Tesista:</th>  <td align="left">


 <?php foreach($tesis as $tes2){ ?>


<?php if (($tes2->id)==($PROFESOR_id)) { ?>  

                   
               
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
      <tr>
                  
<th align="left"> RUT Profesor Codirector de Tesis :</th>  <td align="left"><?php echo $PRO->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre Profesor Codirector de Tesis:</th>  <td align="left"><?php echo $PRO->PRO_NOMBRES; ?> <?php echo $PRO->PRO_PATERNO; ?> <?php echo $PRO->PRO_MATERNO; ?></td>   
          </tr>



                  <tr>
        <th align="left">   Tesis id:</th>  <td align="left">


 <?php foreach($tesis as $tes2){ ?>


<?php if (($tes2->id)==($PROFESOR_id)) { ?>  

                   
               
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


<?php if (($tes2->id)==($PROFESOR_id)) { ?>  

                   
               
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
        <th align="left">  Descripción Tesis:</th>  <td align="left">


 <?php foreach($tesis as $tes2){ ?>


<?php if (($tes2->id)==($PROFESOR_id)) { ?>  

                   
               
 <?php foreach($alumno as $alu){ ?>
             <?php if (($alu->id)==($tes2->ALUMNO_id)) { ?>  


          <?php echo $tes2->TES_DESCRIPCION;  ?> 
    <?php break; ?>




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>

           

</td>

</tr> 

       <tr>
        <th align="left">  Semestre Tesis:</th>  <td align="left">


 <?php foreach($tesis as $tes2){ ?>


<?php if (($tes2->id)==($PROFESOR_id)) { ?>  

                   
               
 <?php foreach($alumno as $alu){ ?>
             <?php if (($alu->id)==($tes2->ALUMNO_id)) { ?>  


                   <?php echo $tes2->TES_ANO;  ?>-<?php echo $tes2->TES_SEMESTRE;  ?> 
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
        <a href="javascript:ajaxLoad('codirige7/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>