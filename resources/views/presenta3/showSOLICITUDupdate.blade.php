<h5 class="page-header">Datos Solicitud
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($SOLICITUD as $CON)

           
 <?php if (($SOLICITUD_id)==($CON->id)) { ?>   
      <tr>
                  
<th align="left"> Id:</th>  <td align="left"><?php echo $CON->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre:</th>  <td align="left"><?php echo $CON->SOL_NOMBRE; ?></td>   
          </tr>

          <tr>

           <th align="left"> Descripción:</th>  <td align="left"><?php echo $CON->SOL_DESCRIPCION; ?></td>   
          </tr>
 
 <tr>

 <th align="left"> Año:</th>  <td align="left"><?php echo $CON->SOL_ANO; ?></td>   
          </tr>

<tr>
          <th align="left"> Semestre:</th>  <td align="left"><?php echo $CON->SOL_SEMESTRE; ?></td>   
          </tr>
 
  <?php } ?>

          
           
    @endforeach
    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('presenta3/list3update/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>

            <br>
            <br>
        
</div>