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

<?php $i=0; ?>

                  <?php foreach($tesis as $TES){ ?>
                                                    <?php if (($TES->TES_NOTA)!=0  &&  (($TES->TES_NOTA)!=NULL )){ ?>  

<?php $i++; ?>
 Pagina: <?php echo $i; ?>

              <div style="text-align: right"><img src="images/logoubbface.png" width="100" /></div>



                  <h4 align="center" class="box-title">Ficha Tesis</h4>
               



<table class="table table-bordered table-striped">
    
    <tbody>



<tr> 
 <th align="left">RUT Alumno Tesista:</td><td align="left"> 

<?php foreach($alumno as $alu){ ?>


<?php if (($alu->id)==($TES->ALUMNO_id)) { ?>               


    <?php echo $alu->id; break; ?>



  <?php } ?>


<?php } ?>



</td>
     
  

                             
 </tr>


  
<tr> 
 <th align="left">Nombre Alumno Tesista:</td><td align="left"> 

<?php foreach($alumno as $alu){ ?>


<?php if (($alu->id)==($TES->ALUMNO_id)) { ?>               


  <?php echo $alu->ALU_NOMBRES;  ?>
    <?php echo $alu->ALU_PATERNO; break; ?>



  <?php } ?>


<?php } ?>



</td>
     
  

                             
 </tr>
<!--<tr> 
  <th align="left">Id Tesis:  </td><td align="left"> <?php echo $TES->id; ?>  </td>

 </tr>-->

 <tr> 
  <th align="left">Nombre Tesis:  </td><td align="left">   <?php echo $TES->TES_NOMBRE; ?> 
          

  
          </td>
 
 </tr><tr> 
<th align="left">Descripcion Tesis: </td><td align="left">   <?php echo $TES->TES_DESCRIPCION; ?>  
          
 </td>
 </tr><tr> 
 <th align="left">Semestre Tesis:</td><td align="left">  <?php echo $TES->TES_ANO; ?>-<?php echo $TES->TES_SEMESTRE; ?>  
          
 
</td>
     
  

                             
 </tr><!--<tr> 
 <th align="left">Semestre Tesis: </td><td align="left">  <?php echo $TES->TES_SEMESTRE; ?>  </td>

 </tr>-->

<tr> 
  <th align="left">Estado Tesis:  </td><td align="left">  <?php if ((0)==($TES->TES_ESTADO))       
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

<!--<tr> 


<th align="left">Tribunal Id: </td><td align="left"> 


                         <?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  


<?php foreach($tribunal as $tri){ ?>
             <?php if (($tri->id)==($eva->TRIBUNAL_id)) { ?>  




<?php echo $tri->id;  ?> 

          <br>






<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
  
  

 

               </td>
          </tr>-->



<tr> 


<th align="left">Tribunal Fecha Creación: </td><td align="left"> 


                         <?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  


<?php foreach($tribunal as $tri){ ?>
             <?php if (($tri->id)==($eva->TRIBUNAL_id)) { ?>  




<?php echo $tri->TRI_FECHACREACION;  ?> 

          <br>






<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
  
  

 

               </td>
          </tr>

<tr> 

<th align="left">RUT Profesor Director de Tesis : </td><td align="left"> 


              <?php foreach($dirige as $dir){ ?>

<?php if (($TES->id)==($dir->id)) { ?>  

<?php foreach($nucleo as $nuc){ ?>
               <?php if (($nuc->id)==($dir->NUCLEO_id)) { ?>  




 <?php foreach($profesor as $pro){ ?>
             <?php if (($pro->id)==($nuc->id)) { ?>  



    <?php echo $pro->id;  ?> 




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>
 

</td> 


 </tr>
 <tr> 

<th align="left">Profesor Director de Tesis : </td><td align="left"> 


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


 </tr>


<tr> 
    <th align="left">RUT Profesor Codirector de Tesis : </td><td align="left"> 


                   <?php foreach($codirige as $codir){ ?>

<?php if (($TES->id)==($codir->id)) { ?>  





 <?php foreach($profesor as $pro){ ?>
             <?php if (($pro->id)==($codir->PROFESOR_id)) { ?>  



    <?php echo $pro->id;  ?> 




<?php } ?>

  <?php } ?>
  <?php } ?>

  <?php } ?>

 
 
</td>


 </tr>

 <tr> 
    <th align="left">Profesor Codirector de Tesis : </td><td align="left"> 


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


 </tr>



<tr> 


<th align="left">RUT Profesor evaluador 1: </td><td align="left"> 


                         <?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  


<?php foreach($tribunal as $tri){ ?>
             <?php if (($tri->id)==($eva->TRIBUNAL_id)) { ?>  


<?php foreach($conforman as $con){ ?>
             <?php if (($tri->id)==($con->TRIBUNAL_id)) { ?>  



 <?php foreach($profesor as $pro){ ?>
             <?php if (($pro->id)==($con->id)&& ($con->CON_tipoprofesor==1)) { ?>  


    <?php echo $pro->id;  ?> 
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


<th align="left">RUT Profesor evaluador 2: </td><td align="left"> 


                         <?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  


<?php foreach($tribunal as $tri){ ?>
             <?php if (($tri->id)==($eva->TRIBUNAL_id)) { ?>  


<?php foreach($conforman as $con){ ?>
             <?php if (($tri->id)==($con->TRIBUNAL_id)) { ?>  



 <?php foreach($profesor as $pro){ ?>
             <?php if (($pro->id)==($con->id)&& ($con->CON_tipoprofesor==2)) { ?>  


    <?php echo $pro->id;  ?> 




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


<th align="left">RUT Profesor evaluador 3: </td><td align="left"> 


                         <?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  


<?php foreach($tribunal as $tri){ ?>
             <?php if (($tri->id)==($eva->TRIBUNAL_id)) { ?>  


<?php foreach($conforman as $con){ ?>
             <?php if (($tri->id)==($con->TRIBUNAL_id)) { ?>  



 <?php foreach($profesor as $pro){ ?>
             <?php if (($pro->id)==($con->id) && ($con->CON_tipoprofesor==3)) { ?>  



    <?php echo $pro->id;  ?> 




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

<th align="left">Nota Profesor Director Informe: </th><td align="left"> 

<?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  

<?php echo $eva->EVA_NOTADIRIGEINFORME; ?>

  <?php } ?>

  <?php } ?>
               </td>
          </tr>


          <tr> 

<th align="left">Nota Profesor Director Exposición: </th><td align="left"> 

<?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  

<?php echo $eva->EVA_NOTADIRIGEEXPOSICION; ?>
  <?php } ?>

  <?php } ?>
               </td>
          </tr>

          <tr> 

<th align="left">Nota Informe Profesor evaluador 1: </th><td align="left"> 

<?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  

<?php echo $eva->EVA_NOTAPROFESOR1INFORME; ?>
  <?php } ?>

  <?php } ?>
               </td>
          </tr>


          <tr> 

<th align="left">Nota Exposición Profesor evaluador 1: </th><td align="left"> 

<?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  

<?php echo $eva->EVA_NOTAPROFESOR1EXPOSICION; ?>  <?php } ?>

  <?php } ?>
               </td>
          </tr>

             <tr> 

<th align="left">Nota Informe Profesor evaluador 2: </th><td align="left"> 

<?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  

<?php echo $eva->EVA_NOTAPROFESOR2INFORME; ?>
  <?php } ?>

  <?php } ?>
               </td>
          </tr>


          <tr> 

<th align="left">Nota Exposición Profesor evaluador 2: </th><td align="left"> 

<?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  

<?php echo $eva->EVA_NOTAPROFESOR2EXPOSICION; ?>  <?php } ?>

  <?php } ?>
               </td>
          </tr>


             <tr> 

<th align="left">Nota Informe Profesor evaluador 3: </th><td align="left"> 

<?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  

<?php echo $eva->EVA_NOTAPROFESOR3INFORME; ?>
  <?php } ?>

  <?php } ?>
               </td>
          </tr>


          <tr> 

<th align="left">Nota Exposición Profesor evaluador 3: </th><td align="left"> 

<?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  

<?php echo $eva->EVA_NOTAPROFESOR3EXPOSICION; ?>  <?php } ?>

  <?php } ?>
               </td>
          </tr>


             <tr> 

<th align="left">Nota Final Informe: </th><td align="left"> 

<?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  

<?php echo $eva->EVA_NOTAFINALINFORME; ?>  <?php } ?>

  <?php } ?>
               </td>
          </tr>


          <tr> 

<th align="left">Nota Final Exposición: </th><td align="left"> 

<?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  

<?php echo $eva->EVA_NOTAFINALEXPOSICION; ?> <?php } ?>

  <?php } ?>
               </td>
          </tr>



             <tr> 

<th align="left">Nota Final: </th><td align="left"> 

<?php foreach($evalua as $eva){ ?>

<?php if (($TES->id)==($eva->id)) { ?>  

<?php echo $eva->EVA_NOTAFINAL; ?>
  <?php } ?>

  <?php } ?>
               </td>
          </tr>


        


 </tbody>
     </table>


                       <!--<h5 align="right" class="box-title">Fecha : <?=  $date; ?></h5>-->
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fecha : <?=  $date; ?>




<div style="page-break-after:always;"></div>

    <?php } ?>
        <?php } ?>




     
<!-- /.box -->

             


  

</body>
</html>     

