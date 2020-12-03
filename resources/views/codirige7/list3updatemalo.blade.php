<h1 class="page-header">Selecionar Tesis
    
</h1>

<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('codirige7tesis_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('codirige7/list3update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}?ok=1&search='+this.value)"
               placeholder="Buscar"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('codirige7/list3update/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}?ok=1&search='+$('#search').val())"><i
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

        <!--
 
<th>
        
            <a href="javascript:ajaxLoad('codirige7/list3update/{{$PROFESOR_id}}?field=ALU_PATERNO&sort={{Session::get("codirige7tesis_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirige7tesis_field')=='ALU_PATERNO'?(Session::get('codirige7tesis_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
     

        <th><a style:background-color:blue>
            Alumno <a>
        </th>
         <th><a style:background-color:blue>
            Tesis<a>
        </th>
 <th>
            <a style:background-color:blue>
            Semestre<a>
        </th>
         <th>
          <a style:background-color:blue>
            Estado<a>
        </th>
       

     


        
        <th width="200px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>

    @foreach($codirige7s as $key=>$codirige7)
                    @foreach($tesis as $tes)


<?php if (($codirige7->id)==($tes->ALUMNO_id)) { ?>    

        <tr>
            <td align="center">{{$i++}}</td>

                        <td>{{$codirige7->id}}</td>

            <td align="left">    <?php echo $codirige7->ALU_PATERNO;?>           <?php echo $codirige7->ALU_MATERNO;?>        <?php echo $codirige7->ALU_NOMBRES;?>  
</td>
                        

   
             



      <td align="left">




    <?php echo $tes->TES_NOMBRE;?></td>

     <td align="left"> {{$tes->TES_ANO}}-{{$tes->TES_SEMESTRE}} </td>



           <td align="left">                       <?php if ((0)==($tes->TES_ESTADO))       
                                                     {echo "Inscrita";  }

if ((1)==($tes->TES_ESTADO))              
    {echo "Renunciada";  }
  
 if ((2)==($tes->TES_ESTADO))               

   { echo "Postergada"; }

 
  if ((3)==($tes->TES_ESTADO)) 
    {echo "Reprobada"; }

 
  if ((4)==($tes->TES_ESTADO))               

   { echo "Aprobada";  }
 
   if ((5)==($tes->TES_ESTADO))                

   { echo "No cumpple requisito";  }

  ?>
      
  </td>



   


            <td style="text-align: center">

            

                     <a class="btn btn-success btn-circle" title="Edit"
                   href="javascript:if(confirm('¿Esta seguro que quiere  selecionar esta tesis ?')) ajaxLoad('codirige7/update3/{{$tes->id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}')">
                    <i class="fa fa-check-square-o"></i>  </a>


                <a class="btn btn-warning btn-circle" title="Show4"
                   href="javascript:ajaxLoad('codirige7/showtesisupdate/{{$tes->id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}')">
                    <i class="fa fa-list"></i> </a>
              
            </td>
        </tr>
          <?php } ?>

            @endforeach
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$codirige7s->render()) !!}</div>
<div>
  <a href="javascript:ajaxLoad('codirige7/update2/{{$id}}/{{$PROFESOR_id}}/{{$idviejo}}/{{$PROFESOR_idviejo}}')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>

</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$i-1}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
