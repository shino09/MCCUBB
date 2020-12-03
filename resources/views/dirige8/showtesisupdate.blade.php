<h5 class="page-header">Datos Tesis
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($tesis as $TES)

           
 <?php if (($id)==($TES->id)) { ?>   
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

<th align="left"> Fecha de inicio:</th>  <td align="left"><?php echo $TES->TES_FECHAINICIO; ?></td>   
     </tr>

     <th align="left"> Fecha de termino:</th>  <td align="left"><?php echo $TES->TES_FECHAFINAL; ?></td>   
     </tr>
      <tr>

        <th align="left">   Alumno:</th>  <td align="left">
    @foreach($alumno as $alu)


<?php if (($alu->id)==($TES->ALUMNO_id)) { ?>               


  <?php echo $alu->ALU_NOMBRES;  ?>
    <?php echo $alu->ALU_PATERNO; break; ?>



  <?php } ?>


    @endforeach
</h5>
  

  <?php } ?>
</tr>
          
           
    @endforeach
    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('dirige8/list3update/{{$idviejo}}/{{$pro_id}}/{{$idviejo}}/{{$NUCLEO_idviejo}}')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>