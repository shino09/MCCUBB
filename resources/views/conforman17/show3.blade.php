<h5 class="page-header">Tribunal Evaluador de Tesis
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
<tr>



<th align="left">
 RUT Alumno Tesista:</th> <td align="left"><?php echo $alumno->id ?> 

</td>
</tr>

<tr>
<th align="left">

Nombre Alumno Tesista:</th> <td align="left"><?php echo $alumno->ALU_NOMBRES ?>  <?php echo $alumno->ALU_PATERNO ?>  <?php echo $alumno->ALU_MATERNO ?>


</td>
</tr>
<tr>

<th align="left">

Id Tesis:</th> <td align="left"><?php echo $tesis->id ?> 

</td>
</tr>
<tr>
<th align="left">

Nombre Tesis:</th> <td align="left"><?php echo $tesis->TES_NOMBRE ?> 

</td>
</tr>
<tr>
<th align="left">

Descripción Tesis:</th> <td align="left"><?php echo $tesis->TES_DESCRIPCION ?> 

</td>
</tr>
<tr>
<th align="left">

Año Tesis:</th> <td align="left"><?php echo $tesis->TES_ANO ?> 

</td>
</tr>
<tr>
<th align="left">

Semestre Tesis:</th> <td align="left"><?php echo $tesis->TES_SEMESTRE ?> 

</td>


</tr>

<tr>
<th align="left">

Tribunal Id:</th> <td align="left"><?php echo $tribunal->id ?> 

</td>


</tr>

<tr>
<th align="left">

Tribunal Fecha de Creación:</th> <td align="left"><?php echo $tribunal->TRI_FECHACREACION ?> 

</td>


</tr>
<tr>
<th align="left">

RUT Profesor Director de Tesis:</th> <td align="left"><?php echo $profesordirige->id ?> 

</td>
</tr>

<tr>
<th align="left">

Profesor Director de Tesis:</th> <td align="left"><?php echo $profesordirige->PRO_NOMBRES ?>  <?php echo $profesordirige->PRO_PATERNO ?>  <?php echo $profesordirige->PRO_MATERNO ?>


</td>
</tr>



	<tr>


    <th align="left">

RUT Profesor Codirector de Tesis:</th> <td align="left"><?php if (($concodirige==1)) { ?>    

<?php echo $profesorcodirige->id ?> 
          <?php } ?>

</td>
</tr>
<tr>
<th align="left">

Profesor Codirector de Tesis:</th><td align="left"><?php if (($concodirige==1)) { ?>  <?php echo $profesorcodirige->PRO_NOMBRES ?>  <?php echo $profesorcodirige->PRO_PATERNO ?>  <?php echo $profesorcodirige->PRO_MATERNO ?>           <?php } ?>
 </td>


</tr>

<tr>
<th align="left">

RUT Profesor Evaluador de Tesis N°1 (UBB):</th> <td align="left"><?php echo $profesor1->id ?> 

</td>
</tr>

<tr>
<th align="left">

Profesor Evaluador de Tesis N°1 (UBB):</th> <td align="left"><?php echo $profesor1->PRO_NOMBRES ?>  <?php echo $profesor1->PRO_PATERNO ?>  <?php echo $profesor1->PRO_MATERNO ?>


</td>
</tr>

<tr>
<th align="left">

RUT Profesor Evaluador de Tesis N°2 (UBB):</th> <td align="left"><?php echo $profesor2->id ?> 

</td>
</tr>

<tr>
<th align="left">

Profesor Evaluador de Tesis N°2 (UBB):</th> <td align="left"><?php echo $profesor2->PRO_NOMBRES ?>  <?php echo $profesor2->PRO_PATERNO ?>  <?php echo $profesor2->PRO_MATERNO ?>


</td>
</tr>

<tr>

<th align="left">

RUT Profesor Evaluador de Tesis N°3 (Visitante):</th><td align="left"> <?php echo $profesor3->id ?> 

</td>
</tr>

<tr>
<th align="left">

Profesor Evaluador de Tesis N°3 (Visitante):</th><td align="left"> <?php echo $profesor3->PRO_NOMBRES ?>  <?php echo $profesor3->PRO_PATERNO ?>  <?php echo $profesor3->PRO_MATERNO ?>


</td>
</tr>




    </tbody>
</table>
           
  

<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('conforman17/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>