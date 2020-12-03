<h1 class="page-header">Alumnos Orientados por Profesor   
</h1>

 <div class="pull-right">
        <a href="javascript:ajaxLoad('orienta6/list2create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Orientar un nuevo Alumno</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('orienta6_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('orienta6/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('orienta6/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('orienta6/list?field=id&sort={{Session::get("orienta6_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta6_field')=='id'?(Session::get('orienta6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

        <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>




 <th>
            <a href="javascript:ajaxLoad('orienta6/list?field=ALU_PATERNO&sort={{Session::get("orienta6_sort")=="asc"?"desc":"asc"}}')">
                Nombre Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta6_field')=='ALU_PATERNO'?(Session::get('orienta6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th><a style:background-color:blue>
            RUT Profesor<a>
        </th>



 <th><a style:background-color:blue>
            RUT Profesor<a>
        </th>




<!--         <th>
            <a href="javascript:ajaxLoad('orienta6/list?field=ALU_MATERNO&sort={{Session::get("orienta6_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta6_field')=='ALU_MATERNO'?(Session::get('orienta6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('orienta6/list?field=ALU_NOMBRES&sort={{Session::get("orienta6_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta6_field')=='ALU_NOMBRES'?(Session::get('orienta6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

       
    <th>
            <a href="javascript:ajaxLoad('orienta6/list?field=ALU_EMAIL&sort={{Session::get("orienta6_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta6_field')=='ALU_EMAIL'?(Session::get('orienta6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

          <th>
            <a href="javascript:ajaxLoad('orienta6/list?field=ALU_TELEFONO&sort={{Session::get("orienta6_sort")=="asc"?"desc":"asc"}}')">
                TELEFONO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta6_field')=='ALU_TELEFONO'?(Session::get('orienta6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
          <!--<th>
            <a href="javascript:ajaxLoad('orienta6/list?field=ALU_PUNTAJE&sort={{Session::get("orienta6_sort")=="asc"?"desc":"asc"}}')">
                PUNTAJE
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta6_field')=='ALU_PUNTAJE'?(Session::get('orienta6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
          <th>
            <a href="javascript:ajaxLoad('orienta6/list?field=ALU_TITULO&sort={{Session::get("orienta6_sort")=="asc"?"desc":"asc"}}')">
                TITULO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta6_field')=='ALU_TITULO'?(Session::get('orienta6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        <!--  <th>
            <a href="javascript:ajaxLoad('orienta6/list?field=ALU_GRADO&sort={{Session::get("orienta6_sort")=="asc"?"desc":"asc"}}')">
                GRADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta6_field')=='ALU_GRADO'?(Session::get('orienta6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


         <th>
            <a href="javascript:ajaxLoad('orienta6/list?field=ALU_ESTADO&sort={{Session::get("orienta6_sort")=="asc"?"desc":"asc"}}')">
                ESTADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta6_field')=='ALU_ESTADO'?(Session::get('orienta6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        <!--  <th>
            <a href="javascript:ajaxLoad('orienta6/list?field=UNIVERSIDAD_id&sort={{Session::get("orienta6_sort")=="asc"?"desc":"asc"}}')">
                universidad
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta6_field')=='UNIVERSIDAD_id'?(Session::get('orienta6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       <!-- <th>
            <a style:background-color:blue>
            Email <a>
        </th>-->

    


        <th width="150px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($orienta6s as $key=>$orienta6)
        @foreach($orienta as $key=>$ori)
 <?php if (($orienta6->id)==($ori->ALUMNO_id)) { ?>  


    @foreach($profesor as $key=>$pro)
 <?php if (($pro->id)==($ori->id)) { ?>  


        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="left"> {{$orienta6->id}}</td>


                                   <!-- <td align="left"> {{$orienta6->ALU_PATERNO}}</td>

                        <td align="left"> {{$orienta6->ALU_MATERNO}}</td>

                                    <td>{{$orienta6->ALU_NOMBRES}}</td>-->

                                           <td align="left">    <?php echo $orienta6->ALU_PATERNO;?>           <?php echo $orienta6->ALU_MATERNO;?>        <?php echo $orienta6->ALU_NOMBRES;?>  
</td>
                                                         <!--   <td align="left"> {{$orienta6->ALU_EMAIL}}</td>-->


                        <!--<td align="right"> {{$orienta6->ALU_TELEFONO}}</td>-->

                        <!--<td align="left"> {{$orienta6->ALU_PUNTAJE}}</td>-->

                                                <td align="left"> {{$pro->id}}</td>


                                        <td align="left">    <?php echo $pro->PRO_PATERNO;?>           <?php echo $pro->PRO_MATERNO;?>        <?php echo $pro->PRO_NOMBRES;?>  
</td>
  

            <td style="text-align: center">

                     <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('orienta6/show2/{{$ori->id}}/{{$ori->ALUMNO_id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('orienta6/update3/{{$ori->id}}/{{$ori->ALUMNO_id}}/{{$ori->id}}/{{$ori->ALUMNO_id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('orienta6/delete/{{$ori->ALUMNO_id}}/{{$ori->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
           <?php } ?>
    @endforeach
           <?php } ?>
    @endforeach
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$orienta6s->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$i-1}} Registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
