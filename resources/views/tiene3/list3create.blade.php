<h1 class="page-header">Seleccione un Trabajo
  
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('tieneTRABAJOcreate_search') }}"
onkeydown="if (event.keyCode == 13) ajaxLoad('tiene3/list3create/{{$id}}?ok=1&search='+this.value)"               placeholder="Buscar Trabajo por Nombre del Trabajo o Empresa"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('tiene3/list3create/{{$id}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('tiene3/list3create/{{$id}}?field=id&sort={{Session::get("tieneTRABAJOcreate_sort")=="asc"?"desc":"asc"}}')">
                id
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tieneTRABAJOcreate_field')=='id'?(Session::get('tieneTRABAJOcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
        <th>
            <a href="javascript:ajaxLoad('tiene3/list3create/{{$id}}?field=TRA_NOMBRE&sort={{Session::get("tieneTRABAJOcreate_sort")=="asc"?"desc":"asc"}}')">
                Nombre Trabajo
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tieneTRABAJOcreate_field')=='TRA_NOMBRE'?(Session::get('tieneTRABAJOcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

          <th><a style:background-color:blue>
            Ciudad<a>
        </th>

  <th><a style:background-color:blue>
            Empresa<a>
        </th>

      <!--  <th>
            <a href="javascript:ajaxLoad('tiene3/list3create/{{$id}}?field=TRA_CIUDAD&sort={{Session::get("tieneTRABAJOcreate_sort")=="asc"?"desc":"asc"}}')">
Ciudad            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('tieneTRABAJOcreate_field')=='TRA_CIUDAD'?(Session::get('tieneTRABAJOcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('tiene3/list3create/{{$id}}?field=TRA_EMPRESA&sort={{Session::get("tieneTRABAJOcreate_sort")=="asc"?"desc":"asc"}}')">
                Empresa
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tieneTRABAJOcreate_field')=='TRA_EMPRESA'?(Session::get('tieneTRABAJOcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
     
        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($tieneTRABAJOlist as $key=>$TRABAJO)
        <tr>
            <td align="center">{{$i++}}</td>
                       <!-- <td>{{$TRABAJO->id}}</td>-->

            <td>{{$TRABAJO->TRA_NOMBRE}}</td>
            <td align="left"> {{$TRABAJO->TRA_CIUDAD}}</td>
   
               <td align="left"> {{$TRABAJO->TRA_EMPRESA}}</td>



            <td style="text-align: center">

           <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  este Trabajo?')) ajaxLoad('tiene3/create/{{$id}}/{{$TRABAJO->id}}')"><i class="fa fa-check-square-o"></i> 
                     </a>

             


                <a class="btn btn-warning btn-circle" title="Show4"
                   href="javascript:ajaxLoad('tiene3/showtrabajocreate/{{$id}}/{{$TRABAJO->id}}')">
                    <i class="fa fa-eye"></i> </a>
              
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$tieneTRABAJOlist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total: {{$tieneTRABAJOlist->total()}} registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('tiene3/list2create')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>

</div>
<br>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
