<h1 class="page-header">Gestionar Alumnos   
</h1>

 <div class="pull-right">
        <a href="javascript:ajaxLoad('alumno/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nuevo alumno</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('alumno_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('alumno/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('alumno/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('alumno/list?field=id&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumno_field')=='id'?(Session::get('alumno_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

        <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>




 <th>
            <a href="javascript:ajaxLoad('alumno/list?field=ALU_PATERNO&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                Nombre Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumno_field')=='ALU_PATERNO'?(Session::get('alumno_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


<!--         <th>
            <a href="javascript:ajaxLoad('alumno/list?field=ALU_MATERNO&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumno_field')=='ALU_MATERNO'?(Session::get('alumno_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('alumno/list?field=ALU_NOMBRES&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumno_field')=='ALU_NOMBRES'?(Session::get('alumno_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

       
    <th>
            <a href="javascript:ajaxLoad('alumno/list?field=ALU_EMAIL&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumno_field')=='ALU_EMAIL'?(Session::get('alumno_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

          <th>
            <a href="javascript:ajaxLoad('alumno/list?field=ALU_TELEFONO&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                TELEFONO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumno_field')=='ALU_TELEFONO'?(Session::get('alumno_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
          <!--<th>
            <a href="javascript:ajaxLoad('alumno/list?field=ALU_PUNTAJE&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                PUNTAJE
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumno_field')=='ALU_PUNTAJE'?(Session::get('alumno_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
          <th>
            <a href="javascript:ajaxLoad('alumno/list?field=ALU_TITULO&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                TITULO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumno_field')=='ALU_TITULO'?(Session::get('alumno_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        <!--  <th>
            <a href="javascript:ajaxLoad('alumno/list?field=ALU_GRADO&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                GRADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumno_field')=='ALU_GRADO'?(Session::get('alumno_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


         <th>
            <a href="javascript:ajaxLoad('alumno/list?field=ALU_ESTADO&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                ESTADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumno_field')=='ALU_ESTADO'?(Session::get('alumno_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        <!--  <th>
            <a href="javascript:ajaxLoad('alumno/list?field=UNIVERSIDAD_id&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                universidad
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('alumno_field')=='UNIVERSIDAD_id'?(Session::get('alumno_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       <!-- <th>
            <a style:background-color:blue>
            Email <a>
        </th>-->

         <th>
            <a style:background-color:blue>
            Titulo<a>
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
    @foreach($alumnos as $key=>$alumno)
        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="left"> {{$alumno->id}}</td>


                                   <!-- <td align="left"> {{$alumno->ALU_PATERNO}}</td>

                        <td align="left"> {{$alumno->ALU_MATERNO}}</td>

                                    <td>{{$alumno->ALU_NOMBRES}}</td>-->

                                           <td align="left">    <?php echo $alumno->ALU_PATERNO;?>           <?php echo $alumno->ALU_MATERNO;?>        <?php echo $alumno->ALU_NOMBRES;?>  
</td>
                                                         <!--   <td align="left"> {{$alumno->ALU_EMAIL}}</td>-->


                        <!--<td align="right"> {{$alumno->ALU_TELEFONO}}</td>-->

                        <!--<td align="left"> {{$alumno->ALU_PUNTAJE}}</td>-->

                        <td align="left"> {{$alumno->ALU_TITULO}}</td>

                       <!-- <td align="left"> {{$alumno->ALU_GRADO}}</td>-->



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




      <!--   <td align="left">
    @foreach($universidads as $uni)


<?php if (($uni->id)==($alumno->UNIVERSIDAD_id)) { ?>               

    <?php echo $uni->UNI_NOMBRE; break; ?>

  <?php } ?>


    @endforeach
</td>-->
  

            <td style="text-align: center">

               <a role="button"  class="btn btn-warning  btn-circle"  title="Mostrar"
                   href="javascript:ajaxLoad('alumno/show2/{{$alumno->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('alumno/update/{{$alumno->id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('alumno/delete/{{$alumno->id}}')">
                    <i class="fa fa-times"></i> 
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
