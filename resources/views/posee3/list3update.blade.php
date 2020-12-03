<h1 class="page-header">Seleccione un Beneficio
  
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('poseeBENEFICIOupdate_search') }}"
onkeydown="if (event.keyCode == 13) ajaxLoad('posee3/list3update/{{$id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}?ok=1&search='+this.value)"               placeholder="Buscar Beneficio por Nombre del Beneficio"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('posee3/list2update/{{$id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}??ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
        <!--   <th>
            <a href="javascript:ajaxLoad('posee3/list3update/{{$id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}?field=id&sort={{Session::get("poseeBENEFICIOupdate_sort")=="asc"?"desc":"asc"}}')">
                id
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('poseeBENEFICIOupdate_field')=='id'?(Session::get('poseeBENEFICIOupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
        <th>
            <a href="javascript:ajaxLoad('posee3/list3update/{{$id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}?field=BEN_NOMBRE&sort={{Session::get("poseeBENEFICIOupdate_sort")=="asc"?"desc":"asc"}}')">
                Nombre Beneficio
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('poseeBENEFICIOupdate_field')=='BEN_NOMBRE'?(Session::get('poseeBENEFICIOupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
          <th><a style:background-color:blue>
            Descripción<a>
        </th>

        <!--<th>
            <a href="javascript:ajaxLoad('posee3/list3update/{{$id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}?field=BEN_DESCRIPCION&sort={{Session::get("poseeBENEFICIOupdate_sort")=="asc"?"desc":"asc"}}')">
           Descripción
 </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('poseeBENEFICIOupdate_field')=='BEN_DESCRIPCION'?(Session::get('poseeBENEFICIOupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


   
     
        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($poseeBENEFICIOlist as $key=>$BENEFICIO)
        <tr>
            <td align="center">{{$i++}}</td>
                      <!--  <td>{{$BENEFICIO->id}}</td>-->

            <td>{{$BENEFICIO->BEN_NOMBRE}}</td>
            <td align="left"> {{$BENEFICIO->BEN_DESCRIPCION}}</td>
   



            <td style="text-align: center">

           <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  este Beneficio?')) ajaxLoad('posee3/update3/{{$id}}/{{$BENEFICIO->id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}')"><i class="fa fa-check-square-o"></i> 
                     </a>

             


                  <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('posee3/showbeneficioupdate/{{$id}}/{{$BENEFICIO->id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}')"><i class="fa fa-eye"></i> 
                     </a>
              
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$poseeBENEFICIOlist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total: {{$poseeBENEFICIOlist->total()}} registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('posee3/update3/{{$id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}')" class="btn btn-danger"><i
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
