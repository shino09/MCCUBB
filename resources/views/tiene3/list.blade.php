<h1 class="page-header">Alumnos que tienen Trabajos
    
</h1>
<div class="pull-right">
        <a href="javascript:ajaxLoad('tiene3/list2create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar un nuevo Trabajo para un  Alumno</a>
    </div>
<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('tiene_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('tiene3/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('tiene3/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('tiene3/list?field=id&sort={{Session::get("tiene_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tiene_field')=='id'?(Session::get('tiene_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


 <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>


 <th>
            <a href="javascript:ajaxLoad('tiene3/list?field=ALU_PATERNO&sort={{Session::get("tiene_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tiene_field')=='ALU_PATERNO'?(Session::get('tiene_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
<!--<th>
            <a href="javascript:ajaxLoad('tiene3/list?field=id&sort={{Session::get("tiene_sort")=="asc"?"desc":"asc"}}')">
                ID TRABAJO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tiene_field')=='id'?(Session::get('tiene_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

        <!--<th>
            <a href="javascript:ajaxLoad('tiene3/list?field=id&sort={{Session::get("tiene_sort")=="asc"?"desc":"asc"}}')">
                Nombre TRABAJO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tiene_field')=='id'?(Session::get('tiene_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

         <th><a style:background-color:blue>
            Nombre Trabajo<a>
        </th>

 <th><a style:background-color:blue>
            Empresa<a>
        </th>



       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($tienealumnolist as $key=>$aal)
        @foreach($tiene as $key=>$asi)

                                <?php if (($aal->id)==($asi->id)) { ?>  


        <tr>
            <td align="center">{{$i++}}</td>


           

       <td align="left">
    @foreach($alumno as $alu)


<?php if (($alu->id)==($asi->id)) { ?>               

    <?php echo $alu->id; break; ?>

  <?php } ?>


    @endforeach
</td>


  <td align="left">
    @foreach($alumno as $alu)



<?php if (($alu->id)==($asi->id) ){ ?> 



        <?php echo $alu->ALU_PATERNO;  ?>

    <?php echo $alu->ALU_MATERNO; ?>
        <?php echo $alu->ALU_NOMBRES; break; ?>






      <?php } ?>


    @endforeach
</td>

              <!--<td align="left"> {{$asi->TRABAJO_id}}</td>-->

                                

          <td align="left">
    @foreach($tieneTRABAJO as $asic)


<?php if (($asic->id)==($asi->TRABAJO_id)) { ?>               

    <?php echo $asic->TRA_NOMBRE; break;  ?>

  <?php } ?>


    @endforeach
</td>

       <td align="left">
    @foreach($tieneTRABAJO as $asic)


<?php if (($asic->id)==($asi->TRABAJO_id)) { ?>               

    <?php echo $asic->TRA_EMPRESA; break;  ?>

  <?php } ?>


    @endforeach
</td>



   

   

            <td style="text-align: center">

            <!--   <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('tiene3/show/{{$aal->id}}/{{$asi->TRABAJO_id}}')"><i class="fa fa-list"></i> 
                     </a>-->

                     <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('tiene3/show2/{{$asi->id}}/{{$asi->TRABAJO_id}}')"><i class="fa fa-eye"></i> 
                     </a>
               
                    <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('tiene3/update3/{{$asi->id}}/{{$asi->TRABAJO_id}}/{{$asi->id}}/{{$asi->TRABAJO_id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('tiene3/delete/{{$asi->id}}/{{$asi->TRABAJO_id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
                 <?php } ?>

    @endforeach
        @endforeach

    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$tienealumnolist->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total:         Total: {{$i-1}} 
 registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
