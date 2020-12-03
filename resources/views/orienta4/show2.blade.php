<h5 class="page-header">Profesores que orientan  Alumnos  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($profesor as $PRO)

           
 <?php if (($id)==($PRO->id)) { ?>   
      <tr>
                  
<th align="left"> RUT Profesor :</th>  <td align="left"><?php echo $PRO->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre Profesor:</th>  <td align="left"><?php echo $PRO->PRO_NOMBRES; ?> <?php echo $PRO->PRO_PATERNO; ?> <?php echo $PRO->PRO_MATERNO; ?></td>   
          </tr>



                  <tr>
        <th align="left">  RUT Alumno :</th>  <td align="left">


 <?php foreach($ALUMNO as $tes2){ ?>


<?php if (($tes2->id)==($ALUMNO_id)) { ?>  

                   
               


          <?php echo $tes2->id;  ?> 




    <?php break; ?>




<?php } ?>

  <?php } ?>


           

</td>

</tr> 

         <tr>
        <th align="left">  Nombre Alumno:</th>  <td align="left">


 <?php foreach($ALUMNO as $tes2){ ?>


<?php if (($tes2->id)==($ALUMNO_id)) { ?>  

                   


                    <?php echo $tes2->ALU_NOMBRES;  ?>
                                        <?php echo $tes2->ALU_PATERNO;  ?>

                    <?php echo $tes2->ALU_MATERNO;  ?>


    <?php break; ?>





  <?php } ?>

  <?php } ?>

           

</td>

</tr> 

         
    <?php } ?>

        @endforeach



    </tbody>
</table>


<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('orienta4/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>