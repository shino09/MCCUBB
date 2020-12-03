<h1 class="page-header">orientaes 
    
</h1>
<div class="pull-right">
        <a href="javascript:ajaxLoad('orienta4/list2create/$ALUMNO_id/$id')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nuevo dirige</a>
    </div>
<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('dirige_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('orienta4/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar..."
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
     
        


<th>
            <a href="javascript:ajaxLoad('orienta4/list?field=id&sort={{Session::get("dirige_sort")=="asc"?"desc":"asc"}}')">
                Rut profesor
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige_field')=='id'?(Session::get('dirige_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

        <th>
            <a href="javascript:ajaxLoad('orienta4/list?field=id&sort={{Session::get("dirige_sort")=="asc"?"desc":"asc"}}')">
                Nombre PROFESOR
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige_field')=='id'?(Session::get('dirige_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

 <th>
            <a href="javascript:ajaxLoad('orienta4/list?field=ALUMNO_id&sort={{Session::get("dirige_sort")=="asc"?"desc":"asc"}}')">
                RUT ALUMNO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige_field')=='ALUMNO_id'?(Session::get('dirige_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


 <th>
            <a href="javascript:ajaxLoad('orienta4/list?field=PRO_PATERNO&sort={{Session::get("dirige_sort")=="asc"?"desc":"asc"}}')">
                ALUMNO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('dirige_field')=='PRO_PATERNO'?(Session::get('dirige_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($diriges as $key=>$dirige)
        <tr>
            <td align="center">{{$i++}}</td>


           

      

              <td align="left"> {{$dirige->id}}</td>

                                

          <td align="right">
    @foreach($PROFESOR  as $PRO)


<?php if (($PRO->id)==($dirige->id)) { ?>               

    <?php echo $PRO->PRO_NOMBRES;   ?>
        <?php echo $PRO->PRO_PATERNO;   ?>

    <?php echo $PRO->PRO_MATERNO; break;  ?>


  <?php } ?>


    @endforeach
</td>


 <td align="right">
    @foreach($ALUMNO as $con)


<?php if (($con->id)==($dirige->ALUMNO_id)) { ?>               

    <?php echo $con->id; break; ?>

  <?php } ?>


    @endforeach
</td>


  <td align="right">
    @foreach($ALUMNO as $con)



<?php if (($con->id)==($dirige->ALUMNO_id) ){ ?> 



    <?php echo $con->ALU_NOMBRES;  ?>
        <?php echo $con->ALU_PATERNO;  ?>

    <?php echo $con->ALU_MATERNO; break; ?>




        <?php break; ?>

      <?php } ?>


    @endforeach
</td>


   

            <td style="text-align: center">

            <!--   <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('orienta4/show/{{$dirige->id}}/{{$dirige->ALUMNO_id}}')"><i class="fa fa-list"></i> 
                     </a>-->

                     <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('orienta4/show2/{{$dirige->id}}/{{$dirige->ALUMNO_id}}')"><i class="fa fa-list"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Edit"
                   href="javascript:ajaxLoad('orienta4/update2/{{$dirige->id}}/{{$dirige->ALUMNO_id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Delete"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('orienta4/delete/{{$dirige->id}}/{{$dirige->ALUMNO_id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$diriges->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$diriges->total()}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
