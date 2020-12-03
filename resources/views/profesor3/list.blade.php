<h1 class="page-header">Selecione un Profesor (solo mostrando profesores sin tipo asignado)
   
</h1>


<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('profesor3_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('profesor3/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Profesor por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('profesor3/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('profesor3/list?field=id&sort={{Session::get("profesor3_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor3_field')=='id'?(Session::get('profesor3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

       



 <th width="440px">
            <a href="javascript:ajaxLoad('profesor3/list?field=PRO_PATERNO&sort={{Session::get("profesor3_sort")=="asc"?"desc":"asc"}}')">
                Profesor
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor3_field')=='PRO_PATERNO'?(Session::get('profesor3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>




         <th><a style:background-color:blue>
            Mostrar datos<a>
        </th>
     <th><a style:background-color:blue>
            Conventir en  Director<a>
        </th>
        <th><a style:background-color:blue>
            Conventir en  Nucleo<a>
        </th>
        <th><a style:background-color:blue>
            Conventir en  Colaborador<a>
        </th><th><a style:background-color:blue>
            Conventir en  Visitante<a>
        </th>

<!--

         <th>
            <a href="javascript:ajaxLoad('profesor3/list?field=PRO_MATERNO&sort={{Session::get("profesor3_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor3_field')=='PRO_MATERNO'?(Session::get('profesor3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('profesor3/list?field=PRO_NOMBRES&sort={{Session::get("profesor3_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor3_field')=='PRO_NOMBRES'?(Session::get('profesor3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       <!--
    <th>
            <a href="javascript:ajaxLoad('profesor3/list?field=PRO_EMAIL&sort={{Session::get("profesor3_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor3_field')=='PRO_EMAIL'?(Session::get('profesor3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('profesor3/list?field=PRO_TITULO&sort={{Session::get("profesor3_sort")=="asc"?"desc":"asc"}}')">
                TITULO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor3_field')=='PRO_TITULO'?(Session::get('profesor3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('profesor3/list?field=PRO_GRADO&sort={{Session::get("profesor3_sort")=="asc"?"desc":"asc"}}')">
                GRADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor3_field')=='PRO_GRADO'?(Session::get('profesor3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('profesor3/list?field=PRO_TELEFONO&sort={{Session::get("profesor3_sort")=="asc"?"desc":"asc"}}')">
                TELEFONO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor3_field')=='PRO_TELEFONO'?(Session::get('profesor3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('profesor3/list?field=DEPARTAMENTO_DEP_ID&sort={{Session::get("profesor3_sort")=="asc"?"desc":"asc"}}')">
                Departamento
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('profesor3_field')=='DEPARTAMENTO_DEP_ID'?(Session::get('profesor3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
          -->
        <!--<th width="240px"></th>-->
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($PROFESOR as $key=>$profesor)
        @foreach($profesor2 as $key=>$pro2)
                                        <?php if (($profesor->id)==($pro2->id)) { ?>  


        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="left"> {{$profesor->id}}</td>


                                    <td align="left"> {{$profesor->PRO_PATERNO}}  {{$profesor->PRO_MATERNO}}  {{$profesor->PRO_NOMBRES}}</td>


                      <!--  <td align="left"> {{$profesor->PRO_EMAIL}}</td>

                        <td align="left"> {{$profesor->PRO_TITULO}}</td>
                        <td align="left"> {{$profesor->PRO_GRADO}}</td>
                       <td align="right"> {{$profesor->PRO_TELEFONO}}</td>-->






      

   



    

            <!--<td style="text-align: center">-->

             <td align="center"> 
    <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('profesor3/show2/{{$profesor->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                     </td>
                      <td align="center"> 

             <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere convertir este  Profesor en Director?')) ajaxLoad('director2/create/{{$profesor->id}}')">D 
                     </a>
                                          </td>



                      <td align="center"> 
                     <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere convertir este  Profesor en Nucleo?')) ajaxLoad('nucleo2/create/{{$profesor->id}}')">N 
                     </a>
                                          </td>
                      <td align="center"> 
                     <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere convertir este  Profesor en Colaborador?')) ajaxLoad('colaborador2/create/{{$profesor->id}}')">C 
                     </a>
                                          </td>


                      <td align="center"> 
                <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere convertir este  Profesor en Visitante?')) ajaxLoad('visitante2/create/{{$profesor->id}}')">V 
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
        Total: {{$PROFESOR->total()}} Registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
