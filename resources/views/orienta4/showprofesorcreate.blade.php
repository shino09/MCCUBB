<h5 class="page-header">Datos Profesor
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($profesor as $PRO)

           
 <?php if (($id)==($PRO->id)) { ?>   
      <tr>
                  
<th align="left"> RUT:</th>  <td align="left"><?php echo $PRO->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre:</th>  <td align="left"><?php echo $PRO->PRO_NOMBRES; ?></td>   
          </tr>
 <tr>

<th align="left"> Apellido Paterno: </th>  <td align="left"><?php echo $PRO->PRO_PATERNO; ?></td>   
          </tr>
 <tr>

 <th align="left"> Apellido Materno:</th>  <td align="left"><?php echo $PRO->PRO_MATERNO; ?></td>   
          </tr>
 <tr>

 <th align="left"> Telefono:</th>  <td align="left"><?php echo $PRO->PRO_TELEFONO; ?></td>   
          </tr>
 <tr>

<th align="left"> Titulo:</th>  <td align="left"><?php echo $PRO->PRO_TITULO; ?></td>   
          </tr>


          <th align="left"> Grado:</th>  <td align="left"><?php echo $PRO->PRO_GRADO; ?></td>   
          </tr>

<tr>

<th align="left"> Email:</th>  <td align="left"><?php echo $PRO->PRO_EMAIL; ?></td>   
     </tr>
      <tr>

        <th align="left">   Departamento:</th>  <td align="left">
    @foreach($DEPARTAMENTO as $DEP)


<?php if (($DEP->id)==($PRO->DEPARTAMENTO_id)) { ?>               

  <?php echo $DEP->DEP_NOMBRE; break; ?>

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
        <a href="javascript:ajaxLoad('orienta4/list2create')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>

            <br>
            <br>
        
</div>