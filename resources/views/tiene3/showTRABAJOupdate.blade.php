<h5 class="page-header">Datos Trabajo
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($TRABAJO as $CON)

           
 <?php if (($TRABAJO_id)==($CON->id)) { ?>   
      <tr>
                  
<th align="left"> Id  Trabajo:</th>  <td align="left"><?php echo $CON->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre Trabajo:</th>  <td align="left"><?php echo $CON->TRA_NOMBRE; ?></td>   
          </tr>
 
 <tr>

 <th align="left"> Empresa Trabajo:</th>  <td align="left"><?php echo $CON->TRA_EMPRESA; ?></td>   
          </tr>

           <tr>

 <th align="left"> Ciudad Trabajo:</th>  <td align="left"><?php echo $CON->TRA_CIUDAD; ?></td>   
          </tr>
 
  <?php } ?>

          
           
    @endforeach
    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('tiene3/list3update/{{$id}}/{{$TRABAJO_id}}/{{$idviejo}}/{{$TRABAJO_idviejo}}')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>