<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte Por alumno</title>
<style>
 
 .col-md-12 {
    width: 100%;
} 

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    background-color: #ECF0F5;
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}


.box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;

}


.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}


.table-bordered {
    border: 1px solid #f4f4f4;
}


.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

table {
    background-color: transparent;
}

 .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #f4f4f4;
}


.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
}

.bg-red {
    background-color: #dd4b39 !important;
}


</style>
	  
</head>
<body>
                  <?php foreach($alumno as $alu){ ?>

                        <?php if (($alu->id)==($id)) { ?>  

      
                  
  <?php echo $alu->id; ?>  
     
      

  <?php echo $alu->ALU_NOMBRES; ?>  
          
 

   <?php echo $alu->ALU_PATERNO; ?>  
          
 

    <?php echo $alu->ALU_MATERNO; ?>  
          
 

   <?php echo $alu->ALU_TELEFONO; ?>  
          
 

 <?php echo $alu->ALU_TITULO; ?>  
          
 

     
  

                                             
                                                <?php if ((0)==($alu->ALU_ESTADO))       
                                                     {echo "Vigente";  }

if ((1)==($alu->ALU_ESTADO))              
    {echo "Retiro Temporal";  }
  
 if ((2)==($alu->ALU_ESTADO))               

   { echo "Egresado"; }

 
  if ((3)==($alu->ALU_ESTADO)) 
    {echo "Titulado"; }

 
  if ((4)==($alu->ALU_ESTADO))               

   { echo "Perdida de carrera";  }
 
   if ((5)==($alu->ALU_ESTADO))                

   { echo "Tesis";  }

  ?>
      
  
         


  <?php echo $alu->ALU_EMAIL; ?>  
     
      

                  <?php foreach($universidads as $uni){ ?>


<?php if (($uni->id)==($alu->UNIVERSIDAD_id)) { ?>               

  <?php echo $uni->UNI_NOMBRE; break; ?>

  <?php } ?>



  

  <?php } ?>



                  <?php foreach($asiste as $asi){ ?>


<?php if (($asi->id)==($alu->id)) { ?>  

                  <?php foreach($congreso as $con){ ?>
             <?php if (($asi->CONGRESO_id)==($con->id)) { ?>  


  <?php echo $con->CON_NOMBRE;  ?>

  <?php } ?>



  

  <?php } ?>
    <?php } ?>

  <?php } ?>
  <?php } ?>
    <?php } ?>



          
           
</body>
</html>