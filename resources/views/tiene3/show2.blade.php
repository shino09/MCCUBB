<h5 class="page-header">Datos Alumno que tiene Trabajo
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($alumno as $PRO)

           
 <?php if (($id)==($PRO->id)) { ?>   
      <tr>
                  
<th align="left"> RUT Alumno :</th>  <td align="left"><?php echo $PRO->id; ?> </td>  
     </tr>
      <tr>
 <th align="left"> Nombre Alumno:</th>  <td align="left"><?php echo $PRO->ALU_NOMBRES; ?> <?php echo $PRO->ALU_PATERNO; ?> <?php echo $PRO->ALU_MATERNO; ?></td>   
          </tr>

<?php } ?>
        @endforeach

 <?php foreach($TRABAJO as $tes2){ ?>


<?php if (($tes2->id)==($TRABAJO_id)) { ?>  

                  <tr>
        <th align="left">   Id Trabajo:</th>  <td align="left">




                   
               

          <?php echo $tes2->id;  ?> 





 

           

</td>

</tr> 

         <tr>
        <th align="left">  Nombre Trabajo:</th>  <td align="left">





                   
               

          <?php echo $tes2->TRA_NOMBRE;  ?> 







           

</td>

</tr> 

       <tr>
        <th align="left">  Empresa Trabajo:</th>  <td align="left">





                   
               

          <?php echo $tes2->TRA_EMPRESA;  ?> 







           

</td>

</tr> 

 <tr>
        <th align="left">  Ciudad Trabajo:</th>  <td align="left">





                   
               

          <?php echo $tes2->TRA_CIUDAD;  ?> 







           

</td>

</tr> 

  <?php } ?>

   <?php } ?>



    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('tiene3/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>

            <br>
            <br>
        
</div>