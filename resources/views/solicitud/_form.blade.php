       <p class="help-block"><span style="color:#FF0000"> Campos con <span class="required">asterisco (*)</span>  son obligatorios </p>

<div class="form-group required" id="form-SOL_NOMBRE-error">
    {!! Form::label("SOL_NOMBRE","Nombre Solicitud*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("SOL_NOMBRE",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="SOL_NOMBRE-error" class="help-block"></span>
    </div>
</div>

<!--<div class="form-group required" id="form-SOL_DESCRIPCION-error">
    {!! Form::label("SOL_DESCRIPCION","Descripción*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("SOL_DESCRIPCION",null,["class"=>"form-control required"]) !!}
        <span id="SOL_DESCRIPCION-error" class="help-block"></span>
    </div>
</div>-->


<div class="form-group required" id="form-SOL_ANO-error">
    {!! Form::label("SOL_ANO","Año*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("SOL_ANO",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="SOL_ANO-error" class="help-block"></span>
    </div>
</div>


<!--<div class="form-group   required" id="form-SOL_ANO-error">
    {!! Form::label("SOL_ANO","Año*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
 {!! Form::select('SOL_ANO', ['2010' => '2010','2011' => '2011','2012' => '2012','2013' => '2013','2014' => '2014','2015' => '2015','2016' => '2016','2017' => '2017','2018' => '2018','2019' => '2019','2020' => '2020','2021' => '2021','2022' => '2022','2023' => '2023','2024' => '2024','2025' => '2025','2026' => '2026','2027' => '2027','2028' => '2028','2029' => '2029','2030' => '2030' ],null,['required', 'class' => 'form-control','placeholder'=>'Selecione Año']) !!}        <span id="SOL_ANO-error" class="help-block"></span>
    </div>
</div>-->

<div class="form-group   required" id="form-SOL_SEMESTRE-error">
    {!! Form::label("SOL_SEMESTRE","Semestre*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
 {!! Form::select('SOL_SEMESTRE', ['1' => '1','2' => '2'],null,['required', 'class' => 'form-control','placeholder'=>'Selecione Semestre']) !!}        <span id="SOL_SEMESTRE-error" class="help-block"></span>
    </div>
</div>


<div class="form-group  required" id="form-SOL_DESCRIPCION-error">
    {!! Form::label("SOL_DESCRIPCION","Descripción*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
       <!-- {!! Form::text("TES_DESCRIPCION",null,["class"=>"form-control required"]) !!}-->
            {!! Form::textarea('SOL_DESCRIPCION', null, ["class"=>"form-control required","id"=>"focus"]) !!}

        <span id="SOL_DESCRIPCION-error" class="help-block"></span>
    </div>
</div>


  <p class="help-block">- No pueden haber 2 o mas Solicitudes con igual [Nombre,Semestre,Año]</p>

                <p class="help-block">- Año y Semestre deben ser  numeros enteros</p>

 <p class="help-block">- Fijese que no queden  espacios en blanco antes del Nombre</p>


<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('solicitud/list')" class="btn btn-danger"><i
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
