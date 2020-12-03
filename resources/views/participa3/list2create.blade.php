<h1 class="page-header">Seleccione un Alumno
    
</h1>

<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('participaalumnocreate_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('participa3/list2create')}}?ok=1&search='+this.value)"
               placeholder="Buscar Alumno por Apellido Paterno o RUT"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('participa3/list2create')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('participa3/list2create?field=id&sort={{Session::get("participaalumnocreate_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('participaalumnocreate_field')=='id'?(Session::get('participaalumnocreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

              <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>



 <th>
            <a href="javascript:ajaxLoad('participa3/list2create?field=ALU_PATERNO&sort={{Session::get("participaalumnocreate_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('participaalumnocreate_field')=='ALU_PATERNO'?(Session::get('participaalumnocreate_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
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
                   href="javascript:if(confirm('¿Esta seguro que quiere seleccionar  este Alumno?')) ajaxLoad('participa3/list3create/{{$participa->id}}')"> <i class="fa fa-check-square-o"></i> 
                     </a>
  
               <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('participa3/showalumnocreate/{{$participa->id}}')"><i class="fa fa-eye"></i> 
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
  <a href="javascript:ajaxLoad('participa3/list')" class="btn btn-danger"><i
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
