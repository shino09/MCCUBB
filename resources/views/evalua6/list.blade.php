<h1 class="page-header">Tesis Disponibles para Evaluar 
    
</h1>

<div class="col-sm-7 form-group">

    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('evalua6_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('evalua6/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar Tesis por Apellido Paterno o RUT del Alumno Tesista"
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('evalua6/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('evalua6/list?field=id&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
                RUT
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='id'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


<th><a style:background-color:blue>
            Situación<a>
        </th>
 <th><a style:background-color:blue>
            RUT Alumno<a>
        </th>



 <th>
            <a href="javascript:ajaxLoad('evalua6/list?field=ALU_PATERNO&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
                Alumno
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='ALU_PATERNO'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

<th><a style:background-color:blue>
            Tesis<a>
        </th>

        <th><a style:background-color:blue>
            Profesor 1<a>
        </th>


        <th><a style:background-color:blue>
            Profesor 2<a>
        </th>

        <th><a style:background-color:blue>
            Profesor 3<a>
        </th>

        <!--
<th>
            <a href="javascript:ajaxLoad('evalua6/list?field=id&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
                Tesis
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='id'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

        <th>
            <a href="javascript:ajaxLoad('evalua6/list?field=id&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
                Profesor 1
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='id'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('evalua6/list?field=id&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
Profesor 2            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='id'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
         <th>
            <a href="javascript:ajaxLoad('evalua6/list?field=id&sort={{Session::get("evalua6_sort")=="asc"?"desc":"asc"}}')">
Profesor 3            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('evalua6_field')=='id'?(Session::get('evalua6_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


       
        <th width="140px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
          

    @foreach($evaluaalumno as $key=>$aal)
  @foreach($evaluatodos as $key=>$asi)
                        @foreach($evaluatesis as $key=>$evt)
                                <?php if (($evt->id)==($asi->id)) { ?>  

                                <?php if (($evt->ALUMNO_id)==($aal->id)) { ?>  


        <tr>
            <td align="center">{{$i++}}</td>

                       <td align="left">        <?php if (($evt->EVA_NOTAFINAL)!=0  ): ?>  

                                                  <?php   echo "Con Nota"; ?>


                                <?php else: ?>  
                                <?php  echo "<font color='red'>Sin nota Aún</font>";?>


             <?endif;  ?>

</td>
                   <td align="left"> {{$aal->id}}</td>



  <td align="left">
  

        <?php echo $aal->ALU_PATERNO;  ?>

    <?php echo $aal->ALU_MATERNO; ?>
        <?php echo $aal->ALU_NOMBRES;  ?>






</td>


                                

          <td align="left">
   
    <?php echo $evt->TES_NOMBRE;   ?>

 
</td>



    @foreach($TRIBUNAL as $TRI)


<?php if (($TRI->id)==($asi->TRIBUNAL_id)) { ?>               


@foreach($conforman as $con)


<?php if (($TRI->id)==($con->TRIBUNAL_id)) { ?>               


@foreach($profesor as $pro)


<?php if (($pro->id)==($con->id)&& $con->CON_tipoprofesor==1) { ?>               
        <td align="left">   


    <?php echo $pro->PRO_PATERNO;  ?>
        <?php echo $pro->PRO_MATERNO;  ?>
          <?php echo $pro->PRO_NOMBRES;  break;?>


</td>


  <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach

      @foreach($TRIBUNAL as $TRI)


<?php if (($TRI->id)==($asi->TRIBUNAL_id)) { ?>               


@foreach($conforman as $con)


<?php if (($TRI->id)==($con->TRIBUNAL_id)) { ?>               


@foreach($profesor as $pro)


<?php if (($pro->id)==($con->id)&& $con->CON_tipoprofesor==2) { ?>               
        <td align="left">   


    <?php echo $pro->PRO_PATERNO;  ?>
        <?php echo $pro->PRO_MATERNO;  ?>
          <?php echo $pro->PRO_NOMBRES;  break;?>


</td>


  <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach


   @foreach($TRIBUNAL as $TRI)


<?php if (($TRI->id)==($asi->TRIBUNAL_id)) { ?>               


@foreach($conforman as $con)


<?php if (($TRI->id)==($con->TRIBUNAL_id)) { ?>               


@foreach($profesor as $pro)


<?php if (($pro->id)==($con->id)&& $con->CON_tipoprofesor==3) { ?>               
        <td align="left">   


    <?php echo $pro->PRO_PATERNO;  ?>
        <?php echo $pro->PRO_MATERNO;  ?>
          <?php echo $pro->PRO_NOMBRES;  break;?>


</td>


  <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach
    <?php } ?>


    @endforeach


   

            <td style="text-align: center">

            <!--   <a role="button"  class="btn btn-warning  btn-circle" 
                   href="javascript:ajaxLoad('evalua6/show/{{$aal->id}}/{{$asi->CONGRESO_id}}')"><i class="fa fa-list"></i> 
                     </a>-->

                     <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('evalua6/show3/{{$asi->id}}/{{$asi->TRIBUNAL_id}}')"><i class="fa fa-eye"></i> 
                     </a>
               

                 <a class="btn btn-primary btn-circle" title="Colocar Nota"
                   href="javascript:ajaxLoad('evalua6/update/{{$asi->id}}/{{$asi->TRIBUNAL_id}}')">
                    <i class="fa fa-list"></i> </a>
                  <!--  <a class="btn btn-primary btn-circle" title="Edit"
                   href="javascript:ajaxLoad('evalua6/update3/{{$asi->id}}/{{$asi->TRIBUNAL_id}}/{{$asi->id}}/{{$asi->TRIBUNAL_id}}')">
                    <i class="fa fa-list"></i> </a>-->
                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('Si elimina esta evaluación, la tesis quedara sin evaluar ni triunal de evaluación ¿Esta completamente seguro que quiere eliminarla?')) ajaxLoad('evalua6/delete/{{$asi->id}}/{{$asi->TRIBUNAL_id}}')">
                    <i class="fa fa-times"></i> 
                </a>
            </td>
        </tr>
          <?php } ?>

                 <?php } ?>
                     @endforeach


    @endforeach
        @endforeach

    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$evaluaalumno->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total:         Total: {{$i-1}} 
 registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
