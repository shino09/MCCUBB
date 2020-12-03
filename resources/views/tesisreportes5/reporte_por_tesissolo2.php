<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ficha Tesis</title>
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

              <div style="text-align: right"><img src="images/logoubbface.png" width="100" /></div>



                  <h4 align="center" class="box-title">Ficha Tesis Evaluada</h4>
               



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
<!--<tr>

<th align="left">

Id Tesis:</th> <td align="left"><?php echo $tesis->id ?> 

</td>
</tr>-->
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

Semestre Tesis:</th> <td align="left"><?php echo $tesis->TES_ANO ?>-<?php echo $tesis->TES_SEMESTRE ?>  

</td>
</tr>
<!--<tr>
<th align="left">

Semestre Tesis:</th> <td align="left"><?php echo $tesis->TES_SEMESTRE ?> 

</td>


</tr>-->


<!--<tr>
<th align="left">

Tribunal Id:</th> <td align="left"><?php echo $tribunal->id ?> 

</td>


</tr>-->

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

 <tr>

<th align="left"> Nota Profesor Director Informe:</th>  <td align="left"><?php echo $evalua->EVA_NOTADIRIGEINFORME; ?></td>   
          </tr>

                     <tr>

<th align="left"> Nota Profesor Director Exposición:</th>  <td align="left"><?php echo $evalua->EVA_NOTADIRIGEEXPOSICION; ?></td>   
          </tr>
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

<th align="left"> Nota Profesor Evaluador de Tesis N°1 Informe:</th>  <td align="left"><?php echo $evalua->EVA_NOTAPROFESOR1INFORME; ?></td>   
          </tr>
 <tr>

<th align="left"> Nota Profesor Evaluador de Tesis N°1 Exposición:</th>  <td align="left"><?php echo $evalua->EVA_NOTAPROFESOR1EXPOSICION; ?></td>   
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

<th align="left"> Nota Profesor Evaluador de Tesis N°2 Informe:</th>  <td align="left"><?php echo $evalua->EVA_NOTAPROFESOR2INFORME; ?></td>   
          </tr>
  <tr>

<th align="left"> Nota Profesor Evaluador de Tesis N°2 Exposición :</th>  <td align="left"><?php echo $evalua->EVA_NOTAPROFESOR2EXPOSICION; ?></td>   
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
   <tr>

<th align="left"> Nota Profesor Evaluador de Tesis N°3 Informe:</th>  <td align="left"><?php echo $evalua->EVA_NOTAPROFESOR3INFORME; ?></td>   
          </tr>

           <tr>

<th align="left"> Nota Profesor Evaluador de Tesis N°3 Exposición :</th>  <td align="left"><?php echo $evalua->EVA_NOTAPROFESOR3EXPOSICION; ?></td>   
          </tr>


           <tr>

<th align="left"> Nota Final Informe :</th>  <td align="left"><?php echo $evalua->EVA_NOTAFINALINFORME; ?></td>   
          </tr>


           <tr>

<th align="left"> Nota Final Exposición :</th>  <td align="left"><?php echo $evalua->EVA_NOTAFINALEXPOSICION; ?></td>   
          </tr>

           <tr>

<th align="left"> Nota Final:</th>  <td align="left"><?php echo $evalua->EVA_NOTAFINAL; ?></td>   
          </tr>



     
            

    </tbody>
</table>

                            <h5 align="right" class="box-title">Fecha : <?=  $date; ?></h5>


</body>
</html>    
