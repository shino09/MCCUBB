<h1 class="page-header">Gestionar Trabajos 
   
</h1>
 <div class="pull-right">
        <a href="javascript:ajaxLoad('trabajo/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nuevo Trabajo</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('trabajo_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('trabajo/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Trabajo por Nombre del Trabajo o Empresa"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('trabajo/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('trabajo/list?field=TRA_NOMBRE&sort={{Session::get("trabajo_sort")=="asc"?"desc":"asc"}}')">
                Nombre Trabajo
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('trabajo_field')=='TRA_NOMBRE'?(Session::get('trabajo_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('trabajo/list?field=TRA_EMPRESA&sort={{Session::get("trabajo_sort")=="asc"?"desc":"asc"}}')">
                Empresa
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('trabajo_field')=='TRA_EMPRESA'?(Session::get('trabajo_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('trabajo/list?field=TRA_CIUDAD&sort={{Session::get("trabajo_sort")=="asc"?"desc":"asc"}}')">
                Ciudad
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('trabajo_field')=='TRA_CIUDAD'?(Session::get('trabajo_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


   
   
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($trabajos as $key=>$trabajo)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$trabajo->TRA_NOMBRE}}</td>
   
               <td align="left"> {{$trabajo->TRA_EMPRESA}}</td>
                           <td align="left"> {{$trabajo->TRA_CIUDAD}}</td>




            <td style="text-align: center">

            <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('trabajo/show2/{{$trabajo->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('trabajo/update/{{$trabajo->id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('trabajo/delete/{{$trabajo->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$trabajos->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$trabajos->total()}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
