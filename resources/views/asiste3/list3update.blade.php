<h1 class="page-header">Seleccione un Congreso
  
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('asistecongresoupdate_search') }}"
onkeydown="if (event.keyCode == 13) ajaxLoad('asiste3/list3update/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}?ok=1&search='+this.value)"               placeholder="Buscar Congreso por Nombre o Cuidad del  Congreso "
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('asiste3/list2update/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}??ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
           <!--<th>
            <a href="javascript:ajaxLoad('asiste3/list3update/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}?field=id&sort={{Session::get("asistecongresoupdate_sort")=="asc"?"desc":"asc"}}')">
                id
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('asistecongresoupdate_field')=='id'?(Session::get('asistecongresoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->



        <th>
            <a href="javascript:ajaxLoad('asiste3/list3update/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}?field=CON_NOMBRE&sort={{Session::get("asistecongresoupdate_sort")=="asc"?"desc":"asc"}}')">
                Nombre Congreso
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('asistecongresoupdate_field')=='CON_NOMBRE'?(Session::get('asistecongresoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

<th><a style:background-color:blue>
            Ciudad<a>
        </th>
        <th><a style:background-color:blue>
            Año<a>
        </th>
        <!--
        <th>
            <a href="javascript:ajaxLoad('asiste3/list3update/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}?field=CON_CIUDAD&sort={{Session::get("asistecongresoupdate_sort")=="asc"?"desc":"asc"}}')">
                CON_CIUDAD
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('asistecongresoupdate_field')=='CON_CIUDAD'?(Session::get('asistecongresoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('asiste3/list3update/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}?field=CON_ANO&sort={{Session::get("asistecongresoupdate_sort")=="asc"?"desc":"asc"}}')">
                CON_ANO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('asistecongresoupdate_field')=='CON_ANO'?(Session::get('asistecongresoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
     
        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($asistecongresolist as $key=>$congreso)
        <tr>
            <td align="center">{{$i++}}</td>
                       <!-- <td>{{$congreso->id}}</td>-->

            <td>{{$congreso->CON_NOMBRE}}</td>
            <td align="left"> {{$congreso->CON_CIUDAD}}</td>
   
               <td align="left"> {{$congreso->CON_ANO}}</td>



            <td style="text-align: center">

           <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  este congreso?')) ajaxLoad('asiste3/update3/{{$id}}/{{$congreso->id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}')"><i class="fa fa-check-square-o"></i> 
                     </a>

             


                  <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('asiste3/showcongresoupdate/{{$id}}/{{$congreso->id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}')"><i class="fa fa-eye"></i> 
                     </a>
              
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$asistecongresolist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total: {{$asistecongresolist->total()}} registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('asiste3/update3/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}')" class="btn btn-danger"><i
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
