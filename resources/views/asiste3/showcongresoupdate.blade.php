<h5 class="page-header">Datos Congreso
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($congreso as $CON)

           
 <?php if (($CONGRESO_id)==($CON->id)) { ?>   
      <tr>
                  
<th align="left"> Id:</th>  <td align="left"><?php echo $CON->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre:</th>  <td align="left"><?php echo $CON->CON_NOMBRE; ?></td>   
          </tr>
 <tr>

<th align="left">  Ciudad: </th>  <td align="left"><?php echo $CON->CON_CIUDAD; ?></td>   
          </tr>
 <tr>

 <th align="left"> Año:</th>  <td align="left"><?php echo $CON->CON_ANO; ?></td>   
          </tr>
 
  <?php } ?>

          
           
    @endforeach
    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('asiste3/list3update/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
             <br>
            <br>
        
</div>