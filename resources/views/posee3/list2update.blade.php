<h1 class="page-header">Seleccione un Alumno
    
</h1>

<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('poseealumnoupdate_search') }}"
             onkeydown="if (event.keyCode == 13) ajaxLoad('posee3/list2update/{{$id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}?ok=1&search='+this.value)"

               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('posee3/list2update/{{$id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('posee3/list2update/{{$id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}?field=id&sort={{Session::get("poseealumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('poseealumnoupdate_field')=='id'?(Session::get('poseealumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


<th><a style:background-color:blue>
            RUT Alumno<a>
        </th>

 <th>
            <a href="javascript:ajaxLoad('posee3/list2update/{{$id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}?field=ALU_PATERNO&sort={{Session::get("poseealumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('poseealumnoupdate_field')=='ALU_PATERNO'?(Session::get('poseealumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


      
       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($poseealumnolist as $key=>$posee)
      


        <tr>
            <td align="center">{{$i++}}</td>


           

       <td align="left">
    
    <?php echo $posee->id;  ?>

  
</td>


  <td align="left">
  

        <?php echo $posee->ALU_PATERNO;  ?>

    <?php echo $posee->ALU_MATERNO; ?>
        <?php echo $posee->ALU_NOMBRES;  ?>






     
</td>


                                

   

            <td style="text-align: center">

          

 <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  este Alumno?')) ajaxLoad('posee3/update3/{{$posee->id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>
  
               <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('posee3/showalumnoupdate/{{$posee->id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}')"><i class="fa fa-eye"></i> 
                     </a>
            </td>
        </tr>
                
        @endforeach

    </tbody>
</table>
<div class="pull-left">{!! str_replace('/?','?',$poseealumnolist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total:         Total: {{$i-1}} 
 registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('posee3/update3/{{$id}}/{{$BENEFICIO_id}}/{{$idviejo}}/{{$BENEFICIO_idviejo}}')" class="btn btn-danger"><i
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
