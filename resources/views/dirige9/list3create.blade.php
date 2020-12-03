<h1 class="page-header">Seleccione un Profesor del Nucleo
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('dirige9nucleo_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('dirige9/list3create/{{$id}}?ok=1&search='+this.value)"
               placeholder="Buscar..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('dirige9/list3create/{{$id}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('dirige9/list2create?field=id&sort={{Session::get("dirige9nucleo_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige9nucleo_field')=='id'?(Session::get('dirige9nucleo_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

        <th><a style:background-color:blue>
            RUT Profesor<a>
        </th>



 <th>
            <a href="javascript:ajaxLoad('dirige9/list3create/{{$id}}?field=PRO_PATERNO&sort={{Session::get("dirige9nucleo_sort")=="asc"?"desc":"asc"}}')">
                Nombre Profesor
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige9nucleo_field')=='PRO_PATERNO'?(Session::get('dirige9nucleo_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>




         <!--<th>
            <a href="javascript:ajaxLoad('dirige9/list2create?field=PRO_MATERNO&sort={{Session::get("dirige9nucleo_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige9nucleo_field')=='PRO_MATERNO'?(Session::get('dirige9nucleo_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


    <!--<th>
            <a href="javascript:ajaxLoad('dirige9/list2create?field=PRO_NOMBRES&sort={{Session::get("dirige9nucleo_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige9nucleo_field')=='PRO_NOMBRES'?(Session::get('dirige9nucleo_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       <!--
    <th>
            <a href="javascript:ajaxLoad('dirige9/list2create?field=PRO_EMAIL&sort={{Session::get("dirige9nucleo_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige9nucleo_field')=='PRO_EMAIL'?(Session::get('dirige9nucleo_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('dirige9/list2create?field=PRO_TITULO&sort={{Session::get("dirige9nucleo_sort")=="asc"?"desc":"asc"}}')">
                DIR_TITULO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige9nucleo_field')=='PRO_TITULO'?(Session::get('dirige9nucleo_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
           <th>
            <a href="javascript:ajaxLoad('dirige9/list2create?field=DPROGRADO&sort={{Session::get("dirige9nucleo_sort")=="asc"?"desc":"asc"}}')">
                DIR_GRADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige9nucleo_field')=='PRO_GRADO'?(Session::get('dirige9nucleo_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

           <th>
            <a href="javascript:ajaxLoad('dirige9/list2create?field=PRO_TELEFONO&sort={{Session::get("dirige9nucleo_sort")=="asc"?"desc":"asc"}}')">
                DIR_telefono
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige9nucleo_field')=='PRO_TELEFONO'?(Session::get('dirige9nucleo_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


        -->
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
                @foreach($nucleos as $key=>$nucleo)
                @foreach($nucleos2 as $key=>$nucleo2)
                        <?php if (($nucleo2->id)==($nucleo->id) && (($nucleo2->id)!= $idnousar1) && (($nucleo2->id)!= $idnousar2) ) { ?>  


        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="left"> {{$nucleo->id}}</td>


                                

          <td align="left">


    @foreach($profesor as $profe)


<?php if (($profe->id)==($nucleo->id)) { ?>               

    <?php echo $profe->PRO_PATERNO; ?>    <?php echo $profe->PRO_MATERNO; ?>       <?php echo $profe->PRO_NOMBRES; ?>



  <?php } ?>


    @endforeach
</td>

   <!--       <td align="left">
    @foreach($profesor as $profe)


<?php if (($profe->id)==($nucleo->id)) { ?>               


  <?php } ?>


    @endforeach
</td>




            <td align="left">
    @foreach($profesor as $profe)


<?php if (($profe->id)==($nucleo->id)) { ?>               


  <?php } ?>


    @endforeach
</td>-->



            <td style="text-align: center">


 <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere selecionar  este profesor para dirigir la tesis seleccionada?')) ajaxLoad('dirige9/create/{{$id}}/{{$nucleo->id}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>
  
               <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('dirige9/showprofesorcreate/{{$id}}/{{$nucleo->id}}')"><i class="fa fa-eye"></i> 
                     </a>
           
            </td>
        </tr>
          <?php } ?>
    @endforeach

    @endforeach

    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$nucleos->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total: {{$i-1}} registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('dirige9/list2create')" class="btn btn-danger"><i
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
