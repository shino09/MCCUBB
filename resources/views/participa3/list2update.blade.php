<h1 class="page-header">Selecione un Alumno
    
</h1>

<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('participaalumnoupdate_search') }}"
             onkeydown="if (event.keyCode == 13) ajaxLoad('participa3/list2update/{{$id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}?ok=1&search='+this.value)"

               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('participa3/list2update/{{$id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('participa3/list2update/{{$id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}?field=id&sort={{Session::get("participaalumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('participaalumnoupdate_field')=='id'?(Session::get('participaalumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

  <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>



 <th>
            <a href="javascript:ajaxLoad('participa3/list2update/{{$id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}?field=ALU_PATERNO&sort={{Session::get("participaalumnoupdate_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('participaalumnoupdate_field')=='ALU_PATERNO'?(Session::get('participaalumnoupdate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


      
       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($participaalumnolist as $key=>$participa)
      


        <tr>
            <td align="center">{{$i++}}</td>


           

       <td align="left">
    
    <?php echo $participa->id;  ?>

  
</td>


  <td align="left">
  

        <?php echo $participa->ALU_PATERNO;  ?>

    <?php echo $participa->ALU_MATERNO; ?>
        <?php echo $participa->ALU_NOMBRES;  ?>






     
</td>


                                

   

            <td style="text-align: center">

          

 <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Esta seguro que quiere selecCionar  este Alumno?')) ajaxLoad('participa3/update3/{{$participa->id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>
  
               <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('participa3/showalumnoupdate/{{$participa->id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}')"><i class="fa fa-eye"></i> 
                     </a>
            </td>
        </tr>
                
        @endforeach

    </tbody>
</table>
<div class="pull-left">{!! str_replace('/?','?',$participaalumnolist->render()) !!}</div>

<div class="row">
    <i class="col-sm-12">
        Total:         Total: {{$i-1}} 
 registros
    </i>
</div>
<br>
<div>
  <a href="javascript:ajaxLoad('participa3/update3/{{$id}}/{{$TALLER_id}}/{{$idviejo}}/{{$TALLER_idviejo}}')" class="btn btn-danger"><i
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
