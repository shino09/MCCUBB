<h1 class="page-header">Gestionar Departamentos
   
</h1>

 <div class="pull-right">
        <a href="javascript:ajaxLoad('departamento/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nuevo Departamento</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('departamento_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('departamento/list')}}?ok=1&search='+this.value)"
                              placeholder="Buscar Departmaneto por Nombre del Departamento"


               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('departamento/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('departamento/list?field=DEP_NOMBRE&sort={{Session::get("departamento_sort")=="asc"?"desc":"asc"}}')">
                Nombre Departamento
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('departamento_field')=='DEP_NOMBRE'?(Session::get('departamento_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('departamento/list?field=DEP_FACULTAD&sort={{Session::get("departamento_sort")=="asc"?"desc":"asc"}}')">
                Facualtad
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('departamento_field')=='DEP_FACULTAD'?(Session::get('departamento_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($DEPARTAMENTO as $key=>$departamento)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$departamento->DEP_NOMBRE}}</td>
            <td align="left"> {{$departamento->DEP_FACULTAD}}</td>
   

            <td style="text-align: center">

            <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('departamento/show2/{{$departamento->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('departamento/update/{{$departamento->id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('departamento/delete/{{$departamento->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$DEPARTAMENTO->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$DEPARTAMENTO->total()}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
