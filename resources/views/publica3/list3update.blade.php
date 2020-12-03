<h1 class="page-header">Seleccicone una Revista 
  
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('publicaREVISTAupdate_search') }}"
onkeydown="if (event.keyCode == 13) ajaxLoad('publica3/list3update/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}?ok=1&search='+this.value)"               placeholder="Buscar Revista por Nombre o Año de la Revista"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('publica3/list2update/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}??ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('publica3/list3update/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}?field=id&sort={{Session::get("publicaREVISTAupdate_sort")=="asc"?"desc":"asc"}}')">
                id
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('publicaREVISTAupdate_field')=='id'?(Session::get('publicaREVISTAupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
        <th>
            <a href="javascript:ajaxLoad('publica3/list3update/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}?field=REV_NOMBRE&sort={{Session::get("publicaREVISTAupdate_sort")=="asc"?"desc":"asc"}}')">
                Nombre Revista
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('publicaREVISTAupdate_field')=='REV_NOMBRE'?(Session::get('publicaREVISTAupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
   <th><a style:background-color:blue>
            Descripción<a>
        </th>


  <th><a style:background-color:blue>
            Año<a>
        </th>
        <!--
        <th>
            <a href="javascript:ajaxLoad('publica3/list3update/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}?field=REV_DESCRIPCION&sort={{Session::get("publicaREVISTAupdate_sort")=="asc"?"desc":"asc"}}')">
                Descripción
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('publicaREVISTAupdate_field')=='REV_DESCRIPCION'?(Session::get('publicaREVISTAupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('publica3/list3update/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}?field=REV_ANO&sort={{Session::get("publicaREVISTAupdate_sort")=="asc"?"desc":"asc"}}')">
                Año
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('publicaREVISTAupdate_field')=='REV_ANO'?(Session::get('publicaREVISTAupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
     
        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($publicaREVISTAlist as $key=>$REVISTA)
        <tr>
            <td align="center">{{$i++}}</td>
                        <!--<td>{{$REVISTA->id}}</td>-->

            <td>{{$REVISTA->REV_NOMBRE}}</td>
            <td align="left"> {{$REVISTA->REV_DESCRIPCION}}</td>
   
               <td align="left"> {{$REVISTA->REV_ANO}}</td>



            <td style="text-align: center">

           <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  esta Revista?')) ajaxLoad('publica3/update3/{{$id}}/{{$REVISTA->id}}/{{$idviejo}}/{{$REVISTA_idviejo}}')"><i class="fa fa-check-square-o"></i> 
                     </a>

             


                  <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('publica3/showrevistaupdate/{{$id}}/{{$REVISTA->id}}/{{$idviejo}}/{{$REVISTA_idviejo}}')"><i class="fa fa-eye"></i> 
                     </a>
              
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$publicaREVISTAlist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total: {{$publicaREVISTAlist->total()}} registros
    </i>
</div>

<br>
<div>
  <a href="javascript:ajaxLoad('publica3/update3/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}')" class="btn btn-danger"><i
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
