<h5 class="page-header">DATOS profesors
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>

    @foreach($profesor as $PRO)

<tr>
<th align="left"> Profesor:</th>  <td align="left"><?php echo $PRO->id; ?> </td>  
<td align="left"><?php echo $PRO->PRO_NOMBRES; ?> <?php echo $PRO->PRO_PATERNO; ?> <?php echo $PRO->PRO_MATERNO; ?></td> 
<td align="left"> Selecionar</td>  <td align="left">{!!Form::checkbox('ALUMNO_id', $PRO->id)!!}
</td>   
               @endforeach
           
                  
</tr>
    </tbody>


    <tbody>
    @foreach($ALUMNO as $tes)

<tr>
          


<th align="left"> ALUMNO:</th>  <td align="left"><?php echo $tes->id;?> </td>
<td align="left"> <?php echo $tes->TES_NOMBRE; ?> </td>  
<td align="left"> Selecionar</td>  <td align="left">{!!Form::checkbox('id', $tes->id)!!}
</td>   

    @endforeach
  

                        
</tr>
    </tbody>

          
<?php echo $tes->id; ?>



</table>




  <div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('orienta6/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Back</a>

             <a class="btn btn-primary btn-circle" title="Edit"
                   href="javascript:ajaxLoad('orienta6/update/{{$tes->id}}/{{$PRO->id}}')">
                    <i class="fa fa-save"></i> Guardar</a>

  
    </div>
</div>