<h1 class="page-header">Alumnos que publican Revistas 
    
</h1>
<div class="pull-right">
        <a href="javascript:ajaxLoad('publica3/list2create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nueva revista publicada</a>
    </div>
<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('publica_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('publica3/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('publica3/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('publica3/list?field=id&sort={{Session::get("publica_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('publica_field')=='id'?(Session::get('publica_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

 <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>
 <th>
            <a href="javascript:ajaxLoad('publica3/list?field=ALU_PATERNO&sort={{Session::get("publica_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('publica_field')=='ALU_PATERNO'?(Session::get('publica_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


<!--<th>
            <a href="javascript:ajaxLoad('publica3/list?field=id&sort={{Session::get("publica_sort")=="asc"?"desc":"asc"}}')">
                ID REVISTA
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('publica_field')=='id'?(Session::get('publica_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

        <th>
            <a href="javascript:ajaxLoad('publica3/list?field=id&sort={{Session::get("publica_sort")=="asc"?"desc":"asc"}}')">
                Nombre REVISTA
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('publica_field')=='id'?(Session::get('publica_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

         <th><a style:background-color:blue>
            Nombre Revista<a>
        </th>


       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($publicaalumnolist as $key=>$aal)
        @foreach($publica as $key=>$asi)

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

             <!-- <td align="left"> {{$asi->REVISTA_id}}</td>-->

                                

          <td align="left">
    @foreach($publicaREVISTA as $asic)


<?php if (($asic->id)==($asi->REVISTA_id)) { ?>               

    <?php echo $asic->REV_NOMBRE; break;  ?>

  <?php } ?>


    @endforeach
</td>




   

   

            <td style="text-align: center">

            <!--   <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('publica3/show/{{$aal->id}}/{{$asi->REVISTA_id}}')"><i class="fa fa-list"></i> 
                     </a>-->

                     <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('publica3/show2/{{$asi->id}}/{{$asi->REVISTA_id}}')"><i class="fa fa-eye"></i> 
                     </a>
               
                    <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('publica3/update3/{{$asi->id}}/{{$asi->REVISTA_id}}/{{$asi->id}}/{{$asi->REVISTA_id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('publica3/delete/{{$asi->id}}/{{$asi->REVISTA_id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
                 <?php } ?>

    @endforeach
        @endforeach

    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$publicaalumnolist->render()) !!}</div>
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
