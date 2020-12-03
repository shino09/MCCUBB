<h1 class="page-header">Ficha Tesis Terminadas (con nota)
    
</h1>
  <a href="crear_reporte_portesistodos5/2" title="Descargar PDF" type="button" target="_blank" class="btn btn-success pull-right"><i class="fa fa-save"></i> Todos las Tesis</a>
        <a href="crear_reporte_portesistodos5/1" title="Veer PDF" type="button" target="_blank"  class="btn btn-primary pull-right"><i class="fa fa-eye"></i> Todas las Tesis</a>

    </div>

<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('tesisreportes5_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('tesisreportes5/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Tesis por  Apellido Paterno o RUT del Alumno Tesista"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('tesisreportes5/list')}}?ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
     
        

 <!--<th>
            <a href="javascript:ajaxLoad('tesisreportes5/list?field=id&sort={{Session::get("tesisreportes5_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tesisreportes5_field')=='id'?(Session::get('tesisreportes5_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


 <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>



 <th>
            <a href="javascript:ajaxLoad('tesisreportes5/list?field=ALU_PATERNO&sort={{Session::get("tesisreportes5_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tesisreportes5_field')=='ALU_PATERNO'?(Session::get('tesisreportes5_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

<th><a style:background-color:blue>
            Tesis<a>
        </th>

        <th><a style:background-color:blue>
            Profesor 1<a>
        </th>


        <th><a style:background-color:blue>
            Profesor 2<a>
        </th>

        <th><a style:background-color:blue>
            Profesor 3<a>
        </th>

        <!--
<th>
            <a href="javascript:ajaxLoad('tesisreportes5/list?field=id&sort={{Session::get("tesisreportes5_sort")=="asc"?"desc":"asc"}}')">
                Tesis
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tesisreportes5_field')=='id'?(Session::get('tesisreportes5_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

        <th>
            <a href="javascript:ajaxLoad('tesisreportes5/list?field=id&sort={{Session::get("tesisreportes5_sort")=="asc"?"desc":"asc"}}')">
                Profesor 1
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tesisreportes5_field')=='id'?(Session::get('tesisreportes5_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('tesisreportes5/list?field=id&sort={{Session::get("tesisreportes5_sort")=="asc"?"desc":"asc"}}')">
Profesor 2            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tesisreportes5_field')=='id'?(Session::get('tesisreportes5_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('tesisreportes5/list?field=id&sort={{Session::get("tesisreportes5_sort")=="asc"?"desc":"asc"}}')">
Profesor 3            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tesisreportes5_field')=='id'?(Session::get('tesisreportes5_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
          

    @foreach($evaluaalumno as $key=>$aal)

      @foreach($evaluatodos as $key=>$asi)
                        @foreach($evaluatesis as $key=>$evt)
                                <?php if (($evt->id)==($asi->id)) { ?>  


                                <?php if (($evt->ALUMNO_id)==($aal->id) && (($evt->EVA_NOTAFINAL)!=0) && (($evt->EVA_NOTAFINAL)!=NULL) ) { ?>  


        <tr>
            <td align="center">{{$i++}}</td>


           

                   <td align="left"> {{$aal->id}}</td>



  <td align="left">
  

        <?php echo $aal->ALU_PATERNO;  ?>

    <?php echo $aal->ALU_MATERNO; ?>
        <?php echo $aal->ALU_NOMBRES;  ?>






</td>


                                

          <td align="left">
   
    <?php echo $evt->TES_NOMBRE;   ?>

 
</td>



    @foreach($TRIBUNAL as $TRI)


<?php if (($TRI->id)==($asi->TRIBUNAL_id)) { ?>               


@foreach($conforman as $con)


<?php if (($TRI->id)==($con->TRIBUNAL_id)) { ?>               


@foreach($profesor as $pro)


<?php if (($pro->id)==($con->id)&& $con->CON_tipoprofesor==1) { ?>               
        <td align="left">   


    <?php echo $pro->PRO_PATERNO;  ?>
        <?php echo $pro->PRO_MATERNO;  ?>
          <?php echo $pro->PRO_NOMBRES;  break;?>


</td>


  <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach

      @foreach($TRIBUNAL as $TRI)


<?php if (($TRI->id)==($asi->TRIBUNAL_id)) { ?>               


@foreach($conforman as $con)


<?php if (($TRI->id)==($con->TRIBUNAL_id)) { ?>               


@foreach($profesor as $pro)


<?php if (($pro->id)==($con->id)&& $con->CON_tipoprofesor==2) { ?>               
        <td align="left">   


    <?php echo $pro->PRO_PATERNO;  ?>
        <?php echo $pro->PRO_MATERNO;  ?>
          <?php echo $pro->PRO_NOMBRES;  break;?>


</td>


  <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach


   @foreach($TRIBUNAL as $TRI)


<?php if (($TRI->id)==($asi->TRIBUNAL_id)) { ?>               


@foreach($conforman as $con)


<?php if (($TRI->id)==($con->TRIBUNAL_id)) { ?>               


@foreach($profesor as $pro)


<?php if (($pro->id)==($con->id)&& $con->CON_tipoprofesor==3) { ?>               
        <td align="left">   


    <?php echo $pro->PRO_PATERNO;  ?>
        <?php echo $pro->PRO_MATERNO;  ?>
          <?php echo $pro->PRO_NOMBRES;  break;?>


</td>


  <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach


   

          <td style="text-align: center">

                 <a href="crear_reporte_portesissolo5/{{$asi->id}}/{{$asi->TRIBUNAL_id}}/1" title="Veer PDF" target="_blank" class="btn btn-primary btn-circle" >     <i class="fa fa-eye"></i> 
</a>
<a href="crear_reporte_portesissolo5/{{$asi->id}}/{{$asi->TRIBUNAL_id}}/2" title="Descargar PDF" target="_blank" class="btn btn-success btn-circle" >     <i class="fa fa-save"></i> 
</a>
            </td>
        </tr>
          <?php } ?>

                 <?php } ?>
                     @endforeach


    @endforeach
        @endforeach

    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$evaluaalumno->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total:         Total: {{$i-1}} 
 registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
