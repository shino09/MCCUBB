<h1 class="page-header">Tesis Codirigidas por Profesores
    
</h1>
<div class="pull-right">
        <a href="javascript:ajaxLoad('codirige7/list2create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Codirigir nueva Tesis</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('codirige7_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('codirige7/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Tesis por Apellido Paterno o RUT del Alumno Tesista"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('codirige7/list')}}?ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
      <!--  <th>
            <a href="javascript:ajaxLoad('codirige7/list?field=id&sort={{Session::get("codirige7_sort")=="asc"?"desc":"asc"}}')">
                RUT Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirige7_field')=='id'?(Session::get('codirige7_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
       

   <th><a style:background-color:blue>
            RUT Alumno</a>
        </th>
          

   <th>
            <a href="javascript:ajaxLoad('codirige7/list?field=ALU_PATERNO&sort={{Session::get("codirige7_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('codirige7_field')=='ALU_PATERNO'?(Session::get('codirige7_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>



  
     
       
    <!--<th>
            <a href="javascript:ajaxLoad('codirige7/list?field=ALU_PATERNO&sort={{Session::get("codirige7_sort")=="asc"?"desc":"asc"}}')">
                Nombre Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('codirige7_field')=='ALU_PATERNO'?(Session::get('codirige7_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
<!--
  <th>
            <a href="javascript:ajaxLoad('codirige7/list?field=ALU_PATERNO&sort={{Session::get("codirige7_sort")=="asc"?"desc":"asc"}}')">
                Semestre 
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('codirige7_field')=='ALU_PATERNO'?(Session::get('codirige7_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('codirige7/list?field=ALU_NOMBRES&sort={{Session::get("codirige7_sort")=="asc"?"desc":"asc"}}')">
                Estado 
            </a>
            <i style="font-size: 12px"
               class="fa {{ Session::get('codirige7_field')=='ALU_NOMBRES'?(Session::get('codirige7_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->
      

         <th><a style:background-color:blue>
            Tesis<a>
        </th>
<th>
        <a style:background-color:blue>
            Profesor Codirige<a>
        </th>
 <th>
            <a style:background-color:blue>
            Semestre<a>
        </th>
     
     


        
        <th width="150px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>

    @foreach($codirige7s as $key=>$codirige7)
                @foreach($tesis as $tes)
                <?php if (($codirige7->id)==($tes->ALUMNO_id)) { ?>     



      @foreach($codirige as $key=>$cod)

<?php if (($cod->id)==($tes->id)) { ?>   
    @foreach($profesor as $key=>$pro)

<?php if (($pro->id)==($cod->PROFESOR_id)) { ?>     

        <tr>
            <td align="center">{{$i++}}</td>

                        <td>{{$codirige7->id}}</td>

            <td align="left">    <?php echo $codirige7->ALU_PATERNO;?>           <?php echo $codirige7->ALU_MATERNO;?>        <?php echo $codirige7->ALU_NOMBRES;?>  
</td>
                        

   
             



      <td align="left">




    <?php echo $tes->TES_NOMBRE;?></td>

         <td align="left">    <?php echo $pro->PRO_PATERNO;?>           <?php echo $pro->PRO_MATERNO;?>        <?php echo $pro->PRO_NOMBRES;?>  
</td>





     <td align="left"> {{$tes->TES_ANO}}-{{$tes->TES_SEMESTRE}} </td>



        <!--   <td align="left">                       <?php if ((0)==($tes->TES_ESTADO))       
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
      
  </td>-->



   




         
  

            <td style="text-align: center">

                <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('codirige7/show2/{{$cod->id}}/{{$cod->PROFESOR_id}}')"><i class="fa fa-eye"></i> 
                     </a>
                <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:ajaxLoad('codirige7/update3/{{$cod->id}}/{{$cod->PROFESOR_id}}/{{$cod->id}}/{{$cod->PROFESOR_id}}')">
                    <i class="fa fa-list"></i> </a>
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('codirige7/delete/{{$cod->id}}/{{$cod->PROFESOR_id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
          <?php } ?>

            @endforeach
              <?php } ?>

            @endforeach
          <?php } ?>

            @endforeach

    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$codirige7s->render()) !!}</div>
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
