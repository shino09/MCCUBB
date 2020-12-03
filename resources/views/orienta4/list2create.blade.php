<h1 class="page-header">Seleccione un Profesor 
   
</h1>


<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('orientaprofesorcreate_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('orienta4/list2create')}}?ok=1&search='+this.value)"
               placeholder="Buscar Profesor por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('orienta4/list2create')}}?ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
     
      <!--  <th>
            <a href="javascript:ajaxLoad('orienta4/list2create?field=id&sort={{Session::get("orientaprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orientaprofesorcreate_field')=='id'?(Session::get('orientaprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       

       
  <th><a style:background-color:blue>
            RUT Profesor<a>
        </th>


 <th>
            <a href="javascript:ajaxLoad('orienta4/list2create?field=PRO_PATERNO&sort={{Session::get("orientaprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                Nombre Profesor
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orientaprofesorcreate_field')=='PRO_PATERNO'?(Session::get('orientaprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
<!--

         <th>
            <a href="javascript:ajaxLoad('orienta4/list2create?field=PRO_MATERNO&sort={{Session::get("orientaprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orientaprofesorcreate_field')=='PRO_MATERNO'?(Session::get('orientaprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('orienta4/list2create?field=PRO_NOMBRES&sort={{Session::get("orientaprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orientaprofesorcreate_field')=='PRO_NOMBRES'?(Session::get('orientaprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       <!--
    <th>
            <a href="javascript:ajaxLoad('orienta4/list2create?field=PRO_EMAIL&sort={{Session::get("orientaprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orientaprofesorcreate_field')=='PRO_EMAIL'?(Session::get('orientaprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('orienta4/list2create?field=PRO_TITULO&sort={{Session::get("orientaprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                TITULO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orientaprofesorcreate_field')=='PRO_TITULO'?(Session::get('orientaprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('orienta4/list2create?field=PRO_GRADO&sort={{Session::get("orientaprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                GRADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orientaprofesorcreate_field')=='PRO_GRADO'?(Session::get('orientaprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('orienta4/list2create?field=PRO_TELEFONO&sort={{Session::get("orientaprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                TELEFONO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orientaprofesorcreate_field')=='PRO_TELEFONO'?(Session::get('orientaprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('orienta4/list2create?field=DEPARTAMENTO_id&sort={{Session::get("orientaprofesorcreate_sort")=="asc"?"desc":"asc"}}')">
                Departamento
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orientaprofesorcreate_field')=='DEPARTAMENTO_id'?(Session::get('orientaprofesorcreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
          -->
        <th width="240px">Agregar/Ver</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($PROFESOR as $key=>$profesor)
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
                   href="javascript:if(confirm('¿Esta seguro que quiere selecionar  este profesor ?')) ajaxLoad('orienta4/list3create/{{$profesor->id}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>
                  

                       <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('orienta4/showprofesorcreate2/{{$profesor->id}}')"><i class="fa fa-eye"></i> 
                     </a>
               
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



<div class="pull-right">{!! str_replace('/?','?',$PROFESOR->render()) !!}</div>

<div>
  <a href="javascript:ajaxLoad('orienta4/list')" class="btn btn-danger"><i
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
