<h1 class="page-header">Ficha Tesis
    
</h1>
  <a href="crear_reporte_portesistodos3/2" title="Descargar PDF" type="button" target="_blank" class="btn btn-success pull-right"><i class="fa fa-save"></i> Todos las Tesis</a>
        <a href="crear_reporte_portesistodos3/1" title="Veer PDF" type="button" target="_blank"  class="btn btn-primary pull-right"><i class="fa fa-eye"></i> Todas las Tesis</a>

    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('tesisreportes3_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('tesisreportes3/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Tesis por  Apellido Paterno o RUT del Alumno Tesista"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('tesisreportes3/list')}}?ok=1&search='+$('#search').val())"><i
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



 <th>
            <a href="javascript:ajaxLoad('tesisreportes3/list?field=ALU_PATERNO&sort={{Session::get("alumno_sort")=="asc"?"desc":"asc"}}')">
                Nombre Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('tesisreportes3_field')=='ALU_PATERNO'?(Session::get('tesisreportes3_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
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
       

     


        
        <th width="150px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>

    @foreach($tesis2sreportes as $key=>$tesis2)
                @foreach($tesis as $tes)

<?php if (($tesis2->id)==($tes->ALUMNO_id)) { ?>    

        <tr>
            <td align="center">{{$i++}}</td>

                        <td>{{$tesis2->id}}</td>

            <td align="left">    <?php echo $tesis2->ALU_PATERNO;?>           <?php echo $tesis2->ALU_MATERNO;?>        <?php echo $tesis2->ALU_NOMBRES;?>  
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

   { echo "No cumple requisito";  }

  ?>
      
  </td>



   




         
  

          <td style="text-align: center">

                 <a href="crear_reporte_portesissolo3/{{$tes->id}}/1" title="Veer PDF" target="_blank" class="btn btn-primary btn-circle" >     <i class="fa fa-eye"></i> 
</a>
<a href="crear_reporte_portesissolo3/{{$tes->id}}/2" title="Descargar PDF" target="_blank" class="btn btn-success btn-circle" >     <i class="fa fa-save"></i> 
</a>
            </td>
        </tr>
          <?php } ?>

            @endforeach

    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$tesis2sreportes->render()) !!}</div>
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
