<h1 class="page-header">Seleccione un Alumno
    
</h1>

<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('publicaalumnoupdate_search') }}"
             onkeydown="if (event.keyCode == 13) ajaxLoad('publica3/list2update/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}?ok=1&search='+this.value)"

               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('publica3/list2update/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('publica3/list2update/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}?field=id&sort={{Session::get("publicaalumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('publicaalumnoupdate_field')=='id'?(Session::get('publicaalumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

 <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>


 <th>
            <a href="javascript:ajaxLoad('publica3/list2update/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}?field=ALU_PATERNO&sort={{Session::get("publicaalumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('publicaalumnoupdate_field')=='ALU_PATERNO'?(Session::get('publicaalumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


      
       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($publicaalumnolist as $key=>$publica)
      


        <tr>
            <td align="center">{{$i++}}</td>


           

       <td align="left">
    
    <?php echo $publica->id;  ?>

  
</td>


  <td align="left">
  

        <?php echo $publica->ALU_PATERNO;  ?>

    <?php echo $publica->ALU_MATERNO; ?>
        <?php echo $publica->ALU_NOMBRES;  ?>






     
</td>


                                

   

            <td style="text-align: center">

          

 <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  este Alumno ?')) ajaxLoad('publica3/update3/{{$publica->id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>
  
               <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('publica3/showalumnoupdate/{{$publica->id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}')"><i class="fa fa-eye"></i> 
                     </a>
            </td>
        </tr>
                
        @endforeach

    </tbody>
</table>
<div class="pull-left">{!! str_replace('/?','?',$publicaalumnolist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total:         Total: {{$i-1}} 
 registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('publica3/update3/{{$id}}/{{$REVISTA_id}}/{{$idviejo}}/{{$REVISTA_idviejo}}')" class="btn btn-danger"><i
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
