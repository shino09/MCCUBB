
                <p class="help-block">Creando </p>

   <div >

<b>RUT Alumno:</b>&nbsp;&nbsp;&nbsp; <?php echo $alumno->id ?> 

</div>
   <div >

<b>Alumno:</b>&nbsp;&nbsp;&nbsp; <?php echo $alumno->ALU_NOMBRES ?>  <?php echo $alumno->ALU_PATERNO ?>  <?php echo $alumno->ALU_MATERNO ?>


</div>

   <div >

<b>Id Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->id ?> 

</div>
  <div >

<b>Nombre Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_NOMBRE ?> 

</div>
 <div >

<b>Descripción Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_DESCRIPCION ?> 

</div>
  <div >

<b>Año Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_ANO ?> 

</div>
 <div >

<b>Semestre Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_SEMESTRE ?> 

</div>
   <div >

<b>RUT Profesor Dirige:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesordirige->id ?> 

</div>
   <div >

<b>Profesor Dirige:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesordirige->PRO_NOMBRES ?>  <?php echo $profesordirige->PRO_PATERNO ?>  <?php echo $profesordirige->PRO_MATERNO ?>


</div>
  
   <div >

<b>RUT Profesor 1:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor1->id ?> 

</div>
   <div >

<b>Profesor 1:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor1->PRO_NOMBRES ?>  <?php echo $profesor1->PRO_PATERNO ?>  <?php echo $profesor1->PRO_MATERNO ?>


</div>
   <div >

<b>RUT Profesor 2:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor2->id ?> 

</div>
   <div >

<b>Profesor 2:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor2->PRO_NOMBRES ?>  <?php echo $profesor2->PRO_PATERNO ?>  <?php echo $profesor2->PRO_MATERNO ?>


</div>

   <div >

<b>RUT Profesor 3:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor3->id ?> 

</div>
   <div >

<b>Profesor 3:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor3->PRO_NOMBRES ?>  <?php echo $profesor3->PRO_PATERNO ?>  <?php echo $profesor3->PRO_MATERNO ?>


</div>

    <br>
    <br>

<!--<div class="form-group required" id="form-profesor-error">
    {!! Form::label("id","TESIS*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
     

            {!! Form::select('id', $TESIS,null,['required', 'class' => 'form-control','placeholder'=>'Selecione profesor']) !!}

        <span id="profesor-error" class="help-block"></span>
    </div>
</div>




<div class="form-group required" id="form-profesor-error">
    {!! Form::label("TRIBUNAL_id","TRIBUNAL*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
     

            {!! Form::select('TRIBUNAL_id', $TRIBUNAL,null,['required', 'class' => 'form-control','placeholder'=>'Selecione profesor']) !!}

        <span id="profesor-error" class="help-block"></span>
    </div>
</div>-->




<div class="form-group col-xs-6   required" id="form-EVA_NOTA-error">
    {!! Form::label("EVA_NOTAGUIA","EVA_NOTAGUIA*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTAGUIA', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTAGUIA']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>





<div class="form-group col-xs-6   required" id="form-EVA_NOTA-error">
    {!! Form::label("EVA_NOTAINFORMANTE","EVA_NOTAINFORMANTE*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTAINFORMANTE', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTAINFORMANTE']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>





<div class="form-group col-xs-6   required" id="form-EVA_NOTA-error">
    {!! Form::label("EVA_NOTASALA","EVA_NOTASALA*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTASALA', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTASALA']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>





<div class="form-group col-xs-6   required" id="form-EVA_NOTA-error">
    {!! Form::label("EVA_NOTAFINAL","EVA_NOTAFINAL*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('EVA_NOTAFINAL', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione EVA_NOTAFINAL']) !!}        <span id="EVA_NOTA-error" class="help-block"></span>
    </div>
</div>






<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('evalua6/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Back</a>
        {!! Form::button("<i class='fa fa-save'></i> Save",["type" => "submit","class"=>"btn
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
