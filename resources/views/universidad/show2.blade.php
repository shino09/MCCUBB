<h5 class="page-header">Datos del universidad
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($universidad as $alu)

           
 <?php if (($id)==($alu->id)) { ?>   
      <!--<tr>
                  
<th align="left"> Id:</th>  <td align="left"><?php echo $alu->id; ?> </td>  
     </tr>-->
      <tr>

 <th align="left"> Nombre:</th>  <td align="left"><?php echo $alu->UNI_NOMBRE; ?></td>   
          </tr>
 <tr>

<th align="left"> Ciudad: </th>  <td align="left"><?php echo $alu->UNI_CIUDAD; ?></td>   
          </tr>
 
 
  

  <?php } ?>
</tr>
          
           
    @endforeach
    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('universidad/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>