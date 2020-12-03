
                <p class="help-block">Modificando</p>

   



<div class="box-body col-xs-12">
<div class="col-xs-6">
 <b>RUT Alumno:</b>&nbsp;&nbsp;&nbsp; <?php echo $alumno->id ?> 

</div>

<div class="col-xs-6">

<b>RUT Profesor Dirige:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesordirige->id ?> 

</div>
<div class="col-xs-6">

<b>Alumno:</b>&nbsp;&nbsp;&nbsp; <?php echo $alumno->ALU_NOMBRES ?>  <?php echo $alumno->ALU_PATERNO ?>  <?php echo $alumno->ALU_MATERNO ?>


</div>
<div class="col-xs-6">

<b>Profesor Dirige:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesordirige->PRO_NOMBRES ?>  <?php echo $profesordirige->PRO_PATERNO ?>  <?php echo $profesordirige->PRO_MATERNO ?>


</div>

<div class="col-xs-6">

<b>Id Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->id ?> 

</div>
<div class="col-xs-6">

<b>RUT Profesor 1:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor1->id ?> 

</div>
<div class="col-xs-6">

<b>Nombre Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_NOMBRE ?> 

</div>
<div class="col-xs-6">

<b>Profesor 1:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor1->PRO_NOMBRES ?>  <?php echo $profesor1->PRO_PATERNO ?>  <?php echo $profesor1->PRO_MATERNO ?>


</div>
<div class="col-xs-6">

<b>Descripción Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_DESCRIPCION ?> 

</div>
<div class="col-xs-6">

<b>RUT Profesor 2:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor2->id ?> 

</div>
<div class="col-xs-6">

<b>Año Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_ANO ?> 

</div>
<div class="col-xs-6">

<b>Profesor 2:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor2->PRO_NOMBRES ?>  <?php echo $profesor2->PRO_PATERNO ?>  <?php echo $profesor2->PRO_MATERNO ?>


</div>
<div class="col-xs-6">

<b>Semestre Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_SEMESTRE ?> 

</div>








<div class="col-xs-6">

<b>RUT Profesor 3:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor3->id ?> 

</div>

<div class="col-xs-6">


</div>
<div class="col-xs-6">

<b>Profesor 3:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor3->PRO_NOMBRES ?>  <?php echo $profesor3->PRO_PATERNO ?>  <?php echo $profesor3->PRO_MATERNO ?>


</div>

<?php if (($concodirige==1)) { ?>    
<div class="col-xs-6"></div>

    <div class="col-xs-6">

<b>RUT Profesor Codirige:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesorcodirige->id ?> 

</div>
<div class="col-xs-6">
</div>
<div class="col-xs-6">

<b>Profesor Codirige:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesorcodirige->PRO_NOMBRES ?>  <?php echo $profesorcodirige->PRO_PATERNO ?>  <?php echo $profesorcodirige->PRO_MATERNO ?>


</div>
          <?php } ?>
              </div>


<br>
<br>

<br>
<br>


