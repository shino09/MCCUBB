<h1 class="page-header">Seleccione una Tesis (mostrando solo tesis sin dirigir)
    
</h1>

<div class="col-sm-7 form-group">
   <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('dirige9tesisupdate_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('dirige9/list2update/{{$id}}/{{$NUCLEO_id}}/{{$idviejo}}/{{$NUCLEO_idviejo}}?ok=1&search='+this.value)"
               placeholder="Buscar"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('dirige9/list2update/{{$id}}/{{$NUCLEO_id}}/{{$idviejo}}/{{$NUCLEO_idviejo}}?ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
      <!--  <th>
            <a href="javascript:ajaxLoad('dirige9tesiscreate/list?field=id&sort={{Session::get("dirige9tesisupdate_sort")=="asc"?"desc":"asc"}}')">
                RUT Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige9tesisupdate_field')=='id'?(Session::get('dirige9tesisupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
       


   <th>
            <a href="javascript:ajaxLoad('dirige9tesiscreate/list?field=ALU_PATERNO&sort={{Session::get("dirige9tesisupdate_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('dirige9tesisupdate_field')=='ALU_PATERNO'?(Session::get('dirige9tesisupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->




   <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>
 <!--<th>
            <a style:background-color:blue>
            Nombre Alumno<a>
        </th>-->
     
       
    <th>
            <a href="javascript:ajaxLoad('dirige9/list2update?field=ALU_PATERNO&sort={{Session::get("dirige9tesisupdate_sort")=="asc"?"desc":"asc"}}')">
                Nombre Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige9tesisupdate_field')=='ALU_PATERNO'?(Session::get('dirige9tesisupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
<!--
  <th>
            <a href="javascript:ajaxLoad('dirige9tesiscreate/list?field=ALU_PATERNO&sort={{Session::get("dirige9tesisupdate_sort")=="asc"?"desc":"asc"}}')">
                Semestre 
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('dirige9tesisupdate_field')=='ALU_PATERNO'?(Session::get('dirige9tesisupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('dirige9tesiscreate/list?field=ALU_NOMBRES&sort={{Session::get("dirige9tesisupdate_sort")=="asc"?"desc":"asc"}}')">
                Estado 
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('dirige9tesisupdate_field')=='ALU_NOMBRES'?(Session::get('dirige9tesisupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
      

         <th><a style:background-color:blue>
            Tesis<a>
        </th>
 <th>
            <a style:background-color:blue>
            Semestre<a>
        </th>
         <th>
          <a style:background-color:blue>
            Estado<a>
        </th>
       

     


        
        <th width="150px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
        @foreach($dirige9tesisupdate as $key=>$dirige9tesiscreate)

            @foreach($tesis as $tes)

<?php if (($dirige9tesiscreate->id)==($tes->ALUMNO_id)) { ?>    

        <tr>
            <td align="center">{{$i++}}</td>

                        <td>{{$dirige9tesiscreate->id}}</td>

            <td align="left">    <?php echo $dirige9tesiscreate->ALU_PATERNO;?>           <?php echo $dirige9tesiscreate->ALU_MATERNO;?>        <?php echo $dirige9tesiscreate->ALU_NOMBRES;?>  
</td>
                        

   
            



      <td align="left">




    <?php echo $tes->TES_NOMBRE;?></td>

     <td align="left"> {{$tes->TES_ANO}}-{{$tes->TES_SEMESTRE}} </td>



           <td align="left">                       <?php if ((0)==($tes->TES_ESTADO))       
                                                     {echo "Inscrita";  }

if ((1)==($tes->TES_ESTADO))              
    {echo "Renunciada";  }
  
 if ((2)==($tes->TES_ESTADO))               

   { echo "Postergada"; }

 
  if ((3)==($tes->TES_ESTADO)) 
    {echo "Reprobada"; }

 
  if ((4)==($tes->TES_ESTADO))               

   { echo "Aprobada";  }
 
   if ((5)==($tes->TES_ESTADO))                

   { echo "No cumpple requisito";  }

  ?>
      
  </td>



   




         
  

        <td style="text-align: center">

            <a class="btn btn-success btn-circle"
                   href="javascript:if(confirm('¿Esta seguro que quiere  selecionar esta tesis ?')) ajaxLoad('dirige9/update3/{{$tes->id}}/{{$NUCLEO_id}}/{{$idviejo}}/{{$NUCLEO_idviejo}}')">
                    <i class="fa fa-check-square-o"></i>  </a>


                <a class="btn btn-warning btn-circle" 
                   href="javascript:ajaxLoad('dirige9/showtesisupdate/{{$tes->id}}/{{$NUCLEO_id}}/{{$idviejo}}/{{$NUCLEO_idviejo}}')">
                    <i class="fa fa-eye"></i> </a>
              
            </td>
        </tr>
          <?php } ?>

            @endforeach

    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$dirige9tesisupdate->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total: {{$i-1}} registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('dirige9/update3/{{$id}}/{{$NUCLEO_id}}/{{$idviejo}}/{{$NUCLEO_idviejo}}')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>

</div>
<br>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
