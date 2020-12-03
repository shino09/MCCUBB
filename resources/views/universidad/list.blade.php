<h1 class="page-header">Gestionar Universidades 
    
</h1>

<div class="pull-right">
        <a href="javascript:ajaxLoad('universidad/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nueva Universidad</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('universidad_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('universidad/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Universidad por Nombre o Ciudad  de la Universidad"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('universidad/list')}}?ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>

       <!-- <th>
            <a href="javascript:ajaxLoad('universidad/list?field=id&sort={{Session::get("universidad_sort")=="asc"?"desc":"asc"}}')">
                id
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('universidad_field')=='id'?(Session::get('universidad_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
        <th>
            <a href="javascript:ajaxLoad('universidad/list?field=UNI_NOMBRE&sort={{Session::get("universidad_sort")=="asc"?"desc":"asc"}}')">
                Nombre Universidad
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('universidad_field')=='UNI_NOMBRE'?(Session::get('universidad_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('universidad/list?field=UNI_CIUDAD&sort={{Session::get("universidad_sort")=="asc"?"desc":"asc"}}')">
                Ciudad
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('universidad_field')=='UNI_CIUDAD'?(Session::get('universidad_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>



        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($universidads as $key=>$universidad)
        <tr>
            <td align="center">{{$i++}}</td>
                       <!-- <td>{{$universidad->id}}</td>-->

            <td>{{$universidad->UNI_NOMBRE}}</td>
            <td align="left"> {{$universidad->UNI_CIUDAD}}</td>
   



            <td style="text-align: center">

            <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('universidad/show2/{{$universidad->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('universidad/update/{{$universidad->id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('universidad/delete/{{$universidad->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$universidads->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$universidads->total()}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
