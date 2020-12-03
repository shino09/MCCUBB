<h5 class="page-header">Datos del Trabajo
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($trabajo as $alu)

           
 <?php if (($id)==($alu->id)) { ?>   
   <!--   <tr>
                  
<th align="left"> Id:</th>  <td align="left"><?php echo $alu->id; ?> </td>  
     </tr>-->
      <tr>

 <th align="left"> Nombre :</th>  <td align="left"><?php echo $alu->TRA_NOMBRE; ?></td>   
          </tr>
 <tr>

<th align="left"> Empresa: </th>  <td align="left"><?php echo $alu->TRA_EMPRESA; ?></td>   
          </tr>
 <tr>

 <th align="left"> Ciudad:</th>  <td align="left"><?php echo $alu->TRA_CIUDAD; ?></td>   
          </tr>
 
  

  <?php } ?>
</tr>
          
           
    @endforeach
    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('trabajo/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>