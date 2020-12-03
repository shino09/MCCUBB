<h1 class="page-header">Seleccione un Profesor (mostrando solo profesores sin codirigir tesis y que no pertenecen  al nucleo)
   
</h1>


<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('codirigeprofesorcreate_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('codirige7/list3create/{{$id}}?ok=1&search='+this.value)"
               placeholder="Buscar Profesor por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('codirige7/list3create/{{$id}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('codirige7/list2create?field=id&sort={{Session::get("codirigeprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirigeprofesorcreate_field')=='id'?(Session::get('codirigeprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

        <th><a style:background-color:blue>
            RUT Profesor<a>
        </th>



 <th>
            <a href="javascript:ajaxLoad('codirige7/list3create/{{$id}}?field=PRO_PATERNO&sort={{Session::get("codirigeprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                Nombre Profesor
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirigeprofesorcreate_field')=='PRO_PATERNO'?(Session::get('codirigeprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


<!--

         <th>
            <a href="javascript:ajaxLoad('codirige7/list2create?field=PRO_MATERNO&sort={{Session::get("codirigeprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirigeprofesorcreate_field')=='PRO_MATERNO'?(Session::get('codirigeprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('codirige7/list2create?field=PRO_NOMBRES&sort={{Session::get("codirigeprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirigeprofesorcreate_field')=='PRO_NOMBRES'?(Session::get('codirigeprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       <!--
    <th>
            <a href="javascript:ajaxLoad('codirige7/list2create?field=PRO_EMAIL&sort={{Session::get("codirigeprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirigeprofesorcreate_field')=='PRO_EMAIL'?(Session::get('codirigeprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('codirige7/list2create?field=PRO_TITULO&sort={{Session::get("codirigeprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                TITULO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirigeprofesorcreate_field')=='PRO_TITULO'?(Session::get('codirigeprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('codirige7/list2create?field=PRO_GRADO&sort={{Session::get("codirigeprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                GRADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirigeprofesorcreate_field')=='PRO_GRADO'?(Session::get('codirigeprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('codirige7/list2create?field=PRO_TELEFONO&sort={{Session::get("codirigeprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                TELEFONO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirigeprofesorcreate_field')=='PRO_TELEFONO'?(Session::get('codirigeprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('codirige7/list2create?field=DEPARTAMENTO_id&sort={{Session::get("codirigeprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                Departamento
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirigeprofesorcreate_field')=='DEPARTAMENTO_id'?(Session::get('codirigeprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
          -->
        <th width="240px">Agregar/Ver</th>
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

                       <!-- <td align="left"> </td>

                                    <td></td>-->

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
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  este Profesor?')) ajaxLoad('codirige7/create/{{$id}}/{{$profesor->id}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>
                  

                       <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('codirige7/showprofesorcreate/{{$id}}/{{$profesor->id}}')"><i class="fa fa-eye"></i> 
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
<br>
<div>
  <a href="javascript:ajaxLoad('codirige7/list2create')" class="btn btn-danger"><i
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
