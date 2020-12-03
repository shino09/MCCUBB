<h1 class="page-header">Seleccione un Alumno
    
</h1>

<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('asistealumnoupdate_search') }}"
             onkeydown="if (event.keyCode == 13) ajaxLoad('asiste3/list2update/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}?ok=1&search='+this.value)"

               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('asiste3/list2update/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('asiste3/list2update/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}?field=id&sort={{Session::get("asistealumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('asistealumnoupdate_field')=='id'?(Session::get('asistealumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->



        <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>


 <th>
            <a href="javascript:ajaxLoad('asiste3/list2update/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}?field=ALU_PATERNO&sort={{Session::get("asistealumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('asistealumnoupdate_field')=='ALU_PATERNO'?(Session::get('asistealumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


      
       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($asistealumnolist as $key=>$asiste)
      


        <tr>
            <td align="center">{{$i++}}</td>


           

       <td align="left">
    
    <?php echo $asiste->id;  ?>

  
</td>


  <td align="left">
  

        <?php echo $asiste->ALU_PATERNO;  ?>

    <?php echo $asiste->ALU_MATERNO; ?>
        <?php echo $asiste->ALU_NOMBRES;  ?>






     
</td>


                                

   

            <td style="text-align: center">

          

 <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  este Alumno?')) ajaxLoad('asiste3/update3/{{$asiste->id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>
  
               <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('asiste3/showalumnoupdate/{{$asiste->id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}')"><i class="fa fa-eye"></i> 
                     </a>
            </td>
        </tr>
                
        @endforeach

    </tbody>
</table>
<div class="pull-left">{!! str_replace('/?','?',$asistealumnolist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total:         Total: {{$i-1}} 
 registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('asiste3/update3/{{$id}}/{{$CONGRESO_id}}/{{$idviejo}}/{{$CONGRESO_idviejo}}')" class="btn btn-danger"><i
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
