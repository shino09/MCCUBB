<h1 class="page-header">Seleccione un Alumno
    
</h1>

<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('presentaalumnoupdate_search') }}"
             onkeydown="if (event.keyCode == 13) ajaxLoad('presenta3/list2update/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}?ok=1&search='+this.value)"

               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('presenta3/list2update/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('presenta3/list2update/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}?field=id&sort={{Session::get("presentaalumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('presentaalumnoupdate_field')=='id'?(Session::get('presentaalumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


   <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>



 <th>
            <a href="javascript:ajaxLoad('presenta3/list2update/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}?field=ALU_PATERNO&sort={{Session::get("presentaalumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('presentaalumnoupdate_field')=='ALU_PATERNO'?(Session::get('presentaalumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


      
       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($presentaalumnolist as $key=>$presenta)
      


        <tr>
            <td align="center">{{$i++}}</td>


           

       <td align="left">
    
    <?php echo $presenta->id;  ?>

  
</td>


  <td align="left">
  

        <?php echo $presenta->ALU_PATERNO;  ?>

    <?php echo $presenta->ALU_MATERNO; ?>
        <?php echo $presenta->ALU_NOMBRES;  ?>






     
</td>


                                

   

            <td style="text-align: center">

          

 <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  este Alumno?')) ajaxLoad('presenta3/update3/{{$presenta->id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>
  
               <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('presenta3/showalumnoupdate/{{$presenta->id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}')"><i class="fa fa-eye"></i> 
                     </a>
            </td>
        </tr>
                
        @endforeach

    </tbody>
</table>
<div class="pull-left">{!! str_replace('/?','?',$presentaalumnolist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total:         Total: {{$i-1}} 
 registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('presenta3/update3/{{$id}}/{{$SOLICITUD_id}}/{{$idviejo}}/{{$SOLICITUD_idviejo}}')" class="btn btn-danger"><i
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
