<h1 class="page-header">Gestionar Solicitudes 
   
</h1>
 <div class="pull-right">
        <a href="javascript:ajaxLoad('solicitud/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nueva Solicitud</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('solicitud_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('solicitud/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Solicitud por Nombre o Año de la Solicitud"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('solicitud/list')}}?ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
        <th>
            <a href="javascript:ajaxLoad('solicitud/list?field=SOL_NOMBRE&sort={{Session::get("solicitud_sort")=="asc"?"desc":"asc"}}')">
                Nombre Solicitud
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('solicitud_field')=='SOL_NOMBRE'?(Session::get('solicitud_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

          <th>
            <a href="javascript:ajaxLoad('solicitud/list?field=SOL_DESCRIPCION&sort={{Session::get("solicitud_sort")=="asc"?"desc":"asc"}}')">
                Descripción
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('solicitud_field')=='SOL_DESCRIPCION'?(Session::get('solicitud_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('solicitud/list?field=SOL_ANO&sort={{Session::get("solicitud_sort")=="asc"?"desc":"asc"}}')">
                Semestre
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('solicitud_field')=='SOL_ANO'?(Session::get('solicitud_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

      

   
      
        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($solicituds as $key=>$solicitud)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$solicitud->SOL_NOMBRE}}</td>
                        <td align="left"> {{$solicitud->SOL_DESCRIPCION}}</td>

            <td align="left"> {{$solicitud->SOL_ANO}}-{{$solicitud->SOL_SEMESTRE}}</td>
   



            <td style="text-align: center">

            <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('solicitud/show2/{{$solicitud->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('solicitud/update/{{$solicitud->id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('solicitud/delete/{{$solicitud->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$solicituds->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$solicituds->total()}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
