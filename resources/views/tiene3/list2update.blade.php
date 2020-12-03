<h1 class="page-header">Seleccione un Alumno
    
</h1>

<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('tienealumnoupdate_search') }}"
             onkeydown="if (event.keyCode == 13) ajaxLoad('tiene3/list2update/{{$id}}/{{$TRABAJO_id}}/{{$idviejo}}/{{$TRABAJO_idviejo}}?ok=1&search='+this.value)"

               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('tiene3/list2update/{{$id}}/{{$TRABAJO_id}}/{{$idviejo}}/{{$TRABAJO_idviejo}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('tiene3/list2update/{{$id}}/{{$TRABAJO_id}}/{{$idviejo}}/{{$TRABAJO_idviejo}}?field=id&sort={{Session::get("tienealumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tienealumnoupdate_field')=='id'?(Session::get('tienealumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

 <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>


 <th>
            <a href="javascript:ajaxLoad('tiene3/list2update/{{$id}}/{{$TRABAJO_id}}/{{$idviejo}}/{{$TRABAJO_idviejo}}?field=ALU_PATERNO&sort={{Session::get("tienealumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tienealumnoupdate_field')=='ALU_PATERNO'?(Session::get('tienealumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


      
       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($tienealumnolist as $key=>$tiene)
      


        <tr>
            <td align="center">{{$i++}}</td>


           

       <td align="left">
    
    <?php echo $tiene->id;  ?>

  
</td>


  <td align="left">
  

        <?php echo $tiene->ALU_PATERNO;  ?>

    <?php echo $tiene->ALU_MATERNO; ?>
        <?php echo $tiene->ALU_NOMBRES;  ?>






     
</td>


                                

   

            <td style="text-align: center">

          

 <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  este Alumno?')) ajaxLoad('tiene3/update3/{{$tiene->id}}/{{$TRABAJO_id}}/{{$idviejo}}/{{$TRABAJO_idviejo}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>
  
               <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('tiene3/showalumnoupdate/{{$tiene->id}}/{{$TRABAJO_id}}/{{$idviejo}}/{{$TRABAJO_idviejo}}')"><i class="fa fa-eye"></i> 
                     </a>
            </td>
        </tr>
                
        @endforeach

    </tbody>
</table>
<div class="pull-left">{!! str_replace('/?','?',$tienealumnolist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total:         Total: {{$i-1}} 
 registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('tiene3/update3/{{$id}}/{{$TRABAJO_id}}/{{$idviejo}}/{{$TRABAJO_idviejo}}')" class="btn btn-danger"><i
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
