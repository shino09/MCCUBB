<h1 class="page-header">Seleccione una Tesis (mostrando solo tesis sin dirigir)
    
</h1>

<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('dirige8tesiscreate_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('dirige8/list2create')}}?ok=1&search='+this.value)"
               placeholder="Buscar Tesis por Apellido Paterno o RUT del Alumno Tesista"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('dirige8/list2create')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('dirige8tesiscreate/list?field=id&sort={{Session::get("dirige8tesiscreate_sort")=="asc"?"desc":"asc"}}')">
                RUT Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige8tesiscreate_field')=='id'?(Session::get('dirige8tesiscreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
       


   <th>
            <a href="javascript:ajaxLoad('dirige8tesiscreate/list?field=ALU_PATERNO&sort={{Session::get("dirige8tesiscreate_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('dirige8tesiscreate_field')=='ALU_PATERNO'?(Session::get('dirige8tesiscreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
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
            <a href="javascript:ajaxLoad('dirige8/list2create?field=ALU_PATERNO&sort={{Session::get("dirige8tesiscreate_sort")=="asc"?"desc":"asc"}}')">
                Nombre Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige8tesiscreate_field')=='ALU_PATERNO'?(Session::get('dirige8tesiscreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
<!--
  <th>
            <a href="javascript:ajaxLoad('dirige8tesiscreate/list?field=ALU_PATERNO&sort={{Session::get("dirige8tesiscreate_sort")=="asc"?"desc":"asc"}}')">
                Semestre 
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('dirige8tesiscreate_field')=='ALU_PATERNO'?(Session::get('dirige8tesiscreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('dirige8tesiscreate/list?field=ALU_NOMBRES&sort={{Session::get("dirige8tesiscreate_sort")=="asc"?"desc":"asc"}}')">
                Estado 
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('dirige8tesiscreate_field')=='ALU_NOMBRES'?(Session::get('dirige8tesiscreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
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
        @foreach($dirige8tesiscreates as $key=>$dirige8tesiscreate)

            @foreach($tesis as $tes)

<?php if (($dirige8tesiscreate->id)==($tes->ALUMNO_id)) { ?>    

        <tr>
            <td align="center">{{$i++}}</td>

                        <td>{{$dirige8tesiscreate->id}}</td>

            <td align="left">    <?php echo $dirige8tesiscreate->ALU_PATERNO;?>           <?php echo $dirige8tesiscreate->ALU_MATERNO;?>        <?php echo $dirige8tesiscreate->ALU_NOMBRES;?>  
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

            <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere selecionar  esta tesis?')) ajaxLoad('dirige8/list3create/{{$tes->id}}')"><i class="fa fa-check-square-o"></i> 
                     </a>

             


                <a class="btn btn-warning btn-circle" title="Show4"
                   href="javascript:ajaxLoad('dirige8/showtesiscreate/{{$tes->id}}')">
                    <i class="fa fa-eye"></i> </a>
              
            </td>
        </tr>
          <?php } ?>

            @endforeach

    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$dirige8tesiscreates->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total: {{$i-1}} registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('dirige8/list')" class="btn btn-danger"><i
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
