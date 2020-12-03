<div class="box-body col-xs-12">
 
<div class="form-group col-xs-6 required" id="form-PRO_NOMBRES-error">
    {!! Form::label("id","RUT",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="PRO_NOMBRES-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("PRO_TITULO","TITULO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_TITULO",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6 required" id="form-PRO_NOMBRES-error">
    {!! Form::label("PRO_NOMBRES","Nombre",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_NOMBRES",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="PRO_NOMBRES-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("PRO_GRADO","GRADO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_GRADO",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("PRO_PATERNO","paterno",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_PATERNO",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("PRO_EMAIL","email",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_EMAIL",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>



<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("PRO_MATERNO","Materno",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_MATERNO",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>






<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("PRO_TELEFONO","TELEFONO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_TELEFONO",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6 required" id="form-departamento-error">
    {!! Form::label("DEPARTAMENTO_id","Departamento",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("DEPARTAMENTO_id",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>

</div>

<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('profesor/list')" class="btn btn-danger"><i
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
