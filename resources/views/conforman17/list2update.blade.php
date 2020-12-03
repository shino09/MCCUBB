
<h1 class="page-header">Selecione un profesor 
   
</h1>


<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('conformanprofesorupdate_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('conforman17/list2update/{{$idnuevo}}/{{$TRIBUNAL_id}}/{{$id1viejo}}/{{$id2viejo}}/{{$id3viejo}}?ok=1&search='+this.value)"
               placeholder="Buscar..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick=" ajaxLoad('conforman17/list2update/{{$idnuevo}}/{{$TRIBUNAL_id}}/{{$id1viejo}}/{{$id2viejo}}/{{$id3viejo}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('conforman17/list2update/{{$idnuevo}}/{{$TRIBUNAL_id}}/{{$id1viejo}}/{{$id2viejo}}/{{$id3viejo}}?field=id&sort={{Session::get("conformanprofesorupdate_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorupdate_field')=='id'?(Session::get('conformanprofesorupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

       



 <th>
            <a href="javascript:ajaxLoad('conforman17/list2update/{{$idnuevo}}/{{$TRIBUNAL_id}}/{{$id1viejo}}/{{$id2viejo}}/{{$id3viejo}}?field=PRO_PATERNO&sort={{Session::get("conformanprofesorupdate_sort")=="asc"?"desc":"asc"}}')">
                Apellido Paterno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorupdate_field')=='PRO_PATERNO'?(Session::get('conformanprofesorupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


         <th>
            <a href="javascript:ajaxLoad('conforman17/list2update/{{$idnuevo}}/{{$TRIBUNAL_id}}/{{$id1viejo}}/{{$id2viejo}}/{{$id3viejo}}?field=PRO_MATERNO&sort={{Session::get("conformanprofesorupdate_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorupdate_field')=='PRO_MATERNO'?(Session::get('conformanprofesorupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('conforman17/list2update/{{$idnuevo}}/{{$TRIBUNAL_id}}/{{$id1viejo}}/{{$id2viejo}}/{{$id3viejo}}?field=PRO_NOMBRES&sort={{Session::get("conformanprofesorupdate_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorupdate_field')=='PRO_NOMBRES'?(Session::get('conformanprofesorupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


        <th width="240px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($PROFESOR as $key=>$profesor)

            <?php if (($profesor->id)!=($id1viejo) && ($profesor->id)!=($id2viejo) && ($profesor->id)!=($id3viejo))  { ?>               

        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="left"> {{$profesor->id}}</td>


                                    <td align="left"> {{$profesor->PRO_PATERNO}}</td>

                        <td align="left"> {{$profesor->PRO_MATERNO}}</td>

                                    <td>{{$profesor->PRO_NOMBRES}}</td>

                      <!--  <td align="left"> {{$profesor->PRO_EMAIL}}</td>

                        <td align="left"> {{$profesor->PRO_TITULO}}</td>
                        <td align="left"> {{$profesor->PRO_GRADO}}</td>
                       <td align="right"> {{$profesor->PRO_TELEFONO}}</td>






            <td align="left">
    @foreach($DEPARTAMENTO as $depa)


<?php if (($depa->DEP_ID)==($profesor->DEPARTAMENTO_DEP_ID)) { ?>               

    <?php echo $depa->DEP_NOMBRE; break;?>

  <?php } ?>


    @endforeach
</td>-->


   



    

            <td style="text-align: center">

        
                     <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere que este profesor dirga una TRIBUNAL?')) ajaxLoad('conforman17/update3/{{$profesor->id}}/{{$TRIBUNAL_id}}/{{$id1viejo}}/{{$id2viejo}}/{{$id3viejo}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>

              

                       <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('conforman17/showprofesorupdate/{{$profesor->id}}/{{$TRIBUNAL_id}}/{{$id1viejo}}/{{$id2viejo}}/{{$id3viejo}}')"><i class="fa fa-list"></i> 
                     </a>

            </td>
        </tr>
          <?php } ?>

    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$PROFESOR->render()) !!}</div>
<div>
  <a href="javascript:ajaxLoad('conforman17/update3/{{$idnuevo}}/{{$TRIBUNAL_id}}/{{$id1viejo}}/{{$id2viejo}}/{{$id3viejo}}')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>

</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$PROFESOR->total()}} Registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
