<h1 class="page-header">evalua6es 
    <div class="pull-right">
        <a href="javascript:ajaxLoad('evalua6/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nuevo evalua6</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('evalua6_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('evalua6/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('evalua6/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('evalua6/list?field=id&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='id'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

        <th>
            <a href="javascript:ajaxLoad('evalua6/list?field=id&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
                Nombre
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='id'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>



 <th>
            <a href="javascript:ajaxLoad('evalua6/list?field=TRIBUNAL_id&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
                ApellTRIBUNAL_id
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='TRIBUNAL_id'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


 <th>
            <a href="javascript:ajaxLoad('evalua6/list?field=TRIBUNAL_id&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
                Profesores
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='TRIBUNAL_id'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('evalua6/list?field=TRIBUNAL_id&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
                Profesores
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='TRIBUNAL_id'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('evalua6/list?field=TRIBUNAL_id&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
                Profesores
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='TRIBUNAL_id'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($evalua6s as $key=>$evalua6)
        <tr>
            <td align="center">{{$i++}}</td>


            <td align="left"> {{$evalua6->id}}</td>

                                

          <td align="right">
    @foreach($TESIS as $alu)


<?php if (($alu->id)==($evalua6->id)) { ?>               

    <?php echo $alu->TES_NOMBRE; break;  ?>

  <?php } ?>


    @endforeach
</td>



       <td align="right">
    @foreach($TRIBUNAL as $con)


<?php if (($con->id)==($evalua6->TRIBUNAL_id)) { ?>               

    <?php echo $con->id; break; ?>

  <?php } ?>


    @endforeach
</td>



    @foreach($TRIBUNAL as $TRI)


<?php if (($TRI->id)==($evalua6->TRIBUNAL_id)) { ?>               


@foreach($conforman as $con)


<?php if (($TRI->id)==($con->TRIBUNAL_id)) { ?>               

        <td align="left">   

@foreach($profesor as $pro)


<?php if (($pro->id)==($con->id)) { ?>               


  <?php echo $pro->PRO_NOMBRES;  ?>
    <?php echo $pro->PRO_PATERNO; break; ?>


  <?php } ?>


    @endforeach
    <?php } ?>
</td>


    @endforeach
    <?php } ?>


    @endforeach
  


            <td style="text-align: center">

               <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('evalua6/show2/{{$evalua6->id}}/{{$evalua6->TRIBUNAL_id}}')"><i class="fa fa-list"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Edit"
                   href="javascript:ajaxLoad('evalua6/update/{{$evalua6->id}}/{{$evalua6->TRIBUNAL_id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Delete"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('evalua6/delete/{{$evalua6->id}}/{{$evalua6->TRIBUNAL_id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$evalua6s->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$evalua6s->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
