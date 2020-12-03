<h5 class="page-header">Datos Profesor
  
</h5>

<table class="table table-bordered table-striped">
    
    <tbody>
    @foreach($profesor as $PRO)

           
 <?php if (($id)==($PRO->id)) { ?>   
      <tr>
                  
<th align="left"> RUT:</th>  <td align="left"><?php echo $PRO->id; ?> </td>  
     </tr>
      <tr>

 <th align="left"> Nombre:</th>  <td align="left"><?php echo $PRO->PRO_NOMBRES; ?></td>   
          </tr>
 <tr>

<th align="left"> Apellido Paterno: </th>  <td align="left"><?php echo $PRO->PRO_PATERNO; ?></td>   
          </tr>
 <tr>

 <th align="left"> Apellido Materno:</th>  <td align="left"><?php echo $PRO->PRO_MATERNO; ?></td>   
          </tr>
 <tr>

 <th align="left"> Telefono:</th>  <td align="left"><?php echo $PRO->PRO_TELEFONO; ?></td>   
          </tr>
 <tr>

<th align="left"> Titulo:</th>  <td align="left"><?php echo $PRO->PRO_TITULO; ?></td>   
          </tr>


          <th align="left"> Grado:</th>  <td align="left"><?php echo $PRO->PRO_GRADO; ?></td>   
          </tr>

<tr>

<th align="left"> Email:</th>  <td align="left"><?php echo $PRO->PRO_EMAIL; ?></td>   
     </tr>
      <tr>

        <th align="left">   Departamento:</th>  <td align="left">
    @foreach($DEPARTAMENTO as $DEP)


<?php if (($DEP->id)==($PRO->DEPARTAMENTO_id)) { ?>               

  <?php echo $DEP->DEP_NOMBRE; break; ?>

  <?php } ?>


    @endforeach
</h5>
  
<tr>

 <th align="left">Tipo Profesor:  </th>


           <td align="left" colspan="4">
           <?php $i=0;?>


                  <?php foreach($nucleo as $nuc){ ?>

<?php if (($nuc->id)==($PRO->id)) { ?>               

    <?php echo "Nucleo"; ?>
<?php $i=1;?>

  <?php } ?>


  <?php } ?>


    <?php foreach($director as $nuc){ ?>


<?php if (($nuc->id)==($PRO->id)) { ?>               

    <?php echo "Director" ;?>

<?php $i=1;?>


  <?php } ?>


  <?php } ?>


   <?php foreach($visitante as $nuc){ ?>


<?php if (($nuc->id)==($PRO->id)) { ?>               

    <?php echo "Visitante" ;?>
<?php $i=1;?>


  <?php } ?>


  <?php } ?>


   <?php foreach($colaborador as $nuc){ ?>


<?php if (($nuc->id)==($PRO->id)) { ?>               

    <?php echo "Colaborador" ;?>
<?php $i=1;?>


  <?php } ?>


  <?php } ?>

<?php if ($i==0) { ?>               
 <?php echo "Sin definir" ;?>

  <?php } ?>


</td>

</tr>
       
  <?php } ?>
</tr>



           
    @endforeach
    </tbody>
</table>


<div>
</div>



    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('director2/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
            <br>
<br>
        
</div>