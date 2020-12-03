<h1 class="page-header">Gestionar Revistas 
    
</h1>
<div class="pull-right">
        <a href="javascript:ajaxLoad('revista/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nueva Revista</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('revista_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('revista/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Revista por Nombre o Año de la Revista"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('revista/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('revista/list?field=REV_NOMBRE&sort={{Session::get("revista_sort")=="asc"?"desc":"asc"}}')">
                Nombre Revista
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('revista_field')=='REV_NOMBRE'?(Session::get('revista_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('revista/list?field=REV_DESCRIPCION&sort={{Session::get("revista_sort")=="asc"?"desc":"asc"}}')">
                Descripción
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('revista_field')=='REV_DESCRIPCION'?(Session::get('revista_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('revista/list?field=REV_ANO&sort={{Session::get("revista_sort")=="asc"?"desc":"asc"}}')">
                Año
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('revista_field')=='REV_ANO'?(Session::get('revista_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
       
        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($revistas as $key=>$revista)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$revista->REV_NOMBRE}}</td>
            <td align="left"> {{$revista->REV_DESCRIPCION}}</td>
   
               <td align="left"> {{$revista->REV_ANO}}</td>



            <td style="text-align: center">

            <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('revista/show2/{{$revista->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('revista/update/{{$revista->id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('revista/delete/{{$revista->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$revistas->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$revistas->total()}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
