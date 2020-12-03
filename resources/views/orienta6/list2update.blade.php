<h1 class="page-header">Seleccicone un Alumno
 
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('orientaalumnoupdate_search') }}"
               onkeydown="if (event.keyCode == 13)  ajaxLoad('orienta6/list2update/{{$id}}/{{$ALUMNO_id}}/{{$idviejo}}/{{$ALUMNO_idviejo}}?ok=1&search='+this.value)"
               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('orienta6/list2update/{{$id}}/{{$ALUMNO_id}}/{{$idviejo}}/{{$ALUMNO_idviejo}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('orienta6/list3update//{{$id}}/{{$ALUMNO_id}}/{{$idviejo}}/{{$ALUMNO_idviejo}}?field=alumno_id&sort={{Session::get("orientaalumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                alumno_id
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('orientaalumnoupdate_field')=='alumno_id'?(Session::get('orientaalumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


 <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>

        <th>
            <a href="javascript:ajaxLoad('orienta6/list2update/{{$id}}/{{$ALUMNO_id}}/{{$idviejo}}/{{$ALUMNO_idviejo}}?field=ALU_PATERNO&sort={{Session::get("orientaalumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                Nombre ALumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('orientaalumnoupdate_field')=='ALU_PATERNO'?(Session::get('orientaalumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

      <!--

         <th>
            <a href="javascript:ajaxLoad('orienta6/list3update//{{$id}}/{{$ALUMNO_id}}/{{$idviejo}}/{{$ALUMNO_idviejo}}?field=ALU_PATERNO&sort={{Session::get("orientaalumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                ALU_PATERNO
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('orientaalumnoupdate_field')=='ALU_PATERNO'?(Session::get('orientaalumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

          <th>
            <a href="javascript:ajaxLoad('orienta6/list3update//{{$id}}/{{$ALUMNO_id}}/{{$idviejo}}/{{$ALUMNO_idviejo}}?field=ALU_MATERNO&sort={{Session::get("orientaalumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                ALU_MATERNO
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('orientaalumnoupdate_field')=='ALU_MATERNO'?(Session::get('orientaalumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


       -->


        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($alumnos as $key=>$alumno)
        <tr>
            <td align="center">{{$i++}}</td>
                           <td align="left"> {{$alumno->id}}</td>

            <td align="left"> {{$alumno->ALU_PATERNO}}  {{$alumno->ALU_MATERNO}}  {{$alumno->ALU_NOMBRES}}</td>

   

   

            <td style="text-align: center">

            <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere selecionar  este Alumno?')) ajaxLoad('orienta6/update3/{{$id}}/{{$alumno->id}}/{{$idviejo}}/{{$ALUMNO_idviejo}}')"><i class="fa fa-check-square-o"></i> 
                     </a>

             


                <a class="btn btn-warning btn-circle" title="Show4"
                   href="javascript:ajaxLoad('orienta6/showalumnoupdate/{{$id}}/{{$alumno->id}}/{{$idviejo}}/{{$ALUMNO_idviejo}}')">
                    <i class="fa fa-eye"></i> </a>
              
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$alumnos->render()) !!}</div>


<div class="row">
    <i class="col-sm-12">
        Total: {{$alumnos->total()}} registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('orienta6/update3/{{$id}}/{{$ALUMNO_id}}/{{$idviejo}}/{{$ALUMNO_idviejo}}')" class="btn btn-danger"><i
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
