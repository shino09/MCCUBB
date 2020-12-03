

<h1 class="page-header">Selecione una tesis
  
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('tesis_search') }}"
onkeydown="if (event.keyCode == 13) ajaxLoad('codirige4/list3update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}?ok=1&search='+this.value)"               placeholder="Buscar"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('codirige4/list2update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}??ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>

<?php echo $id; ?>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
           <th>
            <a href="javascript:ajaxLoad('codirige4/list3update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}?field=TES_NOMBRE&sort={{Session::get("tesis_sort")=="asc"?"desc":"asc"}}')">
                TES_NOMBRE
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tesis_field')=='TES_NOMBRE'?(Session::get('tesis_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

          
        <th>
            <a href="javascript:ajaxLoad('codirige4/list3update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}?field=TES_SEMESTRE&sort={{Session::get("tesis_sort")=="asc"?"desc":"asc"}}')">
                TES_SEMESTRE
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('tesis_field')=='TES_SEMESTRE'?(Session::get('tesis_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


   <th>
            <a href="javascript:ajaxLoad('codirige4/list3update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}?field=TES_DESCRIPCION&sort={{Session::get("tesis_sort")=="asc"?"desc":"asc"}}')">
                TES_DESCRIPCION
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('tesis_field')=='TES_DESCRIPCION'?(Session::get('tesis_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

    <th>
            <a href="javascript:ajaxLoad('codirige4/list3update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}?field=TES_ANO&sort={{Session::get("tesis_sort")=="asc"?"desc":"asc"}}')">
                TES_ANO
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tesis_field')=='TES_ANO'?(Session::get('tesis_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('codirige4/list3update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}?field=ALUMNO_id&sort={{Session::get("tesis_sort")=="asc"?"desc":"asc"}}')">
                ALUMNO_id
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('tesis_field')=='ALUMNO_id'?(Session::get('tesis_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

         <th>
            <a href="javascript:ajaxLoad('codirige4/list3update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}?field=ALUMNO_id&sort={{Session::get("tesis_sort")=="asc"?"desc":"asc"}}')">
                ALU_PATERNO
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('tesis_field')=='ALUMNO_id'?(Session::get('tesis_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>


         <th>
            <a href="javascript:ajaxLoad('codirige4/list3update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}?field=TES_FECHAINICIO&sort={{Session::get("tesis_sort")=="asc"?"desc":"asc"}}')">
                TES_FECHAINICIO
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('tesis_field')=='TES_FECHAINICIO'?(Session::get('tesis_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

<!--
         <th>
            <a href="javascript:ajaxLoad('codirige4/list3update?field=TES_FECHAFINAL&sort={{Session::get("tesis_sort")=="asc"?"desc":"asc"}}')">
                TES_FECHAFINAL
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('tesis_field')=='TES_FECHAFINAL'?(Session::get('tesis_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
-->

         <th>
            <a href="javascript:ajaxLoad('codirige4/list3update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}?field=TES_ESTADO&sort={{Session::get("tesis_sort")=="asc"?"desc":"asc"}}')">
                TES_ESTADO
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('tesis_field')=='TES_ESTADO'?(Session::get('tesis_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($tesiss as $key=>$tesis)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$tesis->TES_NOMBRE}}</td>
            <td align="left"> {{$tesis->TES_SEMESTRE}}</td>
                        <td align="left"> {{$tesis->TES_DESCRIPCION}}</td>

   
               <td align="left"> {{$tesis->TES_ANO}}</td>

            <td align="left"> {{$tesis->ALUMNO_id}}</td>




      <td align="right">
    @foreach($alumno as $alu)


<?php if (($alu->id)==($tesis->ALUMNO_id)) { ?>               

    <?php echo $alu->ALU_PATERNO;  ?>
        <?php echo $alu->ALU_MATERNO;  ?>

    <?php echo $alu->ALU_NOMBRES; break; ?>


  <?php } ?>


    @endforeach
</td>



               <td align="left"> {{$tesis->TES_FECHAINICIO}}</td>

              <!-- <td align="left"> {{$tesis->TES_FECHAFINAL}}</td>-->

               <td align="left">                       <?php if ((0)==($tesis->TES_ESTADO))       
                                                     {echo "Inscrita";  }

if ((1)==($tesis->TES_ESTADO))              
    {echo "Renunciada";  }
  
 if ((2)==($tesis->TES_ESTADO))               

   { echo "Postergada"; }

 
  if ((3)==($tesis->TES_ESTADO)) 
    {echo "Reprobada"; }

 
  if ((4)==($tesis->TES_ESTADO))               

   { echo "Aprobada";  }
 
   if ((5)==($tesis->TES_ESTADO))                

   { echo "No cumpple requisito";  }

  ?>
      
  </td></td>

            <td style="text-align: center">

            

                     <a class="btn btn-success btn-circle" title="Edit"
                   href="javascript:if(confirm('¿Esta seguro que quiere  selecionar esta tesis ?')) ajaxLoad('codirige4/update3/{{$tesis->id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}')">
                    <i class="fa fa-check-square-o"></i>  </a>


                <a class="btn btn-warning btn-circle" title="Show4"
                   href="javascript:ajaxLoad('codirige4/showtesisupdate/{{$tesis->id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}')">
                    <i class="fa fa-list"></i> </a>
              
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$tesiss->render()) !!}</div>
<div>
  <a href="javascript:ajaxLoad('codirige4/update3/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>

</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$tesiss->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
