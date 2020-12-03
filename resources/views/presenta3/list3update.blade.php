<h1 class="page-header">Seleccione una Solicitud
  
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('presentaSOLICITUDupdate_search') }}"
onkeydown="if (event.keyCode == 13) ajaxLoad('presenta3/list3update/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}?ok=1&search='+this.value)"               placeholder="Buscar Solicitud por Nombre o Año de la Solicitud"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('presenta3/list2update/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}??ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('presenta3/list3update/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}?field=id&sort={{Session::get("presentaSOLICITUDupdate_sort")=="asc"?"desc":"asc"}}')">
                id
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('presentaSOLICITUDupdate_field')=='id'?(Session::get('presentaSOLICITUDupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
        <th>
            <a href="javascript:ajaxLoad('presenta3/list3update/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}?field=SOL_NOMBRE&sort={{Session::get("presentaSOLICITUDupdate_sort")=="asc"?"desc":"asc"}}')">
                Nombre Solicitud
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('presentaSOLICITUDupdate_field')=='SOL_NOMBRE'?(Session::get('presentaSOLICITUDupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

          <th><a style:background-color:blue>
            Semestre<a>
        </th>
       <!-- <th>
            <a href="javascript:ajaxLoad('presenta3/list3update/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}?field=SOL_SEMESTRE&sort={{Session::get("presentaSOLICITUDupdate_sort")=="asc"?"desc":"asc"}}')">
                SOL_SEMESTRE
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('presentaSOLICITUDupdate_field')=='SOL_SEMESTRE'?(Session::get('presentaSOLICITUDupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('presenta3/list3update/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}?field=SOL_ANO&sort={{Session::get("presentaSOLICITUDupdate_sort")=="asc"?"desc":"asc"}}')">
                SOL_ANO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('presentaSOLICITUDupdate_field')=='SOL_ANO'?(Session::get('presentaSOLICITUDupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
     
        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($presentaSOLICITUDlist as $key=>$SOLICITUD)
        <tr>
            <td align="center">{{$i++}}</td>
                     <!--   <td>{{$SOLICITUD->id}}</td>-->

            <td>{{$SOLICITUD->SOL_NOMBRE}}</td>
            <td align="left">{{$SOLICITUD->SOL_ANO}}-{{$SOLICITUD->SOL_SEMESTRE}}</td>
   



            <td style="text-align: center">

           <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  esta Solicitud?')) ajaxLoad('presenta3/update3/{{$id}}/{{$SOLICITUD->id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}')"><i class="fa fa-check-square-o"></i> 
                     </a>

             


                  <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('presenta3/showsolicitudupdate/{{$id}}/{{$SOLICITUD->id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}')"><i class="fa fa-eye"></i> 
                     </a>
              
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$presentaSOLICITUDlist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total: {{$presentaSOLICITUDlist->total()}} registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('presenta3/update3/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}')" class="btn btn-danger"><i
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
