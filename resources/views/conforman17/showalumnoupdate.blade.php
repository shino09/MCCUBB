<h5 class="page-header">DATOS TRIBUNALs
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($TRIBUNAL as $alu)

           
 <?php if (($TRIBUNAL_id)==($alu->id)) { ?>   
      <tr>
                  
<th align="left"> RUT:</th>  <td align="left"><?php echo $alu->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> NOMBRES:</th>  <td align="left"><?php echo $alu->ALU_NOMBRES; ?></td>   
          </tr>
 <tr>

<th align="left"> Apellido Paterno: </th>  <td align="left"><?php echo $alu->ALU_PATERNO; ?></td>   
          </tr>
 <tr>

 <th align="left"> Apellido Materno:</th>  <td align="left"><?php echo $alu->ALU_MATERNO; ?></td>   
          </tr>
 <tr>

 <th align="left"> Telefono:</th>  <td align="left"><?php echo $alu->ALU_TELEFONO; ?></td>   
          </tr>
 <tr>

<th align="left"> Titulo:</th>  <td align="left"><?php echo $alu->ALU_TITULO; ?></td>   
          </tr>
 <tr>

<th align="left"> Estado:</th>  <td align="left">    
  

                                             
                                                <?php if ((0)==($alu->ALU_ESTADO))       
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

<th align="left"> Email:</th>  <td align="left"><?php echo $alu->ALU_EMAIL; ?></td>   
     </tr>
      <tr>

        <th align="left">   Universidad:</th>  <td align="left">
    @foreach($universidads as $uni)


<?php if (($uni->id)==($alu->UNIVERSIDAD_id)) { ?>               

  <?php echo $uni->UNI_NOMBRE; break; ?>

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
        <a href="javascript:ajaxLoad('conforman17/list3update/{{$id}}/{{$TRIBUNAL_id}}/{{$idviejo}}/{{$TRIBUNAL_idviejo}}')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
        
</div>