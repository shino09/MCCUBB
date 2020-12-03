<h1 class="page-header">Lista de Profesores Nucleo
    
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('nucleo2_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('nucleo2/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Profesor por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('nucleo2/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('nucleo2/list?field=id&sort={{Session::get("nucleo2_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('nucleo2_field')=='id'?(Session::get('nucleo2_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

       

<th><a style:background-color:blue>
            RUT Profesor<a>
        </th>

 <th>
            <a href="javascript:ajaxLoad('nucleo2/list?field=PRO_PATERNO&sort={{Session::get("nucleo2_sort")=="asc"?"desc":"asc"}}')">
                Profesor
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('nucleo2_field')=='PRO_PATERNO'?(Session::get('nucleo2_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

<!--
         <th>
            <a href="javascript:ajaxLoad('nucleo2/list?field=PRO_MATERNO&sort={{Session::get("nucleo2_sort")=="asc"?"desc":"asc"}}')">
                Apellido Materno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('nucleo2_field')=='PRO_MATERNO'?(Session::get('nucleo2_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


    <th>
            <a href="javascript:ajaxLoad('nucleo2/list?field=PRO_NOMBRES&sort={{Session::get("nucleo2_sort")=="asc"?"desc":"asc"}}')">
                Nombres
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('nucleo2_field')=='PRO_NOMBRES'?(Session::get('nucleo2_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

       <!--
    <th>
            <a href="javascript:ajaxLoad('nucleo2/list?field=PRO_EMAIL&sort={{Session::get("nucleo2_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('nucleo2_field')=='PRO_EMAIL'?(Session::get('nucleo2_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('nucleo2/list?field=PRO_TITULO&sort={{Session::get("nucleo2_sort")=="asc"?"desc":"asc"}}')">
                DIR_TITULO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('nucleo2_field')=='PRO_TITULO'?(Session::get('nucleo2_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
           <th>
            <a href="javascript:ajaxLoad('nucleo2/list?field=DPROGRADO&sort={{Session::get("nucleo2_sort")=="asc"?"desc":"asc"}}')">
                DIR_GRADO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('nucleo2_field')=='PRO_GRADO'?(Session::get('nucleo2_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

           <th>
            <a href="javascript:ajaxLoad('nucleo2/list?field=PRO_TELEFONO&sort={{Session::get("nucleo2_sort")=="asc"?"desc":"asc"}}')">
                DIR_telefono
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('nucleo2_field')=='PRO_TELEFONO'?(Session::get('nucleo2_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
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
                        <?php if (($nucleo2->id)==($nucleo->id)) { ?>  


        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="left"> {{$nucleo->id}}</td>


                                

          <td align="left">


    @foreach($profesor as $profe)


<?php if (($profe->id)==($nucleo->id)) { ?>               

    <?php echo $profe->PRO_PATERNO; ?>       <?php echo $profe->PRO_MATERNO; ?>      <?php echo $profe->PRO_NOMBRES; ?>



  <?php } ?>


    @endforeach
</td>



            <td style="text-align: center">

               <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('nucleo2/show2/{{$nucleo->id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <!--<a class="btn btn-primary btn-circle" title="Edit"
                   href="javascript:ajaxLoad('nucleo2/update/{{$nucleo->id}}')">
                    <i class="fa fa-list"></i> </a>-->
                <a class="btn btn-danger btn-circle" title="Delete"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('nucleo2/delete/{{$nucleo->id}}')">
                    <i class="fa fa-times"></i> 
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
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
