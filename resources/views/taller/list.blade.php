<h1 class="page-header">Gestionar Talleres 
   
</h1>
 <div class="pull-right">
        <a href="javascript:ajaxLoad('taller/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nuevo Taller</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('taller_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('taller/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Taller por Nombre o AÑo del Taller"               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('taller/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('taller/list?field=TAL_NOMBRE&sort={{Session::get("taller_sort")=="asc"?"desc":"asc"}}')">
                Nombre del Taller
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('taller_field')=='TAL_NOMBRE'?(Session::get('taller_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
       


    <th>
            <a href="javascript:ajaxLoad('taller/list?field=TAL_ANO&sort={{Session::get("taller_sort")=="asc"?"desc":"asc"}}')">
                Año del Taller
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('taller_field')=='TAL_ANO'?(Session::get('taller_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
      
        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($tallers as $key=>$taller)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$taller->TAL_NOMBRE}}</td>
   
               <td align="left"> {{$taller->TAL_ANO}}</td>



            <td style="text-align: center">

            <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('taller/show2/{{$taller->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('taller/update/{{$taller->id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('taller/delete/{{$taller->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$tallers->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$tallers->total()}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
