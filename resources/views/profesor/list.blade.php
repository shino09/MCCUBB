<h1 class="page-header">Gestionar Profesores 
   
</h1>

 <div class="pull-right">
        <a href="javascript:ajaxLoad('profesor/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nuevo profesor</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('profesor_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('profesor/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Profesor por Apellido Paterno o RUT "
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('profesor/list')}}?ok=1&search='+$('#search').val())"><i
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
            RUT Profesor<a>
        </th>

<th>
            <a href="javascript:ajaxLoad('profesor/list?field=PRO_PATERNO&sort={{Session::get("profesor_sort")=="asc"?"desc":"asc"}}')">
                Nombre Profesor
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor_field')=='PRO_PATERNO'?(Session::get('profesor_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>





     <th><a style:background-color:blue>
            Titulo<a>
        </th>
     <th><a style:background-color:blue>
            Departamento<a>
        </th>

        <!--<th>
            <a href="javascript:ajaxLoad('profesor/list?field=id&sort={{Session::get("profesor_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor_field')=='id'?(Session::get('profesor_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

       



 <th>
            <a href="javascript:ajaxLoad('profesor/list?field=PRO_PATERNO&sort={{Session::get("profesor_sort")=="asc"?"desc":"asc"}}')">
                Apellido Paterno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor_field')=='PRO_PATERNO'?(Session::get('profesor_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


         <th>
            <a href="javascript:ajaxLoad('profesor/list?field=PRO_MATERNO&sort={{Session::get("profesor_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor_field')=='PRO_MATERNO'?(Session::get('profesor_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('profesor/list?field=PRO_NOMBRES&sort={{Session::get("profesor_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor_field')=='PRO_NOMBRES'?(Session::get('profesor_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

       
    <th>
            <a href="javascript:ajaxLoad('profesor/list?field=PRO_EMAIL&sort={{Session::get("profesor_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor_field')=='PRO_EMAIL'?(Session::get('profesor_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('profesor/list?field=PRO_TITULO&sort={{Session::get("profesor_sort")=="asc"?"desc":"asc"}}')">
                TITULO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor_field')=='PRO_TITULO'?(Session::get('profesor_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('profesor/list?field=PRO_GRADO&sort={{Session::get("profesor_sort")=="asc"?"desc":"asc"}}')">
                GRADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor_field')=='PRO_GRADO'?(Session::get('profesor_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

<!--

    <th>
            <a href="javascript:ajaxLoad('profesor/list?field=PRO_TELEFONO&sort={{Session::get("profesor_sort")=="asc"?"desc":"asc"}}')">
                TELEFONO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor_field')=='PRO_TELEFONO'?(Session::get('profesor_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('profesor/list?field=DEPARTAMENTO_id&sort={{Session::get("profesor_sort")=="asc"?"desc":"asc"}}')">
                Departamento
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor_field')=='DEPARTAMENTO_id'?(Session::get('profesor_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


          
        <th width="150px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($PROFESOR as $key=>$profesor)
        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="left"> {{$profesor->id}}</td>

                                      <td align="left">    <?php echo $profesor->PRO_PATERNO;?>           <?php echo $profesor->PRO_MATERNO;?>        <?php echo $profesor->PRO_NOMBRES;?>  
</td>

                        <td align="left"> {{$profesor->PRO_TITULO}}</td>



                                <!--    <td align="left"> {{$profesor->PRO_PATERNO}}</td>

                        <td align="left"> {{$profesor->PRO_MATERNO}}</td>

                                    <td>{{$profesor->PRO_NOMBRES}}</td>

                        <td align="left"> {{$profesor->PRO_EMAIL}}</td>

                        <td align="left"> {{$profesor->PRO_GRADO}}</td>-->
                      <!--  <td align="right"> {{$profesor->PRO_TELEFONO}}</td>-->






            <td align="left">
    @foreach($DEPARTAMENTO as $depa)


<?php if (($depa->id)==($profesor->DEPARTAMENTO_id)) { ?>               

    <?php echo $depa->DEP_NOMBRE; break;?>

  <?php } ?>


    @endforeach
</td>


   



    

            <td style="text-align: center">

               <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('profesor/show2/{{$profesor->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('profesor/update/{{$profesor->id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('profesor/delete/{{$profesor->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$PROFESOR->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$PROFESOR->total()}} Registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
