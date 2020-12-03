<h5 class="page-header">Datos Beneficio
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($BENEFICIO as $CON)

           
 <?php if (($con_id)==($CON->id)) { ?>   
      <tr>
                  
<th align="left"> Id:</th>  <td align="left"><?php echo $CON->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre:</th>  <td align="left"><?php echo $CON->BEN_NOMBRE; ?></td>   
          </tr>

 <tr>

 <th align="left"> Descripción:</th>  <td align="left"><?php echo $CON->BEN_DESCRIPCION; ?></td>   
          </tr>
 
  <?php } ?>

          
           
    @endforeach
    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('posee3/list3create/{{$id}}')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>