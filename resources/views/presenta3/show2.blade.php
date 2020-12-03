<h5 class="page-header">Datos Alumno que presenta Solicitud
  
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

 <?php foreach($SOLICITUD as $tes2){ ?>


<?php if (($tes2->id)==($SOLICITUD_id)) { ?>  

                  <tr>
        <th align="left">   Id Solicitud :</th>  <td align="left">




                   
               

          <?php echo $tes2->id;  ?> 





 

           

</td>

</tr> 

         <tr>
        <th align="left">  Nombre Solicitud:</th>  <td align="left">





                   
               

          <?php echo $tes2->SOL_NOMBRE;  ?> 







           

</td>

</tr> 

     <tr>
        <th align="left">  Descripción Solicitud:</th>  <td align="left">





                   
               

          <?php echo $tes2->SOL_DESCRIPCION;  ?> 







           

</td>

</tr> 

       <tr>
        <th align="left">  Año Solicitud:</th>  <td align="left">





                   
               

          <?php echo $tes2->SOL_ANO;  ?> 







           

</td>

</tr> 

     <tr>
        <th align="left">  Semestre Solicitud:</th>  <td align="left">





                   
               

          <?php echo $tes2->SOL_SEMESTRE;  ?> 







           

</td>

</tr> 

  <?php } ?>

   <?php } ?>



    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('presenta3/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>