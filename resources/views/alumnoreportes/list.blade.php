<h1 class="page-header">Ficha Alumnos
   
</h1>

 <div class="pull-right">
  <a href="crear_reporte_poralumnotodos/2" title="Descargar PDF"  type="button" target="_blank" class="btn btn-success pull-right"><i class="fa fa-save"></i> Todos los Alumnos</a>
        <a href="crear_reporte_poralumnotodos/1" title="Veer PDF" type="button" target="_blank"  class="btn btn-primary pull-right"><i class="fa fa-eye"></i> Todos los Alumnos</a>

    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('alumnoreportes_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('alumnoreportes/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('alumnoreportes/list')}}?ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
     
     <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>


       



 <th >
            <a href="javascript:ajaxLoad('alumnoreportes/list?field=ALU_PATERNO&sort={{Session::get("alumnoreportes_sort")=="asc"?"desc":"asc"}}')">
                Nombre Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumnoreportes_field')=='ALU_PATERNO'?(Session::get('alumnoreportes_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


        <!-- <th>
            <a href="javascript:ajaxLoad('alumnoreportes/list?field=ALU_MATERNO&sort={{Session::get("alumnoreportes_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumnoreportes_field')=='ALU_MATERNO'?(Session::get('alumnoreportes_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('alumnoreportes/list?field=name&sort={{Session::get("alumnoreportes_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumnoreportes_field')=='name'?(Session::get('alumnoreportes_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       
    <!--<th>
            <a href="javascript:ajaxLoad('alumnoreportes/list?field=ALU_EMAIL&sort={{Session::get("alumnoreportes_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumnoreportes_field')=='ALU_EMAIL'?(Session::get('alumnoreportes_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


<!--
          <th>
            <a href="javascript:ajaxLoad('alumnoreportes/list?field=ALU_TELEFONO&sort={{Session::get("alumnoreportes_sort")=="asc"?"desc":"asc"}}')">
                TELEFONO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumnoreportes_field')=='ALU_TELEFONO'?(Session::get('alumnoreportes_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
          <!--<th>
            <a href="javascript:ajaxLoad('alumnoreportes/list?field=ALU_PUNTAJE&sort={{Session::get("alumnoreportes_sort")=="asc"?"desc":"asc"}}')">
                PUNTAJE
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumnoreportes_field')=='ALU_PUNTAJE'?(Session::get('alumnoreportes_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
          <!--<th>
            <a href="javascript:ajaxLoad('alumnoreportes/list?field=ALU_TITULO&sort={{Session::get("alumnoreportes_sort")=="asc"?"desc":"asc"}}')">
                TITULO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumnoreportes_field')=='ALU_TITULO'?(Session::get('alumnoreportes_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
          <th>
            <a href="javascript:ajaxLoad('alumnoreportes/list?field=ALU_GRADO&sort={{Session::get("alumnoreportes_sort")=="asc"?"desc":"asc"}}')">
                GRADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumnoreportes_field')=='ALU_GRADO'?(Session::get('alumnoreportes_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


         <th>
            <a href="javascript:ajaxLoad('alumnoreportes/list?field=ALU_ESTADO&sort={{Session::get("alumnoreportes_sort")=="asc"?"desc":"asc"}}')">
                ESTADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumnoreportes_field')=='ALU_ESTADO'?(Session::get('alumnoreportes_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
          <th>
            <a href="javascript:ajaxLoad('alumnoreportes/list?field=UNIVERSIDAD_id&sort={{Session::get("alumnoreportes_sort")=="asc"?"desc":"asc"}}')">
                universidad
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumnoreportes_field')=='UNIVERSIDAD_id'?(Session::get('alumnoreportes_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->



        <!-- 



          <th><a style:background-color:blue>
          Email<a>
        </th>

 <th><a style:background-color:blue>
            Titulo<a>
        </th>

  <th><a style:background-color:blue>
            Grado<a>
        </th>

          <th><a style:background-color:blue>
            Estado<a>
        </th>


  <th><a style:background-color:blue>
            Universidad<a>
        </th>-->


       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($alumnos as $key=>$alumno)
        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="left"> {{$alumno->id}}</td>


                                    <td align="left"> {{$alumno->ALU_PATERNO}}  {{$alumno->ALU_MATERNO}}  {{$alumno->ALU_NOMBRES}}</td>

                     <!--   <td align="left"> </td>

                                    <td></td>-->
                                                 <!--           <td align="left"> {{$alumno->ALU_EMAIL}}</td>


                        <!--<td align="right"> {{$alumno->ALU_TELEFONO}}</td>-->

                        <!--<td align="left"> {{$alumno->ALU_PUNTAJE}}</td>-->

                      <!--  <td align="left"> {{$alumno->ALU_TITULO}}</td>

                        <td align="left"> {{$alumno->ALU_GRADO}}</td>



                                                <td align="left"> 
                                                <?php if ((0)==($alumno->ALU_ESTADO))       
                                                     {echo "Vigente";  }

if ((1)==($alumno->ALU_ESTADO))              
    {echo "Retiro Temporal";  }
  
 if ((2)==($alumno->ALU_ESTADO))               

   { echo "Egresado"; }

 
  if ((3)==($alumno->ALU_ESTADO)) 
    {echo "Titulado"; }

 
  if ((4)==($alumno->ALU_ESTADO))               

   { echo "Perdida de carrera";  }
 
   if ((5)==($alumno->ALU_ESTADO))                

   { echo "Tesis";  }

  ?>
      
  </td>




         <td align="left">
    @foreach($universidads as $uni)


<?php if (($uni->id)==($alumno->UNIVERSIDAD_id)) { ?>               

    <?php echo $uni->UNI_NOMBRE; break; ?>

  <?php } ?>


    @endforeach
</td>-->
  

            <td style="text-align: center">



<a href="crear_reporte_poralumnosolo/{{$alumno->id}}/1" title="Veer PDF" target="_blank" class="btn btn-primary btn-circle" >     <i class="fa fa-eye"></i> 
</a>
<a href="crear_reporte_poralumnosolo/{{$alumno->id}}/2" title="Descargar PDF" target="_blank" class="btn btn-success btn-circle" >     <i class="fa fa-save"></i> 
</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$alumnos->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$alumnos->total()}} Registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
