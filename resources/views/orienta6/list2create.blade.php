<h1 class="page-header">Seleccione un Alumno
 
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('orientaalumnocreate_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('orienta6/list2create?ok=1&search='+this.value)"
               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('orienta6/list2create?ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>



<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>

     


  <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>


        <th>
            <a href="javascript:ajaxLoad('orienta6/list2create?field=ALU_PATERNO&sort={{Session::get("orientaalumnocreate_sort")=="asc"?"desc":"asc"}}')">
                Nombre Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orientaalumnocreate_field')=='ALU_PATERNO'?(Session::get('orientaalumnocreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


       


        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($ALUMNOs as $key=>$ALUMNO)
        <tr>
            <td align="center">{{$i++}}</td>
                           <td align="left"> {{$ALUMNO->id}}</td>

            <td align="left"> {{$ALUMNO->ALU_PATERNO}}  {{$ALUMNO->ALU_MATERNO}}  {{$ALUMNO->ALU_NOMBRES}}</td>

   

   

            <td style="text-align: center">

            <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere selecionar  este Alumno?')) ajaxLoad('orienta6/list3create/{{$ALUMNO->id}}')"><i class="fa fa-check-square-o"></i> 
                     </a>

             


                <a class="btn btn-warning btn-circle" title="Show4"
                   href="javascript:ajaxLoad('orienta6/showalumnocreate/{{$ALUMNO->id}}')">
                    <i class="fa fa-eye"></i> </a>
              
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$ALUMNOs->render()) !!}</div>


<div class="row">
    <i class="col-sm-12">
        Total: {{$ALUMNOs->total()}} registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('orienta6/list')" class="btn btn-danger"><i
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
