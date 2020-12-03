
<div class="box-body col-xs-12">
 

<div class="form-group col-xs-6 required" id="form-name-error">
    {!! Form::label("id","Id",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="name-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-name-error">
    {!! Form::label("ALU_NOMBRES","Nombre",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_NOMBRES",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="name-error" class="help-block"></span>
    </div>
</div>
<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("ALU_PATERNO","paterno",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_PATERNO",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>
z
<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("ALU_MATERNO","paterno",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_MATERNO",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("ALU_EMAIL","email",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_EMAIL",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("ALU_TELEFONO","TELEFONO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_TELEFONO",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("ALU_PUNTAJE","PUNTAJE",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_PUNTAJE",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("ALU_TITULO","TITULO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_TITULO",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("ALU_GRADO","GRADO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_GRADO",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("ALU_ESTADO","ESTADO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_ESTADO",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("UNIVERSIDAD_id","universidad",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("UNIVERSIDAD_id",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>


</div>


<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('alumno/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
      
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
