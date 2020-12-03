<h5 class="page-header">Datos Tesis a Evaluar
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>


               @foreach($TESIS as $TES)

 <?php if (($id)==($TES->id) && ($TRIBUNAL_id)==($TES->TRIBUNAL_id)  ) { ?>   
    @foreach($tesis2 as $tes2)

           
 <?php if (($id)==($TES->id)) { ?>   

     <tr>

        <th align="left">RUT Alumno:</th>  <td align="left">
    @foreach($alumno as $alu)


<?php if (($alu->id)==($tes2->ALUMNO_id)) { ?>               


  <?php echo $alu->id;  ?>
   



  <?php } ?>


    @endforeach
</h5>
  

  <?php } ?>
</tr>


   <tr>

        <th align="left"> Nombre Alumno:</th>  <td align="left">
    @foreach($alumno as $alu)


<?php if (($alu->id)==($tes2->ALUMNO_id)) { ?>               


  <?php echo $alu->ALU_NOMBRES;  ?>
    <?php echo $alu->ALU_PATERNO;  ?>
        <?php echo $alu->ALU_MATERNO; break; ?>




  <?php } ?>


    @endforeach
</h5>
  

</tr>
      <tr>
                  
<th align="left"> Id:</th>  <td align="left"><?php echo $TES->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre:</th>  <td align="left"><?php echo $TES->TES_NOMBRE; ?></td>   
          </tr>
 <tr>

<th align="left">  Descripción: </th>  <td align="left"><?php echo $TES->TES_DESCRIPCION; ?></td>   
          </tr>
 <tr>

 <th align="left"> Año:</th>  <td align="left"><?php echo $TES->TES_ANO; ?></td>   
          </tr>
 <tr>

 <th align="left"> Semestre:</th>  <td align="left"><?php echo $TES->TES_SEMESTRE; ?></td>   
          </tr>







 <tr>

<th align="left"> Nota:</th>  <td align="left"><?php echo $TES->TES_NOTA; ?></td>   
          </tr>
 <tr>

<th align="left"> Estado:</th>  <td align="left">    
  

                                             
                                                <?php if ((0)==($TES->TES_ESTADO))       
                                                     {echo "Inscrita";  }

if ((1)==($TES->TES_ESTADO))              
    {echo "Renunciada";  }
  
 if ((2)==($TES->TES_ESTADO))               

   { echo "Postergada"; }

 
  if ((3)==($TES->TES_ESTADO)) 
    {echo "Reprobada"; }

 
  if ((4)==($TES->TES_ESTADO))               

   { echo "Aprobada";  }
 
   if ((5)==($TES->TES_ESTADO))                

   { echo "No cumpple requisito";  }

  ?>
      
  </td>
         </tr>
<tr>

<th align="left"> Fecha de Inicio:</th>  <td align="left"><?php echo $TES->TES_FECHAINICIO; ?></td>   
     </tr>

     <th align="left"> Fecha de termino:</th>  <td align="left"><?php echo $TES->TES_FECHAFINAL; ?></td>   
     </tr>
   
 <tr>

        <th align="left">   Profesor Dirige:</th>  <td align="left">
    @foreach($dirige as $dir)


<?php if (($dir->id)==($TES->id)) { ?>               


@foreach($nucleo as $nuc)


<?php if (($nuc->id)==($dir->NUCLEO_id)) { ?>               


@foreach($profesor as $pro)


<?php if (($pro->id)==($nuc->id) ) { ?>               


  <?php echo $pro->PRO_NOMBRES;  ?>
    <?php echo $pro->PRO_PATERNO;  ?>
        <?php echo $pro->PRO_MATERNO;  ?>

<?php echo "<br>"; ?> 
<?php break; ?> 



  <?php } ?>


    @endforeach
    <?php ?>
    <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach
</h5>
  

</tr>


   <tr>

        <th align="left">   Profesor 1:</th>  <td align="left">
    @foreach($TRIBUNAL as $TRI)


<?php if (($TRI->id)==($TES->TRIBUNAL_id)) { ?>               


@foreach($conforman as $con)


<?php if (($TRI->id)==($con->TRIBUNAL_id)) { ?>               


@foreach($profesor as $pro)


<?php if (($pro->id)==($con->id) && ($con->CON_tipoprofesor==1)) { ?>               


  <?php echo $pro->PRO_NOMBRES;  ?>
    <?php echo $pro->PRO_PATERNO;  ?>
        <?php echo $pro->PRO_MATERNO; break; ?>




  <?php } ?>


    @endforeach
    <?php ?>
    <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach
</h5>
  

</tr>

   <tr>

        <th align="left">   Profesor 2:</th>  <td align="left">
    @foreach($TRIBUNAL as $TRI)


<?php if (($TRI->id)==($TES->TRIBUNAL_id)) { ?>               


@foreach($conforman as $con)


<?php if (($TRI->id)==($con->TRIBUNAL_id)) { ?>               


@foreach($profesor as $pro)


<?php if (($pro->id)==($con->id) && ($con->CON_tipoprofesor==2)) { ?>               


  <?php echo $pro->PRO_NOMBRES;  ?>
    <?php echo $pro->PRO_PATERNO; ?>
        <?php echo $pro->PRO_MATERNO; break; ?>




  <?php } ?>


    @endforeach
    <?php ?>
    <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach
</h5>
  

</tr>

   <tr>

        <th align="left">   Profesor 3:</th>  <td align="left">
    @foreach($TRIBUNAL as $TRI)


<?php if (($TRI->id)==($TES->TRIBUNAL_id)) { ?>               


@foreach($conforman as $con)


<?php if (($TRI->id)==($con->TRIBUNAL_id)) { ?>               


@foreach($profesor as $pro)


<?php if (($pro->id)==($con->id) && ($con->CON_tipoprofesor==3)) { ?>               


  <?php echo $pro->PRO_NOMBRES;  ?>
    <?php echo $pro->PRO_PATERNO;  ?>
        <?php echo $pro->PRO_MATERNO; break; ?>




  <?php } ?>


    @endforeach
    <?php ?>
    <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach
</h5>
  

</tr>


           <tr>

<th align="left"> TRIBUNAL id:</th>  <td align="left"><?php echo $TES->TRIBUNAL_id; ?></td>   
          </tr>

            <tr>

<th align="left"> Nota Profesor Director Informe:</th>  <td align="left"><?php echo $TES->EVA_NOTADIRIGEINFORME; ?></td>   
          </tr>



 <tr>

<th align="left"> Nota Profesor 1 Informe:</th>  <td align="left"><?php echo $TES->EVA_NOTAPROFESOR1INFORME; ?></td>   
          </tr>


           <tr>

<th align="left"> Nota Profesor 2 Informe:</th>  <td align="left"><?php echo $TES->EVA_NOTAPROFESOR2INFORME; ?></td>   
          </tr>


           <tr>

<th align="left"> Nota Profesor 3 Informe:</th>  <td align="left"><?php echo $TES->EVA_NOTAPROFESOR3INFORME; ?></td>   
          </tr>

                     <tr>

<th align="left"> Nota Profesor Director Exposición:</th>  <td align="left"><?php echo $TES->EVA_NOTADIRIGEEXPOSICION; ?></td>   
          </tr>



 <tr>

<th align="left"> Nota Profesor 1 Exposición:</th>  <td align="left"><?php echo $TES->EVA_NOTAPROFESOR1EXPOSICION; ?></td>   
          </tr>


           <tr>

<th align="left"> Nota Profesor 2 Exposición :</th>  <td align="left"><?php echo $TES->EVA_NOTAPROFESOR2EXPOSICION; ?></td>   
          </tr>


           <tr>

<th align="left"> Nota Profesor 3 Exposición :</th>  <td align="left"><?php echo $TES->EVA_NOTAPROFESOR3EXPOSICION; ?></td>   
          </tr>

           <tr>

<th align="left"> Nota Final Informe :</th>  <td align="left"><?php echo $TES->EVA_NOTAFINALINFORME; ?></td>   
          </tr>


           <tr>

<th align="left"> Nota Fonal Exposición :</th>  <td align="left"><?php echo $TES->EVA_NOTAFINALEXPOSICION; ?></td>   
          </tr>

           <tr>

<th align="left"> Nota Final:</th>  <td align="left"><?php echo $TES->EVA_NOTAFINAL; ?></td>   
          </tr>
          
               <?php break;?>

    @endforeach

  <?php } ?>



    @endforeach
    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('evalua6/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>