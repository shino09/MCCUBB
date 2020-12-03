<h1 class="page-header">Gestionar Congresos 
   
</h1>


 <div class="pull-right">
        <a href="javascript:ajaxLoad('congreso/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nuevo Congreso</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('congreso_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('congreso/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Congreso por Nombre del Congreso"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('congreso/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('congreso/list?field=id&sort={{Session::get("congreso_sort")=="asc"?"desc":"asc"}}')">
                CON_ID
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('congreso_field')=='id'?(Session::get('congreso_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       
        <th>
            <a href="javascript:ajaxLoad('congreso/list?field=CON_NOMBRE&sort={{Session::get("congreso_sort")=="asc"?"desc":"asc"}}')">
                Nombre Congreso
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('congreso_field')=='CON_NOMBRE'?(Session::get('congreso_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>



        <th>
            <a href="javascript:ajaxLoad('congreso/list?field=CON_CIUDAD&sort={{Session::get("congreso_sort")=="asc"?"desc":"asc"}}')">
                Ciudad
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('congreso_field')=='CON_CIUDAD'?(Session::get('congreso_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('congreso/list?field=CON_ANO&sort={{Session::get("congreso_sort")=="asc"?"desc":"asc"}}')">
                Año
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('congreso_field')=='CON_ANO'?(Session::get('congreso_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
     
        
        <th width="150px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($congresos as $key=>$congreso)
        <tr>
            <td align="center">{{$i++}}</td>
                       <!-- <td>{{$congreso->id}}</td>-->

            <td>{{$congreso->CON_NOMBRE}}</td>
            <td align="left"> {{$congreso->CON_CIUDAD}}</td>
   
               <td align="left"> {{$congreso->CON_ANO}}</td>



            <td style="text-align: center">

            <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('congreso/show2/{{$congreso->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('congreso/update/{{$congreso->id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('congreso/delete/{{$congreso->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$congresos->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$congresos->total()}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
