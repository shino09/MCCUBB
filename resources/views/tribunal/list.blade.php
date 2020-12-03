<h1 class="page-header">tribunales 
    <div class="pull-right">
        <a href="javascript:ajaxLoad('tribunal/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nuevo tribunal</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('tribunal_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('tribunal/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('tribunal/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('tribunal/list?field=id&sort={{Session::get("tribunal_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tribunal_field')=='id'?(Session::get('tribunal_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

       



 <th>
            <a href="javascript:ajaxLoad('tribunal/list?field=TRI_FECHACREACION&sort={{Session::get("tribunal_sort")=="asc"?"desc":"asc"}}')">
                Apellido FECHACREACION
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tribunal_field')=='TRI_FECHACREACION'?(Session::get('tribunal_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


         
          
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($tribunals as $key=>$tribunal)
        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="right"> {{$tribunal->id}}</td>


                                    <td align="right"> {{$tribunal->TRI_FECHACREACION}}</td>

   



    

            <td style="text-align: center">

               <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('tribunal/show/{{$tribunal->id}}')"><i class="fa fa-list"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Edit"
                   href="javascript:ajaxLoad('tribunal/update/{{$tribunal->id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Delete"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('tribunal/delete/{{$tribunal->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$tribunals->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$tribunals->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
