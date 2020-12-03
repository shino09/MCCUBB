<h1 class="page-header">Profesores que Orientan Alumnos 
    
</h1>

<div class="pull-right">
        <a href="javascript:ajaxLoad('orienta4/list2create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Orientar nuevo Alumno</a>
    </div>

<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('orienta_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('orienta4/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Profesor por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('orienta4/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('orienta4/list?field=id&sort={{Session::get("orienta_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta_field')=='id'?(Session::get('orienta_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       

  <th><a style:background-color:blue>
            RUT Profesor<a>
        </th>


 <th>
            <a href="javascript:ajaxLoad('orienta4/list?field=PRO_PATERNO&sort={{Session::get("orienta_sort")=="asc"?"desc":"asc"}}')">
                Nombre Profesor
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta_field')=='PRO_PATERNO'?(Session::get('orienta_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>



  <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>




  <th><a style:background-color:blue>
            Nombre Alumno<a>
        </th>

<!--

         <th>
            <a href="javascript:ajaxLoad('orienta4/list?field=PRO_MATERNO&sort={{Session::get("orienta_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta_field')=='PRO_MATERNO'?(Session::get('orienta_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('orienta4/list?field=PRO_NOMBRES&sort={{Session::get("orienta_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta_field')=='PRO_NOMBRES'?(Session::get('orienta_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       <!--
    <th>
            <a href="javascript:ajaxLoad('orienta4/list?field=PRO_EMAIL&sort={{Session::get("orienta_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta_field')=='PRO_EMAIL'?(Session::get('orienta_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('orienta4/list?field=PRO_TITULO&sort={{Session::get("orienta_sort")=="asc"?"desc":"asc"}}')">
                DIR_TITULO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta_field')=='PRO_TITULO'?(Session::get('orienta_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
           <th>
            <a href="javascript:ajaxLoad('orienta4/list?field=DPROGRADO&sort={{Session::get("orienta_sort")=="asc"?"desc":"asc"}}')">
                DIR_GRADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta_field')=='PRO_GRADO'?(Session::get('orienta_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

           <th>
            <a href="javascript:ajaxLoad('orienta4/list?field=PRO_TELEFONO&sort={{Session::get("orienta_sort")=="asc"?"desc":"asc"}}')">
                DIR_telefono
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orienta_field')=='PRO_TELEFONO'?(Session::get('orienta_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


        -->
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
                @foreach($orientas as $key=>$orienta)
                @foreach($orientas2 as $key=>$orienta4)
                        <?php if (($orienta4->id)==($orienta->id)) { ?>  


        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="left"> {{$orienta->id}}</td>


                                

          <td align="left">


    @foreach($profesor as $profe)


<?php if (($profe->id)==($orienta->id)) { ?>               

        <?php echo $profe->PRO_PATERNO; ?>
            <?php echo $profe->PRO_MATERNO; ?>
                <?php echo $profe->PRO_NOMBRES; break; ?>




  <?php } ?>


    @endforeach
</td>



 



          <td align="left">
    @foreach($ALUMNO as $ALU)



<?php if (($ALU->id)==($orienta4->ALUMNO_id)) { ?>               

    <?php echo $ALU->id;break; ?>

  <?php } ?>


        @endforeach



</td>




      <td align="left">
    @foreach($ALUMNO as $ALU)

<?php if (($ALU->id)==($orienta4->ALUMNO_id)) { ?>               


    <?php echo $ALU->ALU_PATERNO; ?>
    <?php echo $ALU->ALU_MATERNO; ?>

    <?php echo $ALU->ALU_NOMBRES;break; ?>

    <?php } ?>



    
        @endforeach



</td>


           <td style="text-align: center">


                     <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('orienta4/show2/{{$orienta4->id}}/{{$orienta4->ALUMNO_id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Edit"
                   href="javascript:ajaxLoad('orienta4/update3/{{$orienta4->id}}/{{$orienta4->ALUMNO_id}}/{{$orienta4->id}}/{{$orienta4->ALUMNO_id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Delete"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('orienta4/delete/{{$orienta4->id}}/{{$orienta4->ALUMNO_id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
         <?php } ?>
    @endforeach

    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$orientas->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$i-1}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
