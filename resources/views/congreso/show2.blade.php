<h5 class="page-header">Datos del Congreso
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($congreso as $alu)

           
 <?php if (($id)==($alu->id)) { ?>   
      <!--<tr>
                  
<th align="left"> Id:</th>  <td align="left"><?php echo $alu->id; ?> </td>  
     </tr>-->
      <tr>

 <th align="left"> Nombre:</th>  <td align="left"><?php echo $alu->CON_NOMBRE; ?></td>   
          </tr>
 <tr>

<th align="left"> Ciudad: </th>  <td align="left"><?php echo $alu->CON_CIUDAD; ?></td>   
          </tr>
 <tr>

 <th align="left"> Año:</th>  <td align="left"><?php echo $alu->CON_ANO; ?></td>   
          </tr>
 
  

  <?php } ?>
</tr>
          
           
    @endforeach
    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('congreso/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>