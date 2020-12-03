<h1 class="page-header">Seleccione un Taller
  
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('participaTALLERupdate_search') }}"
onkeydown="if (event.keyCode == 13) ajaxLoad('participa3/list3update/{{$id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}?ok=1&search='+this.value)"               placeholder="Buscar Taller por Nombre o Año del Taller"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('participa3/list2update/{{$id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}??ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('participa3/list3update/{{$id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}?field=id&sort={{Session::get("participaTALLERupdate_sort")=="asc"?"desc":"asc"}}')">
                id
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('participaTALLERupdate_field')=='id'?(Session::get('participaTALLERupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
        <th>
            <a href="javascript:ajaxLoad('participa3/list3update/{{$id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}?field=TAL_NOMBRE&sort={{Session::get("participaTALLERupdate_sort")=="asc"?"desc":"asc"}}')">
                Nombre Taller
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('participaTALLERupdate_field')=='TAL_NOMBRE'?(Session::get('participaTALLERupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
      

  <th><a style:background-color:blue>
            Año<a>
        </th>


<!--

    <th>
            <a href="javascript:ajaxLoad('participa3/list3update/{{$id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}?field=TAL_ANO&sort={{Session::get("participaTALLERupdate_sort")=="asc"?"desc":"asc"}}')">
                Año
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('participaTALLERupdate_field')=='TAL_ANO'?(Session::get('participaTALLERupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
     
        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($participaTALLERlist as $key=>$TALLER)
        <tr>
            <td align="center">{{$i++}}</td>
                        <!--<td>{{$TALLER->id}}</td>-->

            <td>{{$TALLER->TAL_NOMBRE}}</td>
   
               <td align="left"> {{$TALLER->TAL_ANO}}</td>



            <td style="text-align: center">

           <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  este Taller?')) ajaxLoad('participa3/update3/{{$id}}/{{$TALLER->id}}/{{$idviejo}}/{{$TALLER_idviejo}}')"><i class="fa fa-check-square-o"></i> 
                     </a>

             


                  <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('participa3/showtallerupdate/{{$id}}/{{$TALLER->id}}/{{$idviejo}}/{{$TALLER_idviejo}}')"><i class="fa fa-eye"></i> 
                     </a>
              
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$participaTALLERlist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total: {{$participaTALLERlist->total()}} registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('participa3/update3/{{$id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}')" class="btn btn-danger"><i
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
