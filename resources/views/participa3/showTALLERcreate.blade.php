<h5 class="page-header">Datos Taller
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($TALLER as $CON)

           
 <?php if (($con_id)==($CON->id)) { ?>   
      <tr>
                  
<th align="left"> Id:</th>  <td align="left"><?php echo $CON->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre:</th>  <td align="left"><?php echo $CON->TAL_NOMBRE; ?></td>   
          </tr>

 <tr>

 <th align="left"> Año:</th>  <td align="left"><?php echo $CON->TAL_ANO; ?></td>   
          </tr>
 
  <?php } ?>

          
           
    @endforeach
    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('participa3/list3create/{{$id}}')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>