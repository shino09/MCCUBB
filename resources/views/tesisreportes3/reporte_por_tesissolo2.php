<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ficha Tesis</title>
<style>
 
 body {
  font: normal medium/1.4 sans-serif;
}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  padding: 0.25rem;
  text-align: left;
  border: 1px solid #ccc;
}
tbody tr:nth-child(odd) {
  background: #eee;
}


</style>
</head>
<body>

              <div style="text-align: right"><img src="images/logoubbface.png" width="150" /></div>



                  <h2 align="center" class="box-title">Ficha Tesis</h2>
               



<table class="table table-bordered table-striped">
    
    <tbody>

                  <?php foreach($tesis as $TES){ ?>

                        <?php if (($TES->id)==($id)) { ?>  




<tr> 
 <th align="left">Alumno:</td><td align="left"> 

<?php foreach($alumno as $alu){ ?>


<?php if (($alu->id)==($TES->ALUMNO_id)) { ?>               


  <?php echo $alu->ALU_NOMBRES;  ?>
    <?php echo $alu->ALU_PATERNO; break; ?>



  <?php } ?>


<?php } ?>



</td>
     
  

                             
 </tr>
<tr>

  <th align="left">Nombre:  </td><td align="left">   <?php echo $TES->TES_NOMBRE; ?> 
          

  
          </td>
 
 </tr><tr> 
<th align="left">Descripcion: </td><td align="left">   <?php echo $TES->TES_DESCRIPCION; ?>  
          
 </td>
 </tr><tr> 
 <th align="left">Año:</td><td align="left">  <?php echo $TES->TES_ANO; ?>  
          
 
</td>
     
  

                             
 </tr><tr> 
 <th align="left">Semestre: </td><td align="left">  <?php echo $TES->TES_SEMESTRE; ?>  </td>

 </tr>

<tr> 
  <th align="left">Estado:  </td><td align="left">  <?php if ((0)==($TES->TES_ESTADO))       
                                                     {echo "Inscrita";  }

if ((1)==($TES->TES_ESTADO))              
    {echo "Renunciada";  }
  
 if ((2)==($TES->TES_ESTADO))               

   { echo "Postergada"; }

 
  if ((3)==($TES->TES_ESTADO)) 
    {echo "Reprobada"; }

 
  if ((4)==($TES->TES_ESTADO))               

   { echo "Aprobada";  }
 
   if ((5)==($TES->TES_ESTADO))                

   { echo "No cumpple requisito";  }

  ?>  </td>



     
      



 </tr>


<tr> 
 <th align="left">Fecha Inicio:</td><td align="left">  <?php echo $TES->TES_FECHAINICIO; ?>  
          
 
</td>
     
  

                             
 </tr>



<tr> 
 <th align="left">Fecha final:</td><td align="left">  <?php echo $TES->TES_FECHAFINAL; ?>  
          
 
</td>
     
  

                             
 </tr>




 <tr> 

<th align="left">Profesor Guia : </td><td align="left"> 


              <?php foreach($dirige as $dir){ ?>

<?php if (($TES->id)==($dir->id)) { ?>  

<?php foreach($nucleo as $nuc){ ?>
               <?php if (($nuc->id)==($dir->NUCLEO_id)) { ?>  




 <?php foreach($profesor as $pro){ ?>
             <?php if (($pro->id)==($nuc->id)) { ?>  


<?php echo $pro->PRO_NOMBRES;  ?> 
  <?php echo $pro->PRO_PATERNO;  ?>
    <?php echo $pro->PRO_MATERNO;  ?> 
          <br>




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
 

</td> 


 </tr><tr> 
    <th align="left">Profesor Codirige : </td><td align="left"> 


                   <?php foreach($codirige as $codir){ ?>

<?php if (($TES->id)==($codir->id)) { ?>  





 <?php foreach($profesor as $pro){ ?>
             <?php if (($pro->id)==($codir->PROFESOR_id)) { ?>  


<?php echo $pro->PRO_NOMBRES;  ?> 
  <?php echo $pro->PRO_PATERNO;  ?>
    <?php echo $pro->PRO_MATERNO;  ?> 
          <br>




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>

 
 
</td>


 </tr><tr> 


 <th align="left">Profesor Orienta: </td><td align="left"> 


                       <?php foreach($orienta as $ori){ ?>

<?php if (($TES->id)==($ori->id)) { ?>  





 <?php foreach($profesor as $pro){ ?>
             <?php if (($pro->id)==($ori->id)) { ?>  


<?php echo $pro->PRO_NOMBRES;  ?> 
  <?php echo $pro->PRO_PATERNO;  ?>
    <?php echo $pro->PRO_MATERNO;  ?> 
          <br>




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
 
 
</td>

 </tr>


 <tr> 


<th align="left">Profesor evaluador 1: </td><td align="left"> 


                         <?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  


<?php foreach($tribunal as $tri){ ?>
             <?php if (($tri->id)==($eva->TRIBUNAL_id)) { ?>  


<?php foreach($conforman as $con){ ?>
             <?php if (($tri->id)==($con->TRIBUNAL_id)) { ?>  



 <?php foreach($profesor as $pro){ ?>
             <?php if (($pro->id)==($con->id)&& ($con->CON_tipoprofesor==1)) { ?>  


<?php echo $pro->PRO_NOMBRES;  ?> 
  <?php echo $pro->PRO_PATERNO;  ?>
    <?php echo $pro->PRO_MATERNO;  ?> 
          <br>




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>


<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
  
  

 

               </td>
          </tr>

          <tr> 


<th align="left">Profesor evaluador 2: </td><td align="left"> 


                         <?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  


<?php foreach($tribunal as $tri){ ?>
             <?php if (($tri->id)==($eva->TRIBUNAL_id)) { ?>  


<?php foreach($conforman as $con){ ?>
             <?php if (($tri->id)==($con->TRIBUNAL_id)) { ?>  



 <?php foreach($profesor as $pro){ ?>
             <?php if (($pro->id)==($con->id)&& ($con->CON_tipoprofesor==2)) { ?>  


<?php echo $pro->PRO_NOMBRES;  ?> 
  <?php echo $pro->PRO_PATERNO;  ?>
    <?php echo $pro->PRO_MATERNO;  ?> 
          <br>




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>


<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
  
  

 

               </td>
          </tr>


          <tr> 


<th align="left">Profesor evaluador 3: </td><td align="left"> 


                         <?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  


<?php foreach($tribunal as $tri){ ?>
             <?php if (($tri->id)==($eva->TRIBUNAL_id)) { ?>  


<?php foreach($conforman as $con){ ?>
             <?php if (($tri->id)==($con->TRIBUNAL_id)) { ?>  



 <?php foreach($profesor as $pro){ ?>
             <?php if (($pro->id)==($con->id) && ($con->CON_tipoprofesor==3)) { ?>  


<?php echo $pro->PRO_NOMBRES;  ?> 
  <?php echo $pro->PRO_PATERNO;  ?>
    <?php echo $pro->PRO_MATERNO;  ?> 
          <br>




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>


<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
  
  

 

               </td>
          </tr>

 <tr>

<th align="left"> Nota:</th>  <td align="left">




 <?php if (($TES->TES_ESTADO)!=(5)):       ?>


<?php echo $TES->TES_NOTA; ?>

                                                   <?php else:     ?>
                                                  <?php   echo "NCR"; ?>
                                                   <?php    endif;?>



</td>   
          </tr>


  <?php } ?>
    <?php } ?>



          
     
            

    </tbody>
</table>
                  <h4 align="right" class="box-title">Fecha : <?=  $date; ?></h4>

</body>
</html>    
