<h1 class="page-header">Seleccione el Profesor 3 (mostrando solo Profesores Visitantes)
   
</h1>


<div class="col-sm-7 form-group">
    <div class="input-group">
         <input class="form-control" id="search" value="{{ Session::get('conformanprofesorcreate4_search') }}"
onkeydown="if (event.keyCode == 13) ajaxLoad('conforman17/list5create/{{$id}}/{{$idguia}}/{{$idinformante}}?ok=1&search='+this.value)"                              placeholder="Buscar Profesor por Apellido Paterno o RUT"

               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('conforman17/list5create/{{$id}}/{{$idguia}}/{{$idinformante}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('conforman17/list5create/{{$id}}/{{$idinformante}}?field=id&sort={{Session::get("conformanprofesorcreate3_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorcreate4_sort')=='id'?(Session::get('conformanprofesorcreate3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       
 <th><a style:background-color:blue>
            RUT Profesor<a>
        </th>


 <th>
            <a href="javascript:ajaxLoad('conforman17/list5create/{{$id}}/{{$idguia}}/{{$idinformante}}?field=PRO_PATERNO&sort={{Session::get("conformanprofesorcreate4_sort")=="asc"?"desc":"asc"}}')">
Profesor            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorcreate4_sort')=='PRO_PATERNO'?(Session::get('conformanprofesorcreate4_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

        <th><a style:background-color:blue>
            Universidad <a>
        </th>

        <th><a style:background-color:blue>
            Pais<a>
        </th>

<!--
         <th>
            <a href="javascript:ajaxLoad('conforman17/list4create/{{$id}}/{{$idinformante}}?field=PRO_MATERNO&sort={{Session::get("conformanprofesorcreate3_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorcreate3_sort')=='PRO_MATERNO'?(Session::get('conformanprofesorcreate3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('conforman17/list4create/{{$id}}/{{$idinformante}}?field=PRO_NOMBRES&sort={{Session::get("conformanprofesorcreate3_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorcreate3_sort')=='PRO_NOMBRES'?(Session::get('conformanprofesorcreate3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       <!--
    <th>
            <a href="javascript:ajaxLoad('conforman17/list4create/{{$id}}/{{$idinformante}}?field=PRO_EMAIL&sort={{Session::get("conformanprofesorcreate3_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorcreate3_sort')=='PRO_EMAIL'?(Session::get('conformanprofesorcreate3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('conforman17/list4create/{{$id}}/{{$idinformante}}?field=PRO_TITULO&sort={{Session::get("conformanprofesorcreate3_sort")=="asc"?"desc":"asc"}}')">
                TITULO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorcreate3_sort')=='PRO_TITULO'?(Session::get('conformanprofesorcreate3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('conforman17/list4create/{{$id}}/{{$idinformante}}?field=PRO_GRADO&sort={{Session::get("conformanprofesorcreate3_sort")=="asc"?"desc":"asc"}}')">
                GRADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorcreate3_sort')=='PRO_GRADO'?(Session::get('conformanprofesorcreate3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('conforman17/list4create/{{$id}}/{{$idinformante}}?field=PRO_TELEFONO&sort={{Session::get("conformanprofesorcreate3_sort")=="asc"?"desc":"asc"}}')">
                TELEFONO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorcreate3_sort')=='PRO_TELEFONO'?(Session::get('conformanprofesorcreate3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('conforman17/list4create/{{$id}}/{{$idinformante}}?field=DEPARTAMENTO_id&sort={{Session::get("conformanprofesorcreate3_sort")=="asc"?"desc":"asc"}}')">
                Departamento
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('conformanprofesorcreate3_sort')=='DEPARTAMENTO_id'?(Session::get('conformanprofesorcreate3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
          -->
        <th width="240px">Agregar/Ver</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>

    @foreach($PROFESOR as $key=>$profesor)
            @foreach($visitante as $key=>$vis)


    <?php if (($profesor->id)!=($idinformante)  && ($profesor->id)!=($idguia) && ($profesor->id)==($vis->id) ) { ?>               


        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="left"> {{$profesor->id}}</td>


                                    <td align="left"> {{$profesor->PRO_PATERNO}}  {{$profesor->PRO_MATERNO}}  {{$profesor->PRO_NOMBRES}}</td>

                                      <td align="left"> {{$vis->VIS_UNIVERSIDAD}}  </td>
                                        <td align="left"> {{$vis->VIS_PAIS}} </td>

                     

                      <!--  <td align="left"> {{$profesor->PRO_EMAIL}}</td>

                        <td align="left"> {{$profesor->PRO_TITULO}}</td>
                        <td align="left"> {{$profesor->PRO_GRADO}}</td>
                       <td align="right"> {{$profesor->PRO_TELEFONO}}</td>






            <td align="left">
    @foreach($DEPARTAMENTO as $depa)


<?php if (($depa->id)==($profesor->DEPARTAMENTO_id)) { ?>               

    <?php echo $depa->DEP_NOMBRE; break;?>

  <?php } ?>


    @endforeach
</td>-->


   



    

            <td style="text-align: center">

             <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere selecionar  este profesor?')) ajaxLoad('conforman17/create/{{$id}}/{{$idguia}}/{{$idinformante}}/{{$profesor->id}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>
                  

                       <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('conforman17/showprofesorsalacreate/{{$id}}/{{$idguia}}/{{$idinformante}}/{{$profesor->id}}')"><i class="fa fa-eye"></i> 
                     </a>
               
            </td>
        </tr>

          <?php } ?>
    @endforeach

    @endforeach
    </tbody>
</table>



<div class="pull-right">{!! str_replace('/?','?',$PROFESOR->render()) !!}</div>


<div class="row">
    <i class="col-sm-12">
        Total: {{$i-1}} Registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('conforman17/list4create/{{$id}}/{{$idguia}}')" class="btn btn-danger"><i
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
