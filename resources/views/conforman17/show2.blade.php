<h5 class="page-header">Tribunal evaluador de Tesis
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
                     @foreach($ALUMNO as $key=>$ALU)

 <?php if (($id)==($ALU->id) ) { ?> 
                    @foreach($TESIS as $TES)
                           <?php if (($TES->ALUMNO_id)==($ALU->id) ) { ?> 
                        @foreach($EVALUA as $EVA)
                               <?php if (($TES->id)==($EVA->id)) { ?> 


                 @foreach($TRIBUNAL as $TRI)
                        <?php if (( ($EVA->TRIBUNAL_id)==($TRI->id) )) { ?> 

                @foreach($conformans2 as $key=>$conforman17)
                       <?php if ( ($conforman17->TRIBUNAL_id)==($TRI->id) ) { ?> 
                                @foreach($profesor as $key=>$PRO)


                        <?php if ( ($PRO->id)==($conforman17->id) && ($TES->id)==($TRIBUNAL_id)  ) { ?>  



















<tr>


  <?php if (($conforman17->CON_tipoprofesor=='1')) { ?>               

<th align="left"> RUT Profesor 1:</th>  <td align="left"><?php echo $PRO->id; ?> </td>  


   
  <?php } ?>

</tr>

 <tr>


  <?php if (($conforman17->CON_tipoprofesor=='1')) { ?>               



    <th align="left"> Profesor 1:</th> <td align="left">
<?php echo $PRO->PRO_NOMBRES; ?> <?php echo $PRO->PRO_PATERNO; ?> <?php echo $PRO->PRO_MATERNO; ?>

</td>  
  <?php } ?>

</tr>
 <tr>


  <?php if (($conforman17->CON_tipoprofesor=='2')) { ?>               

<th align="left"> RUT Profesor 2:</th>  <td align="left"><?php echo $PRO->id; ?> </td>  


   
  <?php } ?>

</tr>

 <tr>


  <?php if (($conforman17->CON_tipoprofesor=='2')) { ?>               



    <th align="left"> Profesor 2:</th> <td align="left">
<?php echo $PRO->PRO_NOMBRES; ?> <?php echo $PRO->PRO_PATERNO; ?> <?php echo $PRO->PRO_MATERNO; ?>
</td>  
  <?php } ?>

</tr>
 <tr>




  <?php if (($conforman17->CON_tipoprofesor=='3')) { ?>      
  <th align="left"> RUT Profesor 3 :</th>  <td align="left"><?php echo $PRO->id; ?> </td>  
         

  <?php } ?>

          </tr>



 <tr>




  <?php if (($conforman17->CON_tipoprofesor=='3')) { ?>      
         

    <th align="left"> Profesor 3:</th> <td align="left">

<?php echo $PRO->PRO_NOMBRES; ?> <?php echo $PRO->PRO_PATERNO; ?> <?php echo $PRO->PRO_MATERNO; ?>

        
                

</td>  

</tr>




           
      <tr>
                  
<th align="left"> RUT Alumno :</th>  <td align="left"><?php echo $ALU->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre Alumno:</th>  <td align="left"><?php echo $ALU->ALU_NOMBRES; ?> <?php echo $ALU->ALU_PATERNO; ?> <?php echo $ALU->ALU_MATERNO ?></td>  
          </tr>
    
     <tr>


 <th align="left"> Nombre Tesis:</th>  <td align="left"><?php echo $TES->TES_NOMBRE; ?></td>  
          </tr>
 <tr>

          <th align="left"> Año Tesis:</th>  <td align="left"><?php echo $TES->TES_ANO; ?></td>  
          </tr>

 <tr>

          <th align="left"> Semestre Tesis:</th>  <td align="left"><?php echo $TES->TES_SEMESTRE; ?></td>  
          </tr>
       

      
          <tr>
        <th align="left">  Id TRIBUNAL :</th>  <td align="left">

          <?php echo $TRI->id;  ?>         

</td>

</tr> 

         <tr>
        <th align="left">  Fecha Creación Tribunal:</th>  <td align="left">
                    <?php echo $TRI->TRI_FECHACREACION; ?>

</td>

</tr> 


  <?php break; ?>


  <?php } ?>

  <?php break; ?>


       
<?php } ?>         

        @endforeach

    <?php } ?>



        @endforeach

                  
          <?php } ?>

        @endforeach

    <?php } ?>



        @endforeach

                  
          <?php } ?>


        @endforeach

                  <?php } ?>

                @endforeach

    </tbody>
</table>
           
  

<div>
</div>
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('conforman17/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
            <br>
        
</div>