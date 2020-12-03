<h5 class="page-header">Datos del  Usuario
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($usuario as $alu)

           
 <?php if (($id)==($alu->id)) { ?>   
      <tr>
                  
<th align="left"> RUT:</th>  <td align="left"><?php echo $alu->rut; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre:</th>  <td align="left"><?php echo $alu->name; ?></td>   
          </tr>
 <tr>

<th align="left"> Apellido Paterno: </th>  <td align="left"><?php echo $alu->APELLIDOPATERNO; ?></td>   
          </tr>
 <tr>

 <th align="left"> Apellido Materno:</th>  <td align="left"><?php echo $alu->APELLIDOMATERNO; ?></td>   
          </tr>
 <tr>

 <th align="left"> Email:</th>  <td align="left"><?php echo $alu->email; ?></td>   
          </tr>
 <tr>

<!--<th align="left"> Contraseña:</th>  <td align="left"><?php echo $alu->password; ?></td>   
          </tr>-->
<tr>
     
 <tr> <th align="left"> Tipo Usuario:</th>

<td align="left"> 
                                                <?php if ((0)==($alu->tipoUsuario))       
                                                     {echo "Secretaria";  }

if ((1)==($alu->tipoUsuario))              
    {echo "Director";  }
  


  ?>
      
  </td>
  </tr>
    
          <?php } ?>   
    @endforeach
    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('usuario/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>