<div class="form-group col-xs-6 required" id="form-name-error">
    {!! Form::label("id","Id Tesis",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="name-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-name-error">
    {!! Form::label("TRIBUNAL_id","Id Tribunal",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TRIBUNAL_id",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="name-error" class="help-block"></span>
    </div>
    </div>

<div class="form-group col-xs-6   required" id="form-EVA_NOTADIRIGEINFORME-error">
    {!! Form::label("EVA_NOTADIRIGEINFORME","Nota Profesor Director Informe*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTADIRIGEINFORME', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTADIRIGEINFORME']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6   required" id="form-EVA_NOTADIRIGEEXPOSICION-error">
    {!! Form::label("EVA_NOTADIRIGEEXPOSICION","Nota Profesor Director Exposición*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTADIRIGEEXPOSICION', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTADIRIGEEXPOSICION']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6   required" id="form-EVA_NOTAPROFESOR1INFORME-error">
    {!! Form::label("EVA_NOTAPROFESOR1INFORME","Nota Profesor 1 Informe*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTAPROFESOR1INFORME', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTAPROFESOR1INFORME']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6   required" id="form-EVA_NOTAPROFESOR1EXPOSICION-error">
    {!! Form::label("EVA_NOTAPROFESOR1EXPOSICION","Nota Profesor 1 Exposición*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTAPROFESOR1EXPOSICION', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTAPROFESOR1EXPOSICION']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6   required" id="form-EVA_NOTAPROFESOR2INFORME-error">
    {!! Form::label("EVA_NOTAPROFESOR2INFORME","Nota Profesor 2 Informe*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTAPROFESOR2INFORME', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTAPROFESOR2INFORME']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6   required" id="form-EVA_NOTAPROFESOR2EXPOSICION"-error">
    {!! Form::label("EVA_NOTAPROFESOR2EXPOSICION","Nota Profesor 2 Exposición*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTAPROFESOR2EXPOSICION', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTAPROFESOR2EXPOSICION']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6   required" id="form-EVA_NOTAPROFESOR3INFORME-error">
    {!! Form::label("EVA_NOTAPROFESOR3INFORME","Nota Profesor 3 Informe*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTAPROFESOR3INFORME', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTAPROFESOR3INFORME']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>










<div class="form-group col-xs-6   required" id="form-EVA_NOTAPROFESOR3EXPOSICION-error">
    {!! Form::label("EVA_NOTAPROFESOR3EXPOSICION","Nota Profesor 3 Exposición*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTAPROFESOR3EXPOSICION', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTAPROFESOR3EXPOSICION']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>

<div class="box-body col-xs-12">
    Nota Final
     Informe <input type="text" id="r1" >
 Nota Final
  Exposición<input type="text" id="r2" >

  Nota Final <input type="text" id="resultado" >
   <input  type="button" value="Calcular Nota" onClick="multiplicar();" >
</div>
<br>
<br>

<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('evalua6/list')" class="btn btn-danger"><i
                    class="fa fa-times"></i>
            Cancelar</a>
        {!! Form::button("<i class='fa fa-save'></i> Guardar",["type" => "submit","class"=>"btn
    btn-primary"])!!}
    </div>
</div>
<script>
    $("#frm").submit(function (event) {
        event.preventDefault();
        $('.loading').show();
        var form = $(this);
        var data = new FormData($(this)[0]);
        var url = form.attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#frm input.required, #frm textarea.required').each(function () {
                        index = $(this).attr('name');
                        if (index in data.errors) {
                            $("#form-" + index + "-error").addClass("has-error");
                            $("#" + index + "-error").html(data.errors[index]);
                        }
                        else {
                            $("#form-" + index + "-error").removeClass("has-error");
                            $("#" + index + "-error").empty();
                        }
                    });
                    $('#focus').focus().select();
                } else {
                    $(".has-error").removeClass("has-error");
                    $(".help-block").empty();
                    $('.loading').hide();
                    ajaxLoad(data.url, data.content);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        return false;
    });
</script> 
<script>
function multiplicar(){
    //n1 = document.getElementById("multiplicando").value;
   // n2 = document.getElementById("multiplicador").value;

 
/*
       n1=parseFloat(document.getElementById("EVA_NOTADIRIGEINFORME").value).toFixed( 2 );
           n2=parseFloat(document.getElementById("EVA_NOTADIRIGEEXPOSICION").value).toFixed( 2 );


   n3=parseFloat(document.getElementById("EVA_NOTAPROFESOR1INFORME").value).toFixed( 2 );
    n4=parseFloat(document.getElementById("EVA_NOTAPROFESOR1EXPOSICION").value).toFixed( 2 );
   n5=parseFloat(document.getElementById("EVA_NOTAPROFESOR2INFORME").value).toFixed( 2 );

   n6=parseFloat(document.getElementById("EVA_NOTAPROFESOR2EXPOSICION").value).toFixed( 2 );

   n7=parseFloat(document.getElementById("EVA_NOTAPROFESOR3INFORME").value).toFixed( 2 );

   n8=parseFloat(document.getElementById("EVA_NOTAPROFESOR3EXPOSICION").value).toFixed( 2 );

     
*/
n1=parseFloat(document.getElementById("EVA_NOTADIRIGEINFORME").value);
           n2=parseFloat(document.getElementById("EVA_NOTADIRIGEEXPOSICION").value);
   n3=parseFloat(document.getElementById("EVA_NOTAPROFESOR1INFORME").value);
    n4=parseFloat(document.getElementById("EVA_NOTAPROFESOR1EXPOSICION").value);
   n5=parseFloat(document.getElementById("EVA_NOTAPROFESOR2INFORME").value);

   n6=parseFloat(document.getElementById("EVA_NOTAPROFESOR2EXPOSICION").value);

   n7=parseFloat(document.getElementById("EVA_NOTAPROFESOR3INFORME").value);

   n8=parseFloat(document.getElementById("EVA_NOTAPROFESOR3EXPOSICION").value);


    r1 = (n1*0.5)+(n3*0.125)+(n5*0.125)+(n7*0.25);
       r1=parseFloat(r1).toFixed(1);

        r2 = (n2*0.25)+(n4*0.2)+(n6*0.2)+(n8*0.35);
               r2=parseFloat(r2).toFixed(1);

        r3= (r1*0.6)+(r2*0.4);
               r3=parseFloat(r3).toFixed(1);

    document.getElementById("r1").value = r1
    document.getElementById("r2").value = r2;

    document.getElementById("resultado").value = r3;
    }
</script>