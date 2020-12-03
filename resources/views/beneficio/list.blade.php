<h1 class="page-header">Gestionar Beneficios 
   
</h1>
 <div class="pull-right">
        <a href="javascript:ajaxLoad('beneficio/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nuevo Beneficio</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('beneficio_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('beneficio/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Beneficio por Nombre del Beneficio"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('beneficio/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('beneficio/list?field=BEN_NOMBRE&sort={{Session::get("beneficio_sort")=="asc"?"desc":"asc"}}')">
                Nombre Beneficio
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('beneficio_field')=='BEN_NOMBRE'?(Session::get('beneficio_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('beneficio/list?field=BEN_DESCRIPCION&sort={{Session::get("beneficio_sort")=="asc"?"desc":"asc"}}')">
                Descripción
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('beneficio_field')=='BEN_DESCRIPCION'?(Session::get('beneficio_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


   
        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($beneficios as $key=>$beneficio)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$beneficio->BEN_NOMBRE}}</td>
            <td align="left"> {{$beneficio->BEN_DESCRIPCION}}</td>
   
            


            <td style="text-align: center">

            <a role="button"  class="btn btn-warning  btn-circle"  title="Mostrar"
                   href="javascript:ajaxLoad('beneficio/show2/{{$beneficio->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('beneficio/update/{{$beneficio->id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('beneficio/delete/{{$beneficio->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$beneficios->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$beneficios->total()}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